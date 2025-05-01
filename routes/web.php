<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Auth\Register;
use App\Livewire\Auth\Login;

Route::redirect('/', '/home')->middleware(['auth']);
Route::get('/login', Login::class)->name('login');
// dd(Register::class);
Route::get('/register', Register::class)->name('register');

Route::get('/chatbot', function () {
    return view('livewire.dashboard');
})->middleware(['auth'])->name('chatbot');

Route::get('/home', function () {
    return view('home');
})->middleware(['auth'])->name('home');

Route::get('/menu', \App\Livewire\MenuPage::class)->middleware(['auth'])->name('menu');

Route::get('/checkout', \App\Livewire\CheckoutPage::class)->middleware(['auth'])->name('checkout');

Route::get('/payment', \App\Livewire\PaymentPage::class)->middleware(['auth'])->name('payment');

Route::get('/success', function () {
    return view('success');
})->middleware(['auth'])->name('success');