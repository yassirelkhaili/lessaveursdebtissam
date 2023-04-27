<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\MailController;
use TCG\Voyager\Facades\Voyager;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::resource('/delices', ProductController::class);

Route::view('/', 'pages.home')->name('home');

Route::view('/delices', 'products.index')->name('delices');

Route::view('/Apropos', 'pages.about')->name('Apropos');

Route::view('/gallery', 'pages.gallery')->name('gallery');

Route::view('/faq', 'pages.faq')->name('faq');

Route::view('/contact', 'pages.contact')->name('contact');

Route::post("/contact", [MailController::class, 'handleSubmit'])->name('contact.store'); 

Route::view('/success', 'misc.success')->name('contact.success'); 