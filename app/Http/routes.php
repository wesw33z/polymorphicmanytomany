<?php
use App\Post;
use App\Video;
use App\Tag;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
//CRUD - Create DB entries
Route::get('/create', function(){
    //create Post record in the DB
    $post = Post::create(['name'=>'My first post!']);
    //find the Tag with id of 1
    $tag1 = Tag::findOrFail(1);
    //link the Post to the Tag in the Taggables table
    $post->tags()->save($tag1);
    //create a Video record in the DB
    $video = Video::create(['name'=>'video.mov']);
    //find the Tag with id of 2
    $tag2 = Tag::findOrFail(2);
    // link the Video to the Tag in the Taggables table
    $video->tags()->save($tag2);
});
//CRUD - Read from DB
Route::get('/read', function(){
   $post = Post::findOrFail(1);
   foreach($post->tags as $tag){
    echo $tag . "<br>";
   }
});
//CRUD - Update the DB
Route::get('/update', function(){
//$post = Post::findOrFail(1);
//foreach($post->tags as $tag){
//    $tag->whereName('PHP')->update(['name'=>'Updated PHP']);
//}
//another way to update
$post = Post::findOrFail(1);
$tag = Tag::findOrFail(3);
$post->tags()->save($tag);
//also works
//$post->tags()->attach($tag);
//removes all from DB except where tag_id is NOT 1
//$post->tags()->sync([1]);
});

//CRUD - Delete from DB
Route::get('/delete', function(){
    $post = Post::findOrFail(1);
    foreach($post->tags as $tag){
        $tag->whereId(2)->delete();
    }
});

