<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'App\Http\Controllers\WishesController@index');
Route::get('/loi-chuc', 'App\Http\Controllers\WishesController@getWishes');
Route::get('/wishes/insert', 'App\Http\Controllers\WishesController@insertWishes');

Route::get('/anh', ['as'=>'anh', function() {
    return view('gallery');
}]);

Route::get('/gui-loi-chuc', function () {
    return view('wishes');
});

Route::get('/chuyen-tinh', function () {
    return view('story');
});

Route::get('/thiep-moi', function () {
    return redirect('/');
});
Route::get('/thiep-moi/{key}', 'App\Http\Controllers\InvitationController@index');