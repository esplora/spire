<?php

declare(strict_types=1);

namespace Esplora\Spire;

use Esplora\Spire\Commands\Optimize;
use Esplora\Spire\Commands\Vacuum;
use Esplora\Spire\Commands\WalEnable;
use Illuminate\Support\ServiceProvider;

class SpireServiceProvider extends ServiceProvider
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
        $this->commands([
            Optimize::class,
            Vacuum::class,
            WalEnable::class,
        ]);
    }
}
