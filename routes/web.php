<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\MailController;
use TCG\Voyager\Facades\Voyager;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::resource('/', ProductController::class)->names('home');

Route::view('/Apropos', 'pages.about')->name('Apropos');

Route::view('/gallery', 'pages.gallery')->name('gallery');

Route::view('/faq', 'pages.faq')->name('faq');

Route::view('/contact', 'pages.contact')->name('contact');

Route::post("/contact", [MailController::class, 'handleSubmit'])->name('contact.store'); 

Route::view('/success', 'misc.success')->name('contact.success'); 

Route::get('addToCart/{id}', [ProductController::class, 'addToCart'])->name('addToCart'); 

Route::delete('removeFromCart/{id}', [ProductController::class, 'removeFromCart'])->name("removeFromCart"); 

Route::delete('removeFromCartCheckout/{id}', [ProductController::class, 'removeFromCartCheckout'])->name("removeFromCartCheckout"); 

Route::view("checkout", "pages.checkout"); 

Route::view("order-success", 'misc.success-order')->name("order.success"); 

