<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

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
        Paginator::useBootstrap();

        // Membuat gate yang namanya admin, yang dapat diakses oleh user yang usernamenya 'izuchii3'
        // Sekarang kita jadi punya 2 authorisasi, yang pertama dengan menggunakan middleware, yang keuntungannya kita dapat melakukan authorisasi dengan method yang banyak sekaligus. Kekurangannya dia tidak fleksibel.

        
        Gate::define('admin', function(User $user) {
            return $user->is_admin;
        });
    }
}
