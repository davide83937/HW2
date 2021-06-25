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


Route::get('/log', "LoginController@login");

Route::post('/loginn', "LoginController@checkLogin")->name('home');

Route::get('prodotti', "HomeController@generaProdotti");

Route::get('pref', "HomeController@generaPreferiti");

Route::get('/aggPref/{nome}/{img}', "HomeController@aggiungiPreferito");

Route::get('/elPref/{nome}', "HomeController@eliminaPreferito");

Route::get('check', "HomeController@sessionCheck");

Route::get('logout', "HomeController@logout");

Route::get('checkUser/{nome}', 'RegisterController@verificaUser');

Route::get('checkEmail/{email}', 'RegisterController@verificaEmail');

Route::post('/register', 'RegisterController@registrazioneCliente')->name('registra');

Route::get('carrello', 'HomeController@accessoCarrello');

Route::get('cerca/{parola}', 'HomeController@cerca');

Route::get('caricaCarrello', 'ShopController@caricaCarrello');

Route::get('aggiungiCarrello/{nome}/{nomeModello}', 'ShopController@aggiungiCarrello');

Route::get('sottraiCarrello/{nome}/{nomeModello}', 'ShopController@eliminaCarrello');

Route::get('sottraiCarrello2/{nome}/{nomeModello}', 'ShopController@eliminaCarrello2');

Route::get('aggiornaPrezzo', 'ShopController@aggiornaPrezzo');

Route::get('home', 'HomeController@accessoHome');

Route::get('tastoCarrello', 'HomeController@tastoCarrello');

Route::get('acquisti', 'HomeController@accessoAcquisti');

Route::get('caricaAcquisti', 'AcquistiController@caricaAcquisti');

Route::get('acquista/{carta}/{via}/{numero}/{telefono}', 'ShopController@acquista');

/*Route::get('login', function(){
    return view('login');
});*/