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
    return view('index',[ 'nav' => 'index' ]);
});

Route::get('/scanner', function () {
    return view('scanner',[ 'nav' => 'scanner' ]);
});

Route::get('/scanner-instructions', function () {
    return view('scanner-instructions',[ 'nav' => 'scanner' ]);
});

Route::get('/scanner-rules', function () {
    return view('scanner-rules',[ 'nav' => 'scanner' ]);
});

Route::get('/scanner-whitelist', function () {
    return view('scanner-whitelist',[ 'nav' => 'scanner' ]);
});

Route::post('/scanner-rule-submit', 'RulesController@create');

Route::get('/tools', function () {
    return view('tools',[ 'nav' => 'tools' ]);
});

Auth::routes();

Route::get('/home', 'HomeController@index');
