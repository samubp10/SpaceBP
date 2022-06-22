<?php

use App\Http\Controllers\NewsController;
use App\Http\Controllers\PictureController;
use App\Http\Controllers\UserController;
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

// Route::get('/dashboard', function () {
//     return redirect(config('app.routeLocale') . '/outerSpace');
// });

// Route::get('/dashboard', [NewsController::class, 'show'])->name('show');
// Route::get('/outerSpace', [NewsController::class, 'show'])->name('show');


Route::get('/two-factor-challenge', function () {
    return redirect(config('app.routeLocale') . '/two-factor-challenge');
});
Route::get('/email/verify', function () {
    return redirect(config('app.routeLocale') . '/email/verify');
});


Route::get('/profile', function () {
    return redirect(config('app.routeLocale') . '/profile');
});

Route::get('/login', function () {
    return redirect(config('app.routeLocale') . '/login');
});

Route::group(['prefix' => '{locale}', 'where' => ['locale' => '[a-zA-Z]{2}'], 'middleware' => ['locale']], function () {


    Route::get('/', function () {
        if (Auth::check()) {
            return redirect(config('app.routeLocale') . '/outerSpace');
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


    Route::get('/outerSpace', function () {
        return view('outerSpace.outerSpace');
    })->name('outerspace');

    Route::group(['prefix' => 'news', 'as' => 'news.'], function () {

        // Route::get('editar/{tablero}', [tableroController::class, 'editar'])->name('editar');
        Route::get('/', [NewsController::class, 'show']);

        Route::get('like', [NewsController::class, 'like'])->name('like')->middleware(['auth']);


        Route::get('showSavedNews', [NewsController::class, 'showSavedNews'])->name('showSavedNews')->middleware(['auth']);

        // Route::get('borrar/{tablero}', [tableroController::class, 'borrar'])->name('borrar');

        // Route::get('insertar/', [tableroController::class, 'insertar'])->name('insertar');

        // Route::post('crearTablero', [tableroController::class, 'crearTablero'])->name('crear');
    });

    Route::group(['prefix' => 'gallery', 'as' => 'gallery.'], function () {

        Route::get('/', [PictureController::class, 'show']);

        Route::get('watch/{date}', [PictureController::class, 'watch'])->name('watch');

        Route::get('showSavedPictures', [PictureController::class, 'showSavedPictures'])->name('showSavedPictures')->middleware(['auth']);

        Route::get('like', [PictureController::class, 'like'])->name('like')->middleware(['auth']);
    });

    Route::group(['prefix' => 'user', 'as' => 'user.', 'middleware' => 'admin'], function () {


        Route::get('show', [UserController::class, 'show'])->name('show');

        Route::get('edit/{user}', [UserController::class, 'edit'])->name('edit');

        Route::get('delete/{user}', [UserController::class, 'delete'])->name('delete');

        Route::post('update/{user}', [UserController::class, 'update'])->name('update');
    });
});

require_once __DIR__ . './fortify.php';
require_once __DIR__ . './jetstream.php';
