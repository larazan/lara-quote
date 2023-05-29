<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PersonController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\RiddleController;

// Livewire
use App\Http\Livewire\CategoryIndex;
use App\Http\Livewire\PersonIndex;
use App\Http\Livewire\QuoteIndex;
use App\Http\Livewire\RiddleIndex;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('categories', CategoryIndex::class)->name('categories.index');
    Route::get('persons', PersonIndex::class)->name('persons.index');
    Route::get('quotes', QuoteIndex::class)->name('quotes.index');
    Route::get('riddles', RiddleIndex::class)->name('riddles.index');

});

Route::get('/saveperson', [PersonController::class, 'savePerson']);
Route::get('/savequote', [QuoteController::class, 'saveQuote']);
Route::get('/saveriddle', [RiddleController::class, 'saveRiddle']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
