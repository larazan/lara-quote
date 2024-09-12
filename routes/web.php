<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\RiddleController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SubscribeController;

use App\Http\Controllers\Admin\ArticleController as AdminArticlesController;

use App\Http\Controllers\Articles\ArticlesController;
use App\Http\Controllers\Auth\ProviderController;
// use App\Http\Controllers\Articles\AuthoredArticles;

// Livewire
use App\Http\Livewire\Admin\AboutUs;
use App\Http\Livewire\Admin\AdvertisingIndex;
use App\Http\Livewire\Admin\AdvSegmentIndex;
use App\Http\Livewire\Admin\PrivacyPolicy;
use App\Http\Livewire\Admin\TermCondition;
use App\Http\Livewire\Admin\ArticleIndex;
use App\Http\Livewire\Admin\CategoryArticleIndex;
use App\Http\Livewire\Admin\CategoryIndex;
use App\Http\Livewire\Admin\ContactIndex;
use App\Http\Livewire\Admin\Dashboard;
use App\Http\Livewire\Admin\FaqIndex;
use App\Http\Livewire\Admin\NewsletterIndex;
use App\Http\Livewire\Admin\PersonIndex;
use App\Http\Livewire\Admin\PersonDetail;
use App\Http\Livewire\Admin\PermissionIndex;
use App\Http\Livewire\Admin\PlanIndex;
use App\Http\Livewire\Admin\QuoteIndex;
use App\Http\Livewire\Admin\RiddleIndex;
use App\Http\Livewire\Admin\RoleIndex;
use App\Http\Livewire\Admin\SettingIndex;
use App\Http\Livewire\Admin\TagIndex;
use App\Http\Livewire\Admin\TagsListIndex;
use App\Http\Livewire\Admin\UserIndex;
use App\Http\Livewire\SelectOption;
use App\Http\Livewire\NewsletterForm;

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


// FRONTEND

// Route::get('/search', [SearchController::class, 'index']);
Route::get('/search', [SearchController::class, 'search'])->name('quote.search');

Route::get('/articles', [ArticleController::class, 'index'])->name('articles');
Route::get('/articles/{slug}', [ArticleController::class, 'show']);
Route::get('articles/tag/{tag}', [ArticleController::class, 'showByTag']);

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

Route::get('/faqs', [FaqController::class, 'index'])->name('faqs');

Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/privacy-policy', [PageController::class, 'policy'])->name('privacy-policy');
Route::get('/terms', [PageController::class, 'terms'])->name('terms');

Route::get('people', [PersonController::class, 'index'])->name('people');
Route::get('people/{slug}', [PersonController::class, 'show']);
Route::get('people/letter/{letter}', [PersonController::class, 'showByLetter']);

Route::get('/payments', [PaymentController::class, 'index'])->name('payments');
Route::post('/payments', [PaymentController::class, 'store'])->name('payments.store');

Route::get('plan', [PlanController::class, 'index'])->name('plan');

Route::group(['prefix' => 'subscription', 'as' => 'subscriptions.'], function () {
    Route::get('/resume/{subscription}', [SubscribeController::class, 'update'])->name('update');
    Route::get('/cancel/{subscription}', [SubscribeController::class, 'destroy'])->name('destroy');
});

Route::middleware(['throttle:global'])->group(function () {
    Route::get('quotes', [QuoteController::class, 'index'])->name('quotes');
    Route::get('quotes/{id}', [QuoteController::class, 'show']);
    Route::get('quotes/{id}/showcase', [QuoteController::class, 'showcase']);
    Route::get('quotes/{id}/showcase/{type}', [QuoteController::class, 'showcaseBy']);
});
Route::get('quotes/tag/{tag}', [QuoteController::class, 'showByTag']);


Route::get('riddles', [RiddleController::class, 'index'])->name('riddles');
Route::get('riddles/random', [RiddleController::class, 'random']);

Route::get('tags', [TagController::class, 'index'])->name('tags');
Route::get('tags/all', [TagController::class, 'getTags']);
Route::get('tags/store', [TagController::class, 'storeTag']);
Route::get('tags/test', [TagController::class, 'test']);
Route::get('tags/{letter}', [TagController::class, 'show']);

Route::post('subscribe', [SubscribeController::class, 'store'])->name('subscribe.store');
Route::get('subscribe/verify/{token}/{email}', [SubscribeController::class, 'verify'])->name('subscribe_verify');

Route::group(['prefix' => 'replies', 'as' => 'replies.'], function () {
    /* Name: Replies
     * Url: /replies/*
     * Route: replies.*
     */
    Route::post('/', [ReplyController::class, 'store'])->name('store');
    Route::get('reply/{id}/{type}', [ReplyController::class, 'redirect'])->name('replyAble');
});

