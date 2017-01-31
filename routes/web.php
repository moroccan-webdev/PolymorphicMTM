<?php
use App\Post;
use App\Tag;
use App\Video;
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
    return view('welcome');
});

Route::get('/create', function () {
    $post = Post::create(['name'=>'RobyOnRails News']);
    $tag = Tag::find(3);
    $post->tags()->save($tag);
    $video = Video::create(['name'=>'Slowmotion.movie']);
    $tag = Tag::find(4);
    $video->tags()->save($tag);
});

Route::get('/read', function () {
    $post = Post::findOrFail(1);
    foreach($post->tags as $tag){
      echo $tag->name;
    }
});

Route::get('/update', function () {
    $post = Post::findOrFail(1);
    foreach($post->tags as $tag){
      $tag->whereName('php')->update(['name'=>'Larevel News Are On My Website']);
    }
});

Route::get('/delete', function () {
    $post = Post::findOrFail(1);
    foreach($post->tags as $tag){
      $tag->whereId(1)->delete();
    }
});
