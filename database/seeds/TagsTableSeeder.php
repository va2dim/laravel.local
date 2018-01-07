<?php

use Illuminate\Database\Seeder;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class TagsTableSeeder
  extends Seeder
{

    /**
     * Run the tags table seeds.
     *
     * @return void
     */

    public function run()
    {
        \App\Tag::truncate();

        $faker = Faker\Factory::create('ru_RU');

        $tags = ['йога', 'аюрведа', 'фитотерапия', 'суфизм', 'христианство', 'православие', 'упанишады'];
        foreach(range(0, 6) as $i) {
            $name = $tags[$i];
            //$name = $faker->firstName;
            $slug = SlugService::createSlug(\App\Tag::class, 'slug', $name);

            DB::table('tags')->insert([
              'name' => $name,
              'slug' => $slug,
                //'user_id' => \App\User::inRandomOrder()->first()->id, //if we need different set of tags for each user
            ]);
        }

    }


}
