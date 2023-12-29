<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\LoginController;

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

// Route::get('/', function () {
//     return view('welcome');
// });/

// routes/web.php
Route::get('dashboard', [LoginController::class, 'dashboard'])->name('dashboard');
Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('custom-login', [LoginController::class, 'customLogin'])->name('login.custom');
Route::get('register', [LoginController::class, 'registration'])->name('register');
Route::post('custom-registration', [LoginController::class, 'customRegistration'])->name('register.custom');
Route::get('signout', [LoginController::class, 'signOut'])->name('signout');

// Display all blog posts
Route::get('/index', [BlogController::class, 'index'])->name('blog.index');

// Display the form to create a new blog post
Route::get('/blog/create', [BlogController::class, 'create'])->name('blog.create');

// Store a new blog post
Route::post('/blog', [BlogController::class, 'store'])->name('blog.store');

// Display the form to edit an existing blog post
Route::get('/blog/{id}/edit', [BlogController::class, 'edit'])->name('blog.edit');

// Update an existing blog post
Route::put('/blog/{id}', [BlogController::class, 'update'])->name('blog.update');

// Delete an existing blog post
Route::delete('/blog/{id}', [BlogController::class, 'destroy'])->name('blog.destroy');


Route::get('/blog/search', [BlogController::class, 'search'])->name('blog.search');

