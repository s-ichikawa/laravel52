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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'elasticsearch'], function () {
    Route::get('search', function () {
        $result = \App\Book::search()->match('id', '1')->get();
        var_dump($result);
    });

    Route::get('save', function () {
        $book = new \App\Book;
        $book->name = 'test name';
        $book->body = 'test body';
        $book->tags = json_encode(['tag1', 'tag2']);
        $book->images = json_encode(['image1', 'image2']);
        $book->save();
        return 'OK';
    });
});

