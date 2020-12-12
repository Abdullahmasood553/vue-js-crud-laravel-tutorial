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

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('auth')->group(function() {
    Route::get('init', 'AuthController@init');
    Route::post('login', 'AuthController@login');
    Route::post('register', 'AuthController@register');
    Route::post('logout', 'AuthController@logout');
});


Route::prefix('api')->group(function () {

    // Contacts
    Route::get('getContacts', 'ContactController@getContacts');
    Route::post('save_contact', 'ContactController@save_contact');
    Route::get('get_contact/{id}', 'ContactController@get_contact');
    Route::post('update_contact/{id}', 'ContactController@update_contact');
    Route::delete('deleteContact/{id}', 'ContactController@deleteContact');
});

// npm install 
// npm install vue 
// npm run dev 
// npm install cross-env
// npm install --save axios vue-axios
// npm install --save vue-router
// npm install vue-simple-spinner --save
// npm install -S vue-sweetalert2


