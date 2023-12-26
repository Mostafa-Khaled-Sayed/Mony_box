<?php

use App\Http\Controllers\Mony\FatoraController;
use App\Http\Controllers\Mony\FatoraController2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Route::get('pay', [fatooracontroller::class, 'payorder'])->name('pay');

// Route::post('callback',[fatooracontroller::class,'paymentcallback']);
Route::get('callback', [FatoraController::class, 'paymentcallback'])->name('callback');
Route::get('error', function () {
    return 'payment faild';
});