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

Route::get('/scanner', 'RulesController@home');

Route::get('/scanner-instructions', function () {
    return view('scanner-instructions',[ 'nav' => 'scanner' ]);
});

Route::get('/scanner-rules', function () {
    return view('scanner-rules',[ 'nav' => 'scanner' ]);
});

Route::get('/scanner-whitelist', function () {
    return view('scanner-whitelist',[ 'nav' => 'scanner' ]);
});

Route::get('/scanner-thankyou', function () {
    return view('scanner-thankyou',[ 'nav' => 'scanner' ]);
});

Route::post('/scanner-rule-submit', 'RulesController@create');

Route::post('/scanner-whitelist-submit', 'WhitelistController@create');

Route::get('/tools', function () {
    return view('tools',[ 'nav' => 'tools' ]);
});

Route::get('/best-practices-hosting', function () {
    return view('best-practices-hosting',[ 'nav' => 'practices' ]);
});

Route::get('/best-practices-developers', function () {
    return view('best-practices-developers',[ 'nav' => 'practices' ]);
});

Route::get('/best-practices-merchants', function () {
    return view('best-practices-merchants',[ 'nav' => 'practices' ]);
});

Route::get('/council', function () {
    return view('council',[ 'nav' => 'council' ]);
});

Route::get('/about', function () {
    return view('about',[ 'nav' => 'about' ]);
});

Route::get('/contact', function () {
    return view('contact',[ 'nav' => 'none' ]);
});

Route::post('/contact-send', 'ContactController@send');

Route::get('/tos', function () {
    return view('tos',[ 'nav' => 'none' ]);
});

Route::get('/privacy', function () {
    return view('privacy',[ 'nav' => 'none' ]);
});

Auth::routes();

Route::get('/logout', 'HomeController@logout');

Route::match(array('GET', 'POST'),'/home', 'HomeController@index');

Route::post('/account-update', 'HomeController@update');

Route::get('/rule-edit', 'RulesController@edit');

Route::get('/rule-approve', 'RulesController@approve');

Route::post('/rule-save', 'RulesController@save');

Route::get('/whitelist-edit', 'WhitelistController@edit');

Route::get('/whitelist-approve', 'WhitelistController@approve');

Route::post('/whitelist-save', 'WhitelistController@save');