<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuizzController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OptionController;
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

//Route Private (admin only)
    Route::middleware(['auth:sanctum', 'role:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.private.index');
    Route::get('/getFullUsersAnswers', [AdminController::class, 'getFullUsersAnswers'])->name('admin.private.getFullUsersAnswers');
    Route::get('/getAnswersByUser', [AdminController::class, 'getAnswersByUser'])->name('admin.private.getAnswersByUser');
    Route::get('/search', [AdminController::class, 'search'])->name('admin.private.search');
    Route::delete('/getFullUsersAnswers/{id}', [AdminController::class, 'destroy'])->name('admin.private.destroy'); 

//Route de gestion des catégories
    Route::get('/categories', [CategoryController::class, 'index'])->name('admin.categories.index');  
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create')->where('id', '[0-9]+');
    Route::post('/categories', [CategoryController::class, 'store'])->name('admin.categories.store');
    Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');
    Route::patch('/categories/{category}', [CategoryController::class, 'update'])->name('admin.categories.update');
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy'); 
});

//Route de gestion des questions
    Route::get('/questions', [QuestionController::class, 'index'])->name('questions.index');  
    Route::get('/questions/create', [QuestionController::class, 'create'])->name('questions.create')->where('id', '[0-9]+');
    Route::post('/questions', [QuestionController::class, 'store'])->name('questions.store');
    Route::get('/questions/{question}/edit', [QuestionController::class, 'edit'])->name('questions.edit');
    Route::put('/questions/{question}', [QuestionController::class, 'update'])->name('questions.update');
    Route::delete('/questions/{id}', [QuestionController::class, 'destroy'])->name('questions.destroy');

//Route des options -> gestion de réponses
    Route::get('/options', [OptionController::class, 'index'])->name('options.index');  
    Route::get('/options/create', [OptionController::class, 'create'])->name('options.create')->where('id', '[0-9]+');
    Route::post('/options', [OptionController::class, 'store'])->name('options.store');
    Route::get('/options/{option}/edit', [OptionController::class, 'edit'])->name('options.edit');
    Route::put('/options/{option}', [OptionController::class, 'update'])->name('options.update');
    Route::delete('/options/{id}', [OptionController::class, 'destroy'])->name('options.destroy');
   
//Route Reponses au quizz principale
    Route::get('/quizz', [QuizzController::class, 'index'])->name('quizz.index');
    Route::get('/quizz/create', [QuizzController::class, 'create'])->name('quizz.create')->where('id', '[0-9]+');
    Route::post('/quizz', [QuizzController::class, 'store'])->name('quizz.store');
    Route::get('/quizz/{id}', [QuizzController::class, 'show'])->name('quizz.show');
    Route::delete('/quizz/{id}', [QuizzController::class, 'destroy'])->name('quizz.destroy');

//Route de partage
    Route::get('/social-media-share', [SocialShareButtonsController::class,'ShareWidget']);

require __DIR__ . '/auth.php';
