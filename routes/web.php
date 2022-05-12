<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    if (Auth::check()) {
        return redirect(config('app.routeLocale') . '/outerSpace');
    } else {
        return redirect('/en/');
    }
});
// Route::get('es/login', function () {
//     if (Auth::check()) {
//         return redirect('/es/outerSpace');
//     } else {
//         return redirect('/es/login');
//     }
// });
// Route::get('es/register', function () {
//     if (Auth::check()) {
//         return redirect('/es/outerSpace');
//     } else {
//         return redirect('/es/login');
//     }
// });

Route::get('/dashboard', function () {
    return redirect(config('app.routeLocale') . '/outerSpace');
});
// Route::get(config('app.routeLocale') . '/dashboard', function () {
//     return redirect(config('app.routeLocale') . '/outerSpace');
// });


Route::group(['prefix' => '{locale}', 'where' => ['locale' => '[a-zA-Z]{2}'], 'middleware' => ['locale']], function () {
    Route::get('/', function () {
        if (Auth::check()) {
            return redirect(config('app.routeLocale') .'/outerSpace');
        } else {
            return view('landingPage.landingPage');
        }
    });
    Route::get('/login', function () {
        if (Auth::check()) {
            return redirect('/es/outerSpace');
        } else {
            return view('auth.login');
        }
    });
    Route::get('/register', function () {
        if (Auth::check()) {
            return redirect('/es/outerSpace');
        } else {
            return view('auth.register');
        }
    });

    Route::middleware([
        'auth:sanctum',
        config('jetstream.auth_session'),
        'verified'
    ])->group(function () {
        Route::get('/outerSpace', function () {
            return view('dashboard');
        })->name('dashboard');
    });
});

require_once __DIR__ . './fortify.php';
require_once __DIR__ . './jetstream.php';

