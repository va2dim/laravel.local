<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder
  extends Seeder
{
    /**
     * Run the users table seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('ru_RU');
        static $password;
        \App\User::truncate();

        DB::table('users')->insert([
          'name' => 'admin',
          'email' => "va2dim@gmail.com",
          'password' => $password ?: $password = bcrypt('213sks'),
          'remember_token' => str_random(10),
        ]);

        foreach(range(1, 15) as $i) {
            DB::table('users')->insert([
              'name' => $faker->firstName.' '.$faker->lastName,
              'email' => $faker->unique()->email,
              'password' => $password ?: $password = bcrypt('123456'),
              'remember_token' => str_random(10),
            ]);
        }

    }
}

