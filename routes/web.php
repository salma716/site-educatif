<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\VegetableController;
use App\Http\Controllers\FruitController;
use App\Http\Controllers\NumberController;
use App\Http\Controllers\LetterController;
use App\Http\Controllers\SeasonController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\FlagController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\CustomRegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\CategoryObjectController;
use App\Http\Controllers\CategoryController;
use App\Models\Category;
use App\Http\Controllers\CategoryUserController;


Route::get('/', function () {
    return view('welcome'); 
})->name('welcome');

require __DIR__.'/auth.php';

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [LoginController::class, 'login']);

Route::get('/custom_register', [CustomRegisterController::class, 'show'])->name('custom.register');
Route::post('/custom_register', [CustomRegisterController::class, 'store'])->name('custom.register.store');


Route::middleware('auth')->group(function () {
    Route::get('/home', function () {
        $categories = Category::all();
        return view('home', compact('categories'));
    })->name('home');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/animals', [AnimalController::class, 'index'])->name('animals');
    Route::get('/colors', [ColorController::class, 'index'])->name('colors');
    Route::get('/vegetables', [VegetableController::class, 'index'])->name('vegetables');
    Route::get('/fruits', [FruitController::class, 'index'])->name('fruits');
    Route::get('/numbers', [NumberController::class, 'index'])->name('numbers');
    Route::get('/letters', [LetterController::class, 'index'])->name('letters');
    Route::get('/seasons', [SeasonController::class, 'index'])->name('seasons');
    Route::get('/vehicules', [VehicleController::class, 'index'])->name('vehicules');
    Route::get('/flags', [FlagController::class, 'index'])->name('flags');
    Route::get('/quiz', [QuizController::class, 'index'])->name('quiz');
    Route::get('/games', [GameController::class, 'index'])->name('games');
});


Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.user.show');



Route::get('/admin', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin', [AdminAuthController::class, 'login']);


Route::middleware(['auth', App\Http\Middleware\AdminOnly::class])->prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::resource('categories', AdminCategoryController::class);
    Route::resource('categories.objects', CategoryObjectController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/categories/{category}', [App\Http\Controllers\CategoryUserController::class, 'show'])->name('categories.user.show');
});
Route::get('/quiz', function () {
    return view('quiz');
});

Route::get('/games', function () {
    return view('games');
});
