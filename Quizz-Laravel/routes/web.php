<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuizzController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

//Route login/s'inscrire
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

//Dashboard
Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth:sanctum', 'verified'])->name('dashboard');

//Route Profil
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Middleware auth admin route/api
//Route gestion des rôles/ auth
Route::middleware(['auth:sanctum', 'role:admin'])->group(function(){
     
Route::get('/admin', [AdminController::class, 'index'])->name('admin.private.index');
Route::get('/getFullUsersAnswers', [AdminController::class, 'getFullUsersAnswers'])->name('admin.private.getFullUsersAnswers');
Route::get('/getAnswersByEmail', [AdminController::class, 'getAnswersByEmail'])->name('admin.private.getAnswersByEmail');
Route::get('/getAnswersByUser', [AdminController::class, 'getAnswersByUser'])->name('admin.private.getAnswersByUser');
        
});

 // Route::get('/private', [AdminController::class, 'getFullUsers']);
        // Route::get('/answer', [AdminController::class, 'getFullUsersProject']);
//         Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create');
// Route::post('/admin', [AdminController::class, 'store'])->name('admin.store');

require __DIR__.'/auth.php';

//Route Reponses au quizz
Route::get('/quizz', [QuizzController::class, 'index'])->name('quizz.index');
Route::get('/quizz/create', [QuizzController::class, 'create'])->name('quizz.create')->where('id', '[0-9]+');
Route::post('/quizz', [QuizzController::class, 'store'])->name('quizz.store');
Route::get('/quizz/{id}', [QuizzController::class, 'show'])->name('quizz.show');
//Route::Update ?
//Route::Delete ?