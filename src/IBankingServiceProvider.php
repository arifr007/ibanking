<?php

namespace Arifr007\IBanking;

use Arifr007\IBanking\Contracts\Parser;
use Illuminate\Support\ServiceProvider;

class IBankingServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('Arifr007\IBanking\Contracts\Parser', function ($app) {
            return new CrawlerParser();
        });

        $this->app->singleton('Arifr007\IBanking\Contracts\Factory', function ($app) {
            return new IBankingManager($app);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['Arifr007\IBanking\Contracts\Factory'];
    }
}
