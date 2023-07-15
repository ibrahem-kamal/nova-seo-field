<?php

namespace Iki\SeoMeta;

use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Events\ServingNova;
use Laravel\Nova\Nova;

class FieldServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Nova::serving(function (ServingNova $event) {
            Nova::script('seo-meta', __DIR__.'/../dist/js/field.js');
            Nova::style('seo-meta', __DIR__.'/../dist/css/field.css');
        });

        $this->loadMigrationsFrom(__DIR__.'/migrations');
        $this->loadViewsFrom(__DIR__.'/views', 'seo-meta');
        $this->loadRoutesFrom(__DIR__.'/routes.php');
        $this->publishes([
            __DIR__ . '/configs/seo.php' => config_path('seo.php'),
            __DIR__ . '/migrations' => database_path('migrations'),
        ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/configs/seo.php', 'seo');

    }
}
