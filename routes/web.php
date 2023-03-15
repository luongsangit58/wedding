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

Route::get('/ma-so-may-man', 'App\Http\Controllers\WishesController@getLuckyDrawWish')->name('ma-so-may-man');
Route::post('/ma-so-may-man', 'App\Http\Controllers\WishesController@postLuckyDrawWish');

Route::get('/thiep-moi/{key}', 'App\Http\Controllers\InvitationController@index')->name('thiep-moi');
Route::get('/invitation/getAll', 'App\Http\Controllers\InvitationController@getInvitations');
Route::get('/invitation/delete/{id}', 'App\Http\Controllers\InvitationController@deleteInvitationById');
Route::get('/invitation/update/{id}', 'App\Http\Controllers\InvitationController@updateInvitationForm');
Route::post('/invitation/update', 'App\Http\Controllers\InvitationController@updateInvitationById');
Route::get('/invitation/insert', 'App\Http\Controllers\InvitationController@insertInvitationForm');
Route::post('/invitation/insert', 'App\Http\Controllers\InvitationController@insertInvitation');

Route::get('/loi-chuc', 'App\Http\Controllers\WishesController@getWishes')->name('loi-chuc');
Route::get('/wishes/getIp', 'App\Http\Controllers\WishesController@getRealIPAddress');
Route::get('/wishes/insert', 'App\Http\Controllers\WishesController@insertWishes');
Route::get('/wishes/update-sent-email/{email}', 'App\Http\Controllers\WishesController@updateSentEmail');
Route::get('/wishes/getAll', 'App\Http\Controllers\WishesController@getListWishesAPI');
Route::get('/wishes/delete/{email}', 'App\Http\Controllers\WishesController@deleteWishByEmail');
Route::get('/wishes/update/{id}', 'App\Http\Controllers\WishesController@updateForm');
Route::post('/wishes/update', 'App\Http\Controllers\WishesController@updateWishById');

Route::get('/anh', ['as'=>'anh', function() {
    return view('gallery');
}]);

Route::get('/gui-loi-chuc', ['as'=>'gui-loi-chuc', function() {
    return redirect('/');
    // return view('wishes');
}]);

Route::get('/chuyen-tinh', ['as'=>'chuyen-tinh', function() {
    return view('story');
}]);

Route::get('/thiep-moi', function() {
    return redirect('/');
});

Route::get('/tho', 'App\Http\Controllers\PoemController@index')->name('tho');
Route::get('/tho/{slug}', 'App\Http\Controllers\PoemController@detail');
Route::get('/tho/admin/insert', 'App\Http\Controllers\PoemController@insertPoem');
Route::post('/tho/admin/insert', 'App\Http\Controllers\PoemController@insertPoem');