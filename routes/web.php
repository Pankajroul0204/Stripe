<?php

use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::post('/',[PaymentController::class,'checkout']);

Route::get('success', function () {
    return "Success";
})->name('success');

Route::get('failed', function () {
    return "Failed";
})->name('failed');