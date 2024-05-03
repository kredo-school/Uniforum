<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Models\Team;
use App\Models\UserTeam;
use Illuminate\Pagination\Paginator;
use PHPUnit\TextUI\XmlConfiguration\Logging\TeamCity;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $deleted_teams = Team::onlyTrashed()->pluck('id')->toArray();
        $categories = Category::get();
        View::share('categories', $categories);
        View::share('deleted_teams', $deleted_teams);
        Paginator::useBootstrap();
    }
}
