<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ThingController;
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
})->name('/');

Route::name('user.')->group(function () {
    Route::view('/private', 'private')->middleware('auth')->name('private');
    Route::get('/login', function() {
        if (Auth::check()) {
            return redirect(route('user.private'));
        }
        return view('login');
    })->name('login');

    Route::post('/login', [LoginController::class, 'login']);

    Route::get('/logout', function () {
        Auth::logout();
        return redirect(route('/'));
    })->name('logout');

    Route::get('/registration', function () {
        if (Auth::check()) {
            return redirect(route('user.private'));
        }
        return view('registration');
    })->name('registration');

    Route::post('/registration', [RegisterController::class, 'save']);
});

Route::group(['middleware' => 'auth'], function() {

    Route::get('/things/create', [ThingController::class, 'create'])
        ->name('thing.create');
    Route::post('/things', [ThingController::class, 'save'])
        ->name('thing.store');
    Route::get('/things/{id}/edit', [ThingController::class, 'edit'])
        ->name('thing.edit');
    Route::put('/things/{id}', [ThingController::class, 'update'])
        ->name('thing.update');
    Route::delete('/things/{id}', [ThingController::class, 'delete'])
        ->name('thing.delete');
    Route::get('/things/', [ThingController::class, 'index'])
        ->name('thing.index');

});
