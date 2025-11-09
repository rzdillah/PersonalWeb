<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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

        View::composer('*', function ($view) {
            $view->with('userData', [
                'name' => 'Rizky Fikry Fadillah',
                'tagline' => 'Frontend Developer',
                'bio' => 'Seorang front-end developer yang berfokus pada pembuatan antarmuka web modern, responsif, dan mudah digunakan.',
                'email' => 'rizkyfikryfadillah@gmail.com',
                'location' => 'Bogor, Indonesia',
                'social' => [
                'github' => 'https://github.com/yourusername',
                'linkedin' => 'https://linkedin.com/in/yourusername', 
                'instagram' => 'https://instagram.com/yourusername',
                'tiktok' => 'https://tiktok.com/@yourusername',
            ]
            ]);
        });
    }
}
