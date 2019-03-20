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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('books', 'BooksController');

Route::resource('authors', 'AuthorsController');

Route::post('/books/{book}/comments', 'CommentsController@store');

Route::resource('users', 'UsersController')->middleware('can:update');

Route::resource('subscriptions', 'SubscriptionsController')->middleware('can:update');

Route::get('/books/{book}/unsubscribe', 'BooksController@unsubscribe');

Route::post('/subscriptions/store/{user}', 'SubscriptionsController@adminStore')->middleware('can:update');
