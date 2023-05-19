<?php
use App\Http\Controllers\WebController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

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

Route::get('/pertama', [WebController::class, 'index']);
Route::get('/', [OrderController::class, 'index']);

Route::post('/checkout', [OrderController::class, 'checkout']);

Route::get('/payment', [WebController::class, 'payment']);
Route::post('/payment', [WebController::class, 'payment_post']);