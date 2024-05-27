<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ArticleController;
use App\Http\Controllers\Api\BusinessController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\FaqController;
use App\Http\Controllers\Api\PersonController;
use App\Http\Controllers\Api\ProductController;
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

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('logout',[AuthController::class,'logout'])->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('articles', [ArticleController::class, 'index']);
Route::get('articles/{slug}', [ArticleController::class, 'show']);

Route::post('contact', [ContactController::class, 'store']);

Route::get('quotes', [QuoteController::class, 'index']);
Route::get('quotes/{id}', [QuoteController::class, 'show']);
Route::get('quotes/tags/{tag}', [QuoteController::class, 'showByTag']);
Route::get('quotes/slug/{slug}', [QuoteController::class, 'showBySlug']);

Route::get('tags', [TagController::class, 'index']);

Route::get('riddles', [RiddleController::class, 'index']);
Route::get('riddles/random/{id}', [RiddleController::class, 'random']);

Route::get('persons', [PersonController::class, 'index']);
Route::get('persons/show/{slug}', [PersonController::class, 'show']);
Route::get('persons/{letter}', [PersonController::class, 'showByLetter']);

Route::get('faqs', [FaqController::class, 'index']);

Route::get('privacy', [BusinessController::class, 'privacy']);
Route::get('terms', [BusinessController::class, 'terms']);
Route::get('about', [BusinessController::class, 'about_us']);

Route::get('settings', [SettingController::class, 'index']);

Route::get('products', [ProductController::class, 'index']);
Route::post('products', [ProductController::class, 'store']);
Route::get('products/{id}', [ProductController::class, 'show']);
Route::put('product-update/{id}', [ProductController::class, 'update']);
Route::delete('product-delete/{id}', [ProductController::class, 'destroy']);