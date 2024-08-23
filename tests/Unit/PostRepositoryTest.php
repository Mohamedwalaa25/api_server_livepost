<?php

namespace Tests\Unit;
use App\Models\Post;
use App\Repositories\PostRepository;
use Tests\TestCase;

class PostRepositoryTest extends TestCase
{
    /**
     * A basic unit test example.
     */

//    public function test_create()
//    {
//        $repostory = $this->app->make(PostRepository::class);
//        $payload = [
//            'title'=>'title',
//            'body'=> [],
//        ];
//        $result = $repostory->create($payload);
//
//        $this->assertSame($payload['title'], $result->title , "title not match");
//    }
//    public function test_update()
//    {
//        $repostory = $this->app->make(PostRepository::class);
//
//    }
    public function test_delete()
    {
        $repostory = $this->app->make(PostRepository::class);
        $dummy = Post::factory(1)->create()->first();
        dd($dummy);

    }

//    public function test_example(): void
//    {
//        $this->assertTrue(true);
//    }
}
