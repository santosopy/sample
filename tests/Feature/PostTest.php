<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostTest extends TestCase
{

    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function setUp() :void{
        parent::setup();

        $this->post = Post::factory()->create();
        $this->tag = Tag::factory()->create();
    }
    
    public function test_post_screen_can_be_rendered()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_user_can_send_post_with_tag()
    {
        $this->assertInstanceOf(Collection::class, $this->tag->posts);
    }
}
