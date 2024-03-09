<?php

declare(strict_types=1);

namespace Esplora\Spire\Commands;

use Illuminate\Console\Command;
use Illuminate\Database\ConnectionInterface;
use Illuminate\Database\DatabaseManager;
use Illuminate\Database\SQLiteConnection;

class Optimize extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sqlite:optimize
                            {connection=sqlite : The connection to optimize}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Optimize the SQLite database by running PRAGMA optimize.';

    /**
     * Execute the console command.
     *
     * @param \Illuminate\Database\DatabaseManager $manager
     *
     * @return void
     */
    public function handle(DatabaseManager $manager)
    {
        $connection = $this->argument('connection');
        $db = $this->getDatabase($manager, $connection);

        $this->optimize($db);
    }

    /**
     * Runs the PRAGMA optimize command on the SQLite database.
     * This command optimizes the database by running integrity checks and reindexing tables.
     *
     * @param \Illuminate\Database\ConnectionInterface $connection
     *
     * @return bool
     */
    protected function optimize(ConnectionInterface $connection)
    {
        return $connection->statement('PRAGMA optimize;');
    }

    /**
     * Returns the Database Connection
     *
     * @param \Illuminate\Database\DatabaseManager $manager
     * @param string                               $connection
     *
     * @return \Illuminate\Database\Connection
     */
    protected function getDatabase(DatabaseManager $manager, string $connection)
    {
        $db = $manager->connection($connection);

        // We will throw an exception if the database is not SQLite
        if (! $db instanceof SQLiteConnection) {
            throw new LogicException("The '$connection' connection must be sqlite, [{$db->getDriverName()}] given.");
        }

        return $db;
    }
}
