<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::prefix('users')->name('user.')->controller(UserController::class)
    // ->middleware(MyFirstMiddleware::class) //Posso importar dessa forma caso não tenha declarado o Middleware no arquivo: Kernel.php
    ->middleware('MyFirstMiddleware') 
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::get('/{user}', 'show')
            ->missing(function () {
                return redirect()->route('user.index');
            })
            ->name('show');
        Route::post('/create', 'store')->name('store');
        Route::get('/edit/{user}', 'edit')->name('edit');
        Route::put('/update/{user}', 'update')->name('update');
        Route::delete('/destroy/{user}', 'destroy')->name('destroy');
    });

Route::fallback(function () {
    return redirect()->route('user.index');
});
