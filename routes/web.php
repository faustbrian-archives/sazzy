<?php

use App\Http\Controllers\WebhookController;
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

Route::view('/', 'marketing.index');

Route::view('terms-of-service', 'terms-of-service')->name('terms-of-service');
Route::view('privacy-policy', 'privacy-policy')->name('privacy-policy');

Route::post('stripe/webhook', [WebhookController::class, 'handleWebhook']);
