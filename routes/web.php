<?php

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/', function () {
    $posts = Post::all();

    return view('welcome', compact("posts"));
});

Route::post('/', function (Request $request) {
    $post = Post::firstOrNew(["name" => $request->name]);
    $post->name = $request->name;
    $post->save();
    
    $list = [];
    if( isset($request->data) ){
        foreach ($request->data as $key => $value) {
            $tag = Tag::firstOrNew(["name" => $key]);
            $tag->name = $key;
            $list[] = $tag;
        }
    }
    $tag2 = Tag::firstOrNew(["name" => $request->tagnameRaw]);
    $tag2->name = $request->tagnameRaw;
    $list[] = $tag2;
    $post->tags()->saveMany($list);

    return redirect()->back();
});
