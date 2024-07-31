<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/dashboard', [HomeController::class, 'login_home'])
    ->middleware(['auth','verified'])
    ->name('dashboard');

Route::get('/myorders', [HomeController::class, 'myorders'])
    ->middleware(['auth','verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

route::get('admin/dashboard',[HomeController::class, 'index'])->
    middleware(['auth','admin']);

route::get('view_category',[AdminController::class, 'view_category'])->
    middleware(['auth','admin']);
route::post('add_category',[AdminController::class, 'add_category'])->
    middleware(['auth','admin']);
route::get('delete_category/{id}',[AdminController::class, 'delete_category'])->
    middleware(['auth','admin']);
route::get('edit_category/{id}',[AdminController::class, 'edit_category'])->
    middleware(['auth','admin']);
route::post('update_category/{id}',[AdminController::class, 'update_category'])->
    middleware(['auth','admin']);
route::get('add_product',[AdminController::class, 'add_product'])->
    middleware(['auth','admin']);
route::post('upload_product',[AdminController::class, 'upload_product'])->
    middleware(['auth','admin']);
route::get('view_product',[AdminController::class, 'view_product'])->
    middleware(['auth','admin']);
route::get('edit_product/{id}',[AdminController::class, 'edit_product'])->
    middleware(['auth','admin']);
route::get('delete_product/{id}',[AdminController::class, 'delete_product'])->
    middleware(['auth','admin']);
route::post('update_product/{id}',[AdminController::class, 'update_product'])->
    middleware(['auth','admin']);
route::get('search_product',[AdminController::class, 'search_product'])->
    middleware(['auth','admin']);
// Home Controller routes

route::get('product_details/{id}',[HomeController::class, 'product_details']);

route::get('add_to_cart/{id}',[HomeController::class, 'add_to_cart'])
->middleware(['auth', 'verified']);

route::get('mycart',[HomeController::class, 'mycart'])
->middleware(['auth', 'verified']);

route::get('remove_from_cart/{id}',[HomeController::class, 'remove_from_cart'])
->middleware(['auth', 'verified']);

route::post('confirm_order',[HomeController::class, 'confirm_order'])
->middleware(['auth', 'verified']);

Route::controller(HomeController::class)->group(function(){
    Route::get('stripe/{value}', 'stripe');
    Route::post('stripe/{value}', 'stripePost')->name('stripe.post');
});


route::get('view_orders',[AdminController::class, 'view_orders'])
-> middleware(['auth','admin']);

route::get('on_the_way/{id}',[AdminController::class, 'on_the_way'])
-> middleware(['auth','admin']);
route::get('delivered/{id}',[AdminController::class, 'delivered'])
-> middleware(['auth','admin']);
route::get('print_pdf/{id}',[AdminController::class, 'print_pdf'])
-> middleware(['auth','admin']);

