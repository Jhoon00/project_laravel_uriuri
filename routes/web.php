<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RedirectIfGuest;
use App\Models\Post;

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

Route::middleware([RedirectIfGuest::class])->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('home');
});

Route::middleware(['web'])->group(function () {
    require __DIR__.'/auth.php';
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('/post', PostController::class)->middleware(['auth', 'verified']);
Route::patch('/post/{post}/trade', [PostController::class, 'trade'])->middleware(['auth', 'verified']);

Route::resource('/post/{post}/comments', CommentController::class)->middleware(['auth', 'verified']);

Route::get('/mystore', function () {
    $posts = Post::orderByDesc('created_at')->get();
    return view('mystore', ["posts"=>$posts]);
})->middleware(['auth', 'verified'])->name('mystore');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
