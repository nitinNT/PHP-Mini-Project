<?php

use App\Discussion;
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
Route::get('/', function(){
  return view("welcome");
});
Route::get('/about',function(){
  return view("about");
})->name("about");

Route::resource('discussions', 'discussionController');

Route::resource('discussions/{discussion_id}/replies', 'repliesController');
Route::get('discussions/topic/{category}','discussionController@category');
Route::resource('groups', 'GroupUserController');
//private disccussion routes
Route::resource('groups/{group_id}/discussions','privateDiscussionController');
Route::resource('groups/{group_id}/discussions/{discussion_id}/comments','privateRepliesController');


Route::get('groups/{group_id}/search', "LiveSearch@search")->name('liveSearch.search');
Route::get('groups/{group_id}/search/action',"liveSearch@action")->name('liveSearch.action');
Route::post('groups/{group_id}/search/addUser','LiveSearch@addUser' )->name("liveSearch.addUser");

Route::get('replies/like/{id}', ['as' => 'replies.like', 'uses' => 'LikeController@likeReply']);
Route::get('discussions/like/{id}', ['as' => 'discussions.like', 'uses' => 'LikeController@likeDiscussion']);

Auth::routes();
Route::post('/like', [
    'uses' => 'discussionController@postLikePost',
    'as' => 'like'
]);
Route::get('/home', 'HomeController@index')->name('home');
