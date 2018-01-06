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


Route::get('/', 'PostsController@index')->name('home');
Route::get('/posts', 'PostsController@index');
Route::post('/posts', 'PostsController@store');
Route::get('/posts/create', 'PostsController@update');

Route::get('/authors/create', 'AuthorsController@create');
Route::post('/authors', 'AuthorsController@store');


Route::get('/tags/{tag_slug}', 'TagsController@index');
Route::get('/posts/tags/{tag_slug}', 'TagsController@show');
Route::get('/posts/tags', 'TagsController@index');
Route::get('/posts/{post_slug}', 'PostsController@show'); // must be last in Routing otherwise will be captcure all dir name, like create
Route::post('/posts/{post_slug}/comments', 'CommentsController@store');
Route::get('/posts/{post_slug}/edit', 'PostsController@update');
Route::get('/posts/{post_slug}/delete', 'PostsController@destroy');

Route::get('/quotes', 'QuotesController@index');
Route::post('/quotes', 'QuotesController@store');
Route::get('/quotes/create', 'QuotesController@update');
Route::get('/quotes/{quote}', 'QuotesController@show');
Route::get('/quotes/{quote}/edit', 'QuotesController@update');
Route::get('/quotes/{quote}/delete', 'QuotesController@destroy');

Route::get('/hubs', 'CategoriesController@index');
Route::get('/hubs/create', 'CategoriesController@create');
Route::get('/hubs/{hub}', 'CategoriesController@show');
Route::post('/hubs', 'CategoriesController@store');


//Route::get('/register', 'AuthController@register');
Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');
//Route::get('/login', 'AuthController@login');
Route::get('/login', 'SessionController@create')->name('login');
Route::post('/login', 'SessionController@store');
Route::get('/logout', 'SessionController@destroy');





