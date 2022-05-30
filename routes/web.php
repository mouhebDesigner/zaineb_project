<?php

use App\Models\Projet;
use App\Models\Resource;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JuryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ParticiperController;
use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\Admin\ProjetController;
use App\Http\Controllers\ContactAdminController;
use App\Http\Controllers\Admin\ConcourController;
use App\Http\Controllers\ConcourController as ConcourEtudiant;

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
            'users' => UserController::class,
            'projets' => ProjetController::class
        ]);
        Route::get('resultat', function(){
            return view('admin.projets.gagnant');
        });
        Route::get('projets/{id}/gagnant', [ProjetController::class, 'edit']);
        Route::put('gagnant', [ProjetController::class, 'affectGagnant']);
        Route::resource('contacts', ContactAdminController::class)->only(['index', 'show', 'destroy']);
        Route::get('concours/{concour}/projet', [ConcourController::class, 'getProjets'])->name('concours.listerProjet');
    });
});
Route::get('profile', function(){
    return view('profile');
})->middleware('auth');
Route::get('concours/{id}', [ConcourEtudiant::class, 'show']);
Route::get('concour/{id}/participer', [ConcourEtudiant::class, 'participer'])->middleware('auth');
Route::post('participer', [ConcourEtudiant::class, 'store']);
Route::put('participer/{id}', [ConcourEtudiant::class, 'update']);
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
    $filepath = public_path().$resource->path;
    return Response::download($filepath);
})->name('download.file');
Route::get('download/{id}/prototype', function($id){
    $projet = Projet::find($id);
    $filepath = public_path()."/".$projet->prototype;
    return Response::download($filepath);
})->name('download.file.prototype');
Route::get('download/{id}/bmc', function($id){
    $projet = Projet::find($id);
    $filepath = public_path()."/".$projet->bmc;
    return Response::download($filepath);
})->name('download.file.bmc');
Route::get('download/{id}/planAffaire', function($id){
    $projet = Projet::find($id);
    $filepath = public_path()."/".$projet->planAffaire;
    return Response::download($filepath);
})->name('download.file.planAffaire');
Route::delete('projet/{projet}', [ProjetController::class, 'destroy'])->name('projets.destroy');
Route::post('commentaires', [CommentaireController::class, 'store'])->middleware('auth');
Route::get('projet/{id}/edit', [ConcourEtudiant::class, 'edit'])->name('projets.edit');
