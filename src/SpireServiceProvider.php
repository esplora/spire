<?php

declare(strict_types=1);

namespace Esplora\Spire;

use Esplora\Spire\Commands\Optimize;
use Esplora\Spire\Commands\Vacuum;
use Esplora\Spire\Commands\WalEnable;
use Illuminate\Support\Facades\DB;
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

        // Don't kill the app if the database hasn't been created.
        try {
            DB::connection('sqlite')->statement('PRAGMA synchronous = normal;');
        } catch (\Throwable $throwable) {
            return;
        }
    }
}
