<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BannerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PagesController;

Route::get('/', [PagesController::class, 'index'])->name('welcome');
Route::get('/home', [PagesController::class, 'index'])->name('home');
Route::get('/welcome', [PagesController::class, 'index'])->name('welcome');

// view product
// Route::get('/product/{product}', [PagesController::class, 'viewproduct'])->name('viewproduct');

// view product
Route::get('/viewproduct/{id}', [PagesController::class, 'viewproduct'])->name('viewproduct');





// route for about and contact page
Route::get('/about', [PagesController::class, 'about'])->name('about');
Route::get('/contact', [PagesController::class, 'contact'])->name('contact');


Route::middleware(['auth'])->group(function(){
// Route for displaying all banners
Route::get('/banners', [BannerController::class, 'index'])->name('banners.index');

// Route for showing the form to create a new banner
Route::get('/banners/create', [BannerController::class, 'create'])->name('banners.create');

// Route for storing a new banner
Route::post('/banners/store', [BannerController::class, 'store'])->name('banners.store');

// Route for showing a specific banner for editing
Route::get('/banners/{banner}/edit', [BannerController::class, 'edit'])->name('banners.edit');

// Route for updating a specific banner
Route::post('/banners/{banner}/update', [BannerController::class, 'update'])->name('banners.update');

// Route for deleting a specific banner using GET
Route::get('/banners/{banner}/destroy', [BannerController::class, 'destroy'])->name('banners.destroy');


//categories ko lagi routes
// Route for displaying all categories
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');

// Route for showing the form to create a new category
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');

// Route for storing a new category
Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');

// Route for showing a specific category for editing
Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');

// Route for updating a specific category
Route::post('/categories/{category}/update', [CategoryController::class, 'update'])->name('categories.update');


// Route for deleting a specific category
Route::get('/categories/{id}/destroy', [CategoryController::class, 'destroy'])->name('categories.destroy');
Route::post('/categories/destroy/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');



//route for index of product
Route::resource('products', ProductController::class);


Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
// Route::post('/products/{id}/update', [ProductController::class, 'update'])->name('products.update');
// web.php
Route::put('/products/{id}/update', [ProductController::class, 'update'])->name('products.update');
Route::post('/products/{id}/update', [ProductController::class, 'update'])->name('products.update');

Route::get('/products/{id}/destroy', [ProductController::class, 'destroy'])->name('product.destroy');




});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
