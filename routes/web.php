<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PersonController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\RiddleController;
use App\Http\Controllers\Admin\ArticleController;

// Livewire
use App\Http\Livewire\Admin\ArticleIndex;
use App\Http\Livewire\Admin\CategoryArticleIndex;
use App\Http\Livewire\Admin\CategoryIndex;
use App\Http\Livewire\Admin\Dashboard;
use App\Http\Livewire\Admin\FaqIndex;
use App\Http\Livewire\Admin\NewsletterIndex;
use App\Http\Livewire\Admin\PersonIndex;
use App\Http\Livewire\Admin\QuoteIndex;
use App\Http\Livewire\Admin\RiddleIndex;
use App\Http\Livewire\SelectOption;

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

Route::middleware(['auth:sanctum', 'verified', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('articles', ArticleIndex::class)->name('articles.index');
    // 
    Route::get('articles/create', [ArticleController::class, 'create']);
    Route::post('articles/store', [ArticleController::class, 'store']);
    Route::get('articles/edit/{articleID}', [ArticleController::class, 'edit']);
    Route::put('articles/update', [ArticleController::class, 'update'])->name('updateArticle');
    //
    Route::get('category-article', CategoryArticleIndex::class)->name('category-article.index');
    Route::get('dashboard', Dashboard::class)->name('dashboard');
    Route::get('categories', CategoryIndex::class)->name('categories.index');
    Route::get('faqs', FaqIndex::class)->name('faqs.index');
    Route::get('newsletters', NewsletterIndex::class)->name('newsletters.index');
    Route::get('persons', PersonIndex::class)->name('persons.index');
    Route::get('quotes', QuoteIndex::class)->name('quotes.index');
    Route::get('riddles', RiddleIndex::class)->name('riddles.index');
    
    Route::get('selects', SelectOption::class)->name('selects.index');

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
