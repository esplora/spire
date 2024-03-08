<?php

declare(strict_types=1);

namespace Esplora\Spire\Tests;

use Esplora\Tracker\Models\Goal;
use Illuminate\Support\Facades\DB;

class SynchronousTest extends TestCase
{
    public function testItCanSetPragmaSynchronousToNormal()
    {
        // Retrieve the value from the database and ensure it's set to 'normal'
        $result = DB::connection('sqlite')->selectOne('PRAGMA synchronous;');

        // Check if the PRAGMA synchronous value is equal to 1 (NORMAL)
        $this->assertEquals(1, $result->synchronous, 'PRAGMA synchronous is not set to NORMAL.');
    }
}
