<?php

Route::post('user/{user_id}/book/{book_id}', 'LibraryController@attachBook');
Route::delete('user/{user_id}/book/{book_id}', 'LibraryController@detachBook');
Route::get('user/{user_id}/book', 'UsersController@books');

Route::resource('user', 'UsersController');
Route::resource('book', 'BooksController');

Route::get('/', function() {
   return view('index');
});