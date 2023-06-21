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

//* Entendendo a estrutura das rotas.
// Route::get($uri, $callback);
// Route::post($uri, $callback);
// Route::put($uri, $callback);
// Route::patch($uri, $callback);
// Route::delete($uri, $callback);
// Route::options($uri, $callback);

// Route::match(['get', 'post'], '/', function () {

// });

// Route::any('/', function () {

// });

//* Antes, sem agrupamento
// Route::get('/users/create', [UserController::class, 'create'])->name('user.create');
// Route::post('/users/create', [UserController::class, 'store'])->name('user.store');
// Route::get('/users', [UserController::class, 'index'])->name('user.index');
// Route::get('/users/{id?}', [UserController::class, 'show'])->name('user.show');
// Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
// Route::put('/users/update/{id}', [UserController::class, 'update'])->name('user.update');
// Route::delete('/users/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');

//* Depois, com as rotas agrupadas
// Dessa forma, evita repetição de código e facilita a manutenção e alteração de parâmetros e nomes, caso desejado
Route::prefix('users')->name('user.')->controller(UserController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::get('/{user}', 'show')
        ->missing(function () {
            return redirect()->route('user.index');
        })
        ->name('show');
    //->withTrashed(); //*traz usuários que foram deletados (graças ao SoftDeletes adicionado)
    Route::post('/create', 'store')->name('store');
    Route::get('/edit/{id}', 'edit')->name('edit');
    Route::put('/update/{id}', 'update')->name('update');
    Route::delete('/destroy/{id}', 'destroy')->name('destroy');
});

Route::fallback(function () {
    return redirect()->route('user.index');
});
