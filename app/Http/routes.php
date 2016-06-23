<?php

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

Route::auth();

Route::get('/', ['as' => 'root', 'uses' => 'HomeController@index']);
Route::get('/view/{post_id}', ['as' => 'view', 'uses' => 'HomeController@view']);

Route::post('/comments', ['as' => 'create_comment', 'uses' => 'CommentsController@create']);

Route::group(['prefix' => 'admin'], function () {
  Route::get('/', ['as' => 'admin', 'uses' => 'PostsController@index']);
  Route::resource('posts', 'PostsController');

  Route::put('/posts/change_status/{id}', ['as' => 'admin.posts.change_status', 'uses' => 'PostsController@change_status']);

  Route::get('/users', ['as' => 'admin.users', 'uses' => 'UsersController@index']);

  Route::put('/users/{id}/to_user', ['as' => 'admin.users.to_user', 'uses' => 'UsersController@to_user']);
  Route::put('/users/{id}/to_moderator', ['as' => 'admin.users.to_moderator', 'uses' => 'UsersController@to_moderator']);
  Route::put('/users/{id}/to_admin', ['as' => 'admin.users.to_admin', 'uses' => 'UsersController@to_admin']);
});
