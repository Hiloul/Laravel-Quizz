<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuizzController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\QuestionController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SocialShareButtonsController;

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
//Le welcome et dashboard sont des vue vuejs et le reste vue blade
Route::get('/', function () {
    return view('welcome');
});
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

//Route Private admin
Route::middleware(['auth:sanctum', 'role:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.private.index');
    Route::get('/getFullUsersAnswers', [AdminController::class, 'getFullUsersAnswers'])->name('admin.private.getFullUsersAnswers');
    Route::get('/getAnswersByEmail', [AdminController::class, 'getAnswersByEmail'])->name('admin.private.getAnswersByEmail');
    Route::get('/getAnswersByUser', [AdminController::class, 'getAnswersByUser'])->name('admin.private.getAnswersByUser');
    Route::get('/search', [AdminController::class, 'search'])->name('admin.private.search');
//Route des catégories
Route::get('/categories', [CategoryController::class, 'index'])->name('admin.categories.index');  
Route::get('/categorie/create', [CategoryController::class, 'create'])->name('admin.categories.create')->where('id', '[0-9]+');
Route::post('/categories', [CategoryController::class, 'store'])->name('admin.categories.store');
    // Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class);
    // Route::delete('categories_mass_destroy', [\App\Http\Controllers\Admin\CategoryController::class, 'massDestroy'])->name('categories.mass_destroy');
      
});

 //Route des questions
 Route::resource('questions', \App\Http\Controllers\Admin\QuestionController::class);
 Route::delete('questions_mass_destroy', [\App\Http\Controllers\Admin\QuestionController::class, 'massDestroy'])->name('questions.mass_destroy');


//Route de partage
Route::get('/social-media-share', [SocialShareButtonsController::class,'ShareWidget']);

//Route Reponses au quizz
Route::get('/quizz', [QuizzController::class, 'index'])->name('quizz.index');
Route::get('/quizz/create', [QuizzController::class, 'create'])->name('quizz.create')->where('id', '[0-9]+');
Route::post('/quizz', [QuizzController::class, 'store'])->name('quizz.store');
Route::get('/quizz/{id}', [QuizzController::class, 'show'])->name('quizz.show');
Route::get('/delete/{id}', [QuizzController::class, 'destroy'])->name('quizz.destroy');

        
//Route::Update ?
//Route::Delete ?


Route::get('/social-media-share', [SocialShareButtonsController::class,'ShareWidget']);


require __DIR__ . '/auth.php';
