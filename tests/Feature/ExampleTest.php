<?php

namespace Tests\Feature;

use App\Post;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
//use Illuminate\Foundation\Testing\DatabaseTransactions;
//use Illuminate\Foundation\Testing\DatabaseMigrations;

class ExampleTest extends TestCase
{

    //use DatabaseTransactions; //rollback after each test - commited transaction
    use RefreshDatabase; //can be used 4 L5.5 RefreshDatabase instead of DatabaseTransactions
    /**
     * A basic test
     * 4 archives
     *
     * @return void
     */
    public function testBasicTest()
    {
        //$response = $this->get('/');
        //$response->assertStatus(200);

        $first = factory(Post::class)->create();

        $second = factory(Post::class)->create([
            'created_at' => \Carbon\Carbon::now()->subMonth(),
        ]);

        $posts = Post::archives()->toArray(); // assertEquals для сравнения нужен arr, а в posts - коллекция
        //$response = $this->assertCount(2, $posts);


        $response = $this->assertEquals([
            [
                "year" => $first->created_at->format('Y'),
                "month" => $first->created_at->format('F'),
                "published" => 1,
            ],
            [
                "year" => $second->created_at->format('Y'),
                "month" => $second->created_at->format('F'),
                "published" => 1,
            ],
        ], $posts);


    }
}
