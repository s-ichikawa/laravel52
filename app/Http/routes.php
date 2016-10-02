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

Route::get('/mail', 'MailController@index');
Route::post('/mail', 'MailController@send');

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

Route::get('events', function () {
    return view('events');
});
Route::get('events/search', function () {
    $result = \App\Event::search()->multiMatch(['title', 'catch', 'description'], Request::get('keyword'), ['fuzziness' => '3'])->get();
    return Response::json($result->hits());
});

Route::get('guzzle', function () {
    sleep(5);
    return response("OK");
});

Route::group(['prefix' => 'notify'], function () {
    Route::get('/', function () {
        return 'すいません。イタズラが多かったので停止しました。';
    });
//    Route::get('/auth', 'LineNotifyController@redirectToProvider');
//    Route::post('/callback', 'LineNotifyController@handleProviderCallback');
//    Route::post('/send', 'LineNotifyController@send');
});

Route::post('/sendgrid/event', function (\Illuminate\Http\Request $request) {
    Log::info($request->all());
});