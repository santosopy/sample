<?php

use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use App\Models\Video;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    //////////////// one to many ////////////////
    // 1
    // $user = User::create([
    //     "name" => "test name",
    //     "email" => "test@email.com",
    //     "password" => Hash::make("1234"),
    // ]);
    
    // $post = Post::create([
    //     "user_id" => $user->id,
    //     "title" => "example title"
    // ]);
    
    // $post->comments()->create([
    //     "user_id" => $user->id,
    //     "body" => "comment for post"
    // ]);


    // 2
    // $post = Post::find(1);

    // $post->comments()->create([
    //     "user_id" => 1,
    //     "body" => "second commet"
    // ]);

    // 3
    // $video = Video::create([
    //     "title" => "example video title"
    // ]);
    
    // $video->comments()->create([
    //     "user_id" => 1,
    //     "body" => "comment for video"
    // ]);

    // 4
    // $comment = Comment::find(3);

    // dd($comment->commentable);

    // 5
    // $post = Post::find(1);
    
    // dd($post->comment);

    //////////////// many to many ////////////////
    // 1
    // $post = Post::create([
    //     "user_id" => 1,
    //     "title" => "post title 1"
    // ]);
    
    // $post->tags()->create([
    //     "name" => "laravel"
    // ]);

    // 2
    // $post = Post::find(1);

    // $tag = Tag::create([
    //     "name" => "PHP"
    // ]);

    // $post->tags()->attach($tag);

    // 3
    // $video = Video::create([
    //     "title" => "video title 1"
    // ]);

    // $tag = Tag::find(2);

    // $video->tags()->attach($tag);

    // 4
    // $video = Video::find(2);

    // dd($video->tags);

    // 5
    $tag = Tag::find(2);
    $tag->videos()->create([
        "title" => "video title 2"
    ]);
    dd($tag->videos);

    return view('welcome');
});
