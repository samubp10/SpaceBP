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
    return redirect('/en/');
});

Route::get('/dashboard', function () {
    return redirect('/en/dashboard');
});

Route::group(['prefix' => '{locale}', 'where' => ['locale' => '[a-zA-Z]{2}'], 'middleware' => ['locale']], function () {
    Route::get('/', function () {
        return view('landingPage.landingPage');
    });
    Route::get('/login', function () {
        return view('auth.login');
    });
    Route::get('/register', function () {
        return view('auth.register');
    });

    Route::middleware([
        'auth:sanctum',
        config('jetstream.auth_session'),
        'verified'
    ])->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
    });
   
});

require_once __DIR__ . './fortify.php';
