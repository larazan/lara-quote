<?php

use App\Http\Controllers\Api\BusinessController;
use App\Http\Controllers\Api\FaqController;
use App\Http\Controllers\Api\PersonController;
use App\Http\Controllers\Api\QuoteController;
use App\Http\Controllers\Api\RiddleController;
use App\Http\Controllers\Api\SettingController;
use App\Http\Controllers\Api\TagController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('quotes', [QuoteController::class, 'index']);
Route::get('quotes/{id}', [QuoteController::class, 'show']);
Route::get('quotes/tags/{tag}', [QuoteController::class, 'showByTag']);

Route::get('tags', [TagController::class, 'index']);

Route::get('riddles', [RiddleController::class, 'index']);
Route::get('riddles/random/{id}', [RiddleController::class, 'random']);

Route::get('persons', [PersonController::class, 'index']);
Route::get('persons/show/{id}', [PersonController::class, 'show']);
Route::get('persons/{letter}', [PersonController::class, 'showByLetter']);

Route::get('faqs', [FaqController::class, 'index']);

Route::get('permission', [BusinessController::class, 'permission']);
Route::get('privacy', [BusinessController::class, 'privacy']);
Route::get('terms', [BusinessController::class, 'terms']);
Route::get('about', [BusinessController::class, 'about_us']);

Route::get('settings', [SettingController::class, 'index']);