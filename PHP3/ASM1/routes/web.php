<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FavoritesController;
use App\Models\admin;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/product', [ProductController::class, 'product'])->name('product');
Route::get('/product', [ProductController::class, 'product'])->name('product');
Route::get('/favorites', [FavoritesController::class, 'favorites'])->name('favorites');

Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/postlogin', [UserController::class, 'postlogin'])->name('postlogin');
Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/postregister', [UserController::class, 'postregister'])->name('postregister');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/product/category/{category_id}', [ProductController::class, 'product'])->name('category');
Route::get('/product/detail/{product_id}', [ProductController::class, 'detail'])->name('detail');
Route::get('/about', [AboutController::class, 'about'])->name('about');

Route::get('/cart', [CartController::class, 'cart'])->name('cart');
Route::post('/cart/add', [CartController::class, 'addCart'])->name('addcart');
Route::post('/cart/remove/{productId}', [CartController::class, 'removeFromCart'])->name('removeFromCart');
Route::get('/contact', [ProductController::class, 'contact'])->name('contact');


Route::get('/showcheckout', [OrderController::class, 'showcheckout'])->name('showcheckout');
Route::post('/checkout', [OrderController::class, 'checkout'])->name('checkout');
Route::get('/orders/{order}', [OrderController::class, 'show'])->name('ordershow');







// admin 

Route::get('/admin', [AdminController::class, 'index'])->name('admin');
Route::get('/categorys', [AdminController::class, 'categorys'])->name('categorys');

Route::get('/orders', [AdminController::class, 'orders'])->name('orders');
Route::put('/orders/{order}/updateStatus', [AdminController::class, 'updateStatus'])->name('updateStatus');
Route::delete('/orders/{order}', [AdminController::class, 'deleteOrder'])->name('deleteOrder');
Route::get('/order/{id}', [AdminController::class, 'show'])->name('orderdetails');


// Product routes
Route::get('/productlist', [AdminController::class, 'productlist'])->name('productlist');
Route::get('/addproduct', [AdminController::class, 'addproduct'])->name('addproduct');
Route::post('/store', [AdminController::class, 'store'])->name('store');
Route::get('/product/{id}/edit', [AdminController::class, 'edit'])->name('edit');
Route::put('/product/{id}', [AdminController::class, 'update'])->name('update');
Route::delete('/product/{id}', [AdminController::class, 'destroy'])->name('destroy');

// User routes
Route::get('/users', [AdminController::class, 'users'])->name('users');
Route::get('/users/create', [AdminController::class, 'create'])->name('adduser');
Route::post('/users', [AdminController::class, 'storeuser'])->name('storeuser');
Route::get('/users/{id}/edit', [AdminController::class, 'edit'])->name('edituser');
Route::delete('/users/{id}', [AdminController::class, 'deleteUser'])->name('deleteuser');

