<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ThingController;
use App\Http\Controllers\UseController;
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

    Route::get('/places/create', [PlaceController::class, 'create'])
        ->name('place.create');
    Route::post('/places', [PlaceController::class, 'save'])
        ->name('place.store');
    Route::get('/places/{id}/edit', [PlaceController::class, 'edit'])
        ->name('place.edit');
    Route::put('/places/{id}', [PlaceController::class, 'update'])
        ->name('place.update');
    Route::delete('/places/{id}', [PlaceController::class, 'delete'])
        ->name('place.delete');
    Route::get('/places/', [PlaceController::class, 'index'])
        ->name('place.index');

    Route::get('/use/create', [UseController::class, 'create'])
        ->name('use.create');
    Route::post('/use', [UseController::class, 'save'])
        ->name('use.store');
    Route::get('/use/', [UseController::class, 'index'])
        ->name('use.index');
    Route::delete('/use/{id}', [UseController::class, 'delete'])
        ->name('use.delete');
});
