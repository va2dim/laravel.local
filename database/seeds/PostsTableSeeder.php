<?php

use Illuminate\Database\Seeder;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class PostsTableSeeder
  extends Seeder
{

    /**
     * Run the posts table seeds.
     *
     * @return void
     */

    public function run()
    {
        \App\Post::truncate();
        DB::table('post_tag')->truncate();

        $faker = Faker\Factory::create('ru_RU');

        foreach(range(1, 15) as $index) {
            $year = rand(2009, 2017);
            $month = rand(1, 12);
            $day = rand(1, 28);
            $dt = \Carbon\Carbon::create($year, $month, $day, 0, 0, 0);
            $title = $faker->RealText(45);
            $slug = SlugService::createSlug(\App\Post::class, 'slug', $title);

            $post_id = DB::table('posts')->insertGetId([
              'title' => $title,
              'slug' => $slug,
              'body' => $faker->RealText(400),
              'user_id' => \App\User::inRandomOrder()->first()->id,
              //'images' => $faker->imageUrl(),
              'created_at' => $dt,
              'updated_at' => $dt,
            ]);

//почистить табл тэгов также
            //$post_id = \App\Post::latest()->first()->id;
            //$post_id = \App\Post::orderBy('id', 'desc')->first()->id;

            $tags_rand = rand(0, 6);
            $post_tags = \App\Tag::inRandomOrder()->pluck('id');
            foreach(range(0, $tags_rand) as $i) {
                DB::table('post_tag')->insert([
                  'post_id' => $post_id,
                  'tag_id' => $post_tags[$i],
                ]);
            }


        }
    }


}
