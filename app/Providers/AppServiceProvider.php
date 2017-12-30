<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
	    Schema::defaultStringLength(191); // fix 4 artisan migrate

        //echo iconv("cp1251", "UTF-8", strftime("%A %d %b. %Y %H:%M"));
        //setlocale(LC_ALL, ''); // На Windows устанавливает имена локалей из системных региональных/языковых настроек
        //setlocale(LC_ALL, 'Russian'); // Задает русскую локаль под Win, но без utf8
        setlocale(LC_ALL, 'ru_RU.UTF-8'); //for *nix

        \Carbon\Carbon::setLocale('ru');
        //var_dump(\App\Post::archives());

        view()->composer('layouts.sidebar', function($view) {
            $archives = \App\Post::archives();
            $tags = \App\Tag::has('posts')->pluck('name');

            $view->with(compact('archives', 'tags'));
        });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }
}
