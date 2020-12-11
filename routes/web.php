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


Route::prefix('api')->group(function () {
    // Contacts
    Route::get('getContacts', 'ContactController@getContacts');
});


// npm install 
// npm install vue 
// npm run dev 
// npm install cross-env
// npm install --save axios vue-axios
// npm install --save vue-router


