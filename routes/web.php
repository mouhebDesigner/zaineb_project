<?php

use App\Models\Resource;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JuryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ConcourController;
use App\Http\Controllers\ContactController;

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
            'enseignants' => JuryController::class,
            'users' => UserController::class
        ]);
        Route::get('concours/{concour}/projet', [ConcourController::class, 'getProjets'])->name('concours.listerProjet');
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
// Contact admin
Route::resource('contact', ContactController::class);


Route::get('download/{id}', function($id){
    $resource = Resource::find($id);
    $filepath = public_path('storage/').$resource->path;
    return Response::download($filepath);
})->name('download.file');