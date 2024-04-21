<?php

namespace App\Providers;

use App\Models\User;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Paginator::useBootstrapFive();

        Debugbar::enable();

        $topUsers = Cache::remember('topUsers', now()->addMinutes(5), function () {
            return User::withCount('ideas')
                ->orderBy('ideas_count', 'DESC')
                ->limit(5)->get();
        });;

        View::share(
            'topUsers',
            $topUsers
        );
    }
}
