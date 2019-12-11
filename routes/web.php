<?php

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

Route::auth();

Route::get('/logout', 'Auth\LoginController@logout');


Route::get('/home', 'HomeController@index');

Route::get('/post/{id}',  ['as'=>'home.post', 'uses'=> 'AdminPostsController@post']);

Route::get('/admin', function (){
    return view('admin.index');
});



// Registering the middleware and Using miidleware name ->  Admin

Route::group(['middleware'=>'admin'], function () {
//    Route::get('/admin', function (){
//        return view('admin.index');
//    });
    // beacuse the route name has been changed to the "users.index" , so we were giving them name
    Route::resource('/admin/users', 'AdminUsersController', ['names' =>
        [
            'index' => 'admin.users.index',
            'create' => 'admin.users.create',
            'store' => 'admin.users.store',
            'edit' => 'admin.users.edit',
            'update' => 'admin.users.update',
            'destroy' => 'admin.users.destroy'
        ]]);


    Route::resource('/admin/posts', 'AdminPostsController', ['names' =>
        [
            'index' => 'admin.posts.index',
            'create' => 'admin.posts.create',
            'store' => 'admin.posts.store',
            'edit' => 'admin.posts.edit',
            'update' => 'admin.posts.update',
            'destroy' => 'admin.posts.destroy'

        ]]);
    Route::resource('/admin/categories', 'AdminCategoriesController', ['names' =>
        [
            'index' => 'admin.categories.index',
            'store' => 'admin.categories.store',
            'edit' => 'admin.categories.edit',
            'update' => 'admin.categories.update',
            'destroy' => 'admin.categories.destroy'
        ]]);

    Route::resource('/admin/medias', 'AdminMediasController', ['names' =>
        [
            'index' => 'admin.medias.index',
            'create' => 'admin.medias.create',
            'store' => 'admin.medias.store',
            'destroy' => 'admin.medias.destroy'
        ]]);

    Route::delete('admin/delete/media', 'AdminMediasController@deleteMedia' );

    Route::resource('/admin/comments', 'PostCommentsController', ['names' =>
        [

            'index' => 'admin.comments.index',
            'create' => 'admin.comments.create',
            'store' => 'admin.comments.store',
            'edit' => 'admin.comments.edit',
            'show' => 'admin.comments.show',
            'update' => 'admin.comments.update',
            'destroy' => 'admin.comments.destroy'

        ]]);
    Route::resource('/admin/comments/replies', 'CommentRepliesController', ['names' =>
        [

            'index' => 'admin.comments.replies.index',
            'create' => 'admin.comments.replies.create',
            'store' => 'admin.comments.replies.store',
            'edit' => 'admin.comments.replies.edit',
            'show' => 'admin.comments.replies.show',
            'update' => 'admin.comments.replies.update',
            'destroy' => 'admin.comments.replies.destroy'

        ]]);

});





Route::group(['middleware' => 'auth'], function ()
{

    Route::post('/comment/reply','CommentRepliesController@createReply');

});



if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
    // Ignores notices and reports all other kinds... and warnings
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
    // error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
}