<?php

use App\Http\Controllers\NewsController;
use App\Http\Controllers\PictureController;
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

    // Route::middleware([
    //     'auth:sanctum',
    //     config('jetstream.auth_session'),
    //     'verified'
    // ])->group(function () {
    //     Route::get('/outerSpace', function () {
    //         return view('outerSpace.outerSpace');
    //     })->name('outerspace');
    // });

    Route::get('/outerSpace', function () {
        return view('outerSpace.outerSpace');
    })->name('outerspace');

    Route::group(['prefix' => 'news', 'as' => 'news.'], function () {

        // Route::get('editar/{tablero}', [tableroController::class, 'editar'])->name('editar');
        Route::get('/', [NewsController::class, 'show']);


        // Route::post('actualizar/{tablero}', [tableroController::class, 'actualizar'])->name('actualizar');

        // Route::get('borrar/{tablero}', [tableroController::class, 'borrar'])->name('borrar');

        // Route::get('insertar/', [tableroController::class, 'insertar'])->name('insertar');

        // Route::post('crearTablero', [tableroController::class, 'crearTablero'])->name('crear');
    });

    Route::group(['prefix' => 'gallery', 'as' => 'gallery.'], function () {

        Route::get('/', [PictureController::class, 'show']);

        // Route::get('ver/{idt}', [NotaController::class, 'index'])->name('ver');

        // Route::get('editar/{nota}', [NotaController::class, 'editar'])->name('editar');

        // Route::post('actualizar/{nota}', [NotaController::class, 'actualizar'])->name('actualizar');

        // Route::get('borrar/{nota}', [NotaController::class, 'borrar'])->name('borrar');

        // Route::get('verNotas/{etiqueta}', [NotaController::class, 'notasEtiqueta'])->name('verNotas');

        // Route::get('insertar/', [NotaController::class, 'insertar'])->name('insertar');

        // Route::post('crearNota', [NotaController::class, 'crearNota'])->name('crear');
    });

    // Route::group(['prefix' => 'solarSystem', 'as' => 'solarSystem.'], function () {
    //     Route::get('ver/{idN}', [EtiquetaController::class, 'index'])->name('ver');

    //     Route::get('editar/{etiqueta}', [EtiquetaController::class, 'editar'])->name('editar');

    //     Route::get('borrar/{etiqueta}', [EtiquetaController::class, 'borrar'])->name('borrar');

    //     Route::post('actualizar/{etiqueta}', [EtiquetaController::class, 'actualizar'])->name('actualizar');
    // });
});

require_once __DIR__ . './fortify.php';
require_once __DIR__ . './jetstream.php';
