<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder
  extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->truncate();

        $faker = Faker\Factory::create('ru_RU');

        foreach(range(1, 15) as $index) {
            $year = rand(2009, 2017);
            $month = rand(1, 12);
            $day = rand(1, 28);
            $dt = \Carbon\Carbon::create($year, $month, $day, 0, 0, 0);

            //$slug = SlugService::createSlug(\App\Post::class, 'slug', $title);

            $post = \App\User::inRandomOrder()->first();

            $comment_ids = [null];
            foreach (range(0, rand(1, 10)) as $i) {
                $parent_id = array_random($comment_ids);

                $comment_ids[] = DB::table('comments')->insertGetId([
                  'parent_id' => $parent_id,
                  'body' => $faker->RealText(60),
                  'user_id' => \App\User::inRandomOrder()->first()->id,
                  'post_id' => $post->id,
                    //'images' => $faker->imageUrl(),
                  'created_at' => $dt,
                  'updated_at' => $dt,
                ]);
            }
        }
    }
}