// Settings
Route::get('settings', [ProfileController::class, 'edit'])->name('settings.profile');
Route::put('settings', [ProfileController::class, 'update'])->name('settings.profile.update');
Route::delete('settings', [ProfileController::class, 'destroy'])->name('settings.profile.delete');
Route::put('settings/password', [PasswordController::class, 'update'])->name('settings.password.update');
Route::get('billing/invoices/{invoice}', [ProfileController::class, 'download'])->name('billing');

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth:sanctum', 'verified', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('dashboard', Dashboard::class)->name('dashboard');

    Route::prefix('blog')->name('blogs.')->group(function () {
        Route::get('create', \App\Http\Livewire\Admin\Blog\Create::class)->name('create');
        Route::get('all', \App\Http\Livewire\Admin\Blog\Index::class)->name('all');
        Route::get('{articleId}/update', \App\Http\Livewire\Admin\Blog\Edit::class)->name('edit');
    });
    
    // Route::get('articles', ArticleIndex::class)->name('articles.index');
    // 
    // Route::get('articles/create', [ArticleController::class, 'create']);
    // Route::post('articles/store', [ArticleController::class, 'store']);
    // Route::get('articles/edit/{articleID}', [ArticleController::class, 'edit']);
    // Route::put('articles/update', [ArticleController::class, 'update'])->name('updateArticle');

    Route::prefix('articles')->group(function () {
        // Route::get('authored', AuthoredArticles::class)->name('user.articles');
        Route::get('/', ArticleIndex::class)->name('articles.index');
        // Route::get('/', [ArticlesController::class, 'index'])->name('articles');
        Route::get('create', [AdminArticlesController::class, 'create'])->name('articles.create');
        Route::post('/', [AdminArticlesController::class, 'store'])->name('articles.store');
        Route::get('{article}', [AdminArticlesController::class, 'show'])->name('articles.show');
        Route::get('{article}/edit', [AdminArticlesController::class, 'edit'])->name('articles.edit');
        Route::put('{article}', [AdminArticlesController::class, 'update'])->name('articles.update');
        Route::delete('{article}', [AdminArticlesController::class, 'delete'])->name('articles.delete');
    });

    Route::get('about-us', AboutUs::class)->name('about-us.index');
    Route::get('privacy-policy', PrivacyPolicy::class)->name('privacy-policy.index');
    Route::get('term-condition', TermCondition::class)->name('term-condition.index');

    Route::get('adv-segments', AdvSegmentIndex::class)->name('adv-segments.index');
    Route::get('advertisings', AdvertisingIndex::class)->name('advertisings.index');
    
    //
    Route::get('category-article', CategoryArticleIndex::class)->name('category-article.index');
    Route::get('contacts', ContactIndex::class)->name('contacts.index');
    Route::get('dashboard', Dashboard::class)->name('dashboard');
    Route::get('categories', CategoryIndex::class)->name('categories.index');
    Route::get('faqs', FaqIndex::class)->name('faqs.index');
    Route::get('newsletters', NewsletterIndex::class)->name('newsletters.index');
    Route::get('persons', PersonIndex::class)->name('persons.index');
    Route::get('persons/{personId}', PersonDetail::class)->name('persons.detail');
    Route::get('permissions', PermissionIndex::class)->name('permissions.index');
    Route::get('plans', PlanIndex::class)->name('plans.index');
    Route::get('quotes', QuoteIndex::class)->name('quotes.index');
    Route::get('riddles', RiddleIndex::class)->name('riddles.index');
    Route::get('roles', RoleIndex::class)->name('roles.index');
    Route::get('settings', SettingIndex::class)->name('settings.index');
    Route::get('tags', TagIndex::class)->name('tags.index');
    Route::get('tagslist', TagsListIndex::class)->name('tagslist.index');
    Route::get('users', UserIndex::class)->name('users.index');
    
    Route::get('selects', SelectOption::class)->name('selects.index');

});

// Route::get('/saveperson', [PersonController::class, 'savePerson']);
// Route::get('/savequote', [QuoteController::class, 'saveQuote']);
// Route::get('/saveriddle', [RiddleController::class, 'saveRiddle']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});



// Sociolite
Route::get('/auth/{provider}/redirect', [ProviderController::class, 'redirect']);
 
Route::get('/auth/{provider}/callback', [ProviderController::class, 'callback']);

// update quote slug
Route::get('rand', [QuoteController::class, 'insertRand']);

Route::get('searchout', function() {
    $query = '';

    $people = App\Models\Person::search($query)->get();
    $quotes = App\Models\Quote::search($query)->paginate(20);

    return $people;
});