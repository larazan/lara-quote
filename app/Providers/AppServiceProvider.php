<?php

namespace App\Providers;

use App\Models\Quote;
use App\Models\Reply;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Builder::macro('liveSearch', function (string $attribute, string $search) {
            return $search ? $this->where($attribute, 'LIKE', "%{$search}%") : $this;
        });
    }

    public function bootEloquentMorphsRelations()
    {
        Relation::morphMap([
            Quote::TABLE => Quote::class,
            Reply::TABLE => Reply::class,
            User::TABLE => User::class,
        ]);
    }
}
