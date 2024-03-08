<?php

declare(strict_types=1);

namespace Esplora\Spire\Tests;

use Esplora\Spire\SpireServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;

abstract class TestCase extends \Orchestra\Testbench\TestCase
{
    use RefreshDatabase;

    /**
     * Setup the test environment.
     */
    protected function setUp(): void
    {
        // Ensure the database file exists
        touch($this->getDatabasePath());

        parent::setUp();
    }

    /**
     * Tear down the test environment.
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        // Remove the database file after the test
        unlink($this->getDatabasePath());
    }

    /**
     * @param \Illuminate\Foundation\Application $app
     */
    protected function getEnvironmentSetUp($app): void
    {
        $config = config();

        // set up database configuration
        $config->set('database.connections.sqlite', [
            'driver'                  => 'sqlite',
            'database'                => $this->getDatabasePath(),
            'prefix'                  => '',
            'foreign_key_constraints' => env('DB_FOREIGN_KEYS', true),
        ]);

        $config->set('database.default', 'sqlite');
    }

    /**
     * @param \Illuminate\Foundation\Application $app
     *
     * @return array
     */
    protected function getPackageProviders($app): array
    {
        return [
            SpireServiceProvider::class,
        ];
    }

    /**
     * Get the path to the SQLite database file.
     *
     * @return string
     */
    private function getDatabasePath(): string
    {
        return __DIR__.'/database.sqlite';
    }
}
