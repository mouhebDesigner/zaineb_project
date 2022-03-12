<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JuryController;
use App\Http\Controllers\ConcourController;

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

Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resources([
            'concours' => ConcourController::class,
            'enseignants' => JuryController::class
        ]);
    });
});

Route::get('/', function () {
    return view('welcome');
});
Route::post('/home', function () {
    return view('admin.home');
});
Route::get('/login', function () {
    return view('auth.login');
});
Route::get('register/enseignant', function(){
    return view('auth.register_enseignant');
});

Route::get('register/etudiant', function(){
    return view('auth.register_etudiant');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
