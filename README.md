# Spire

Spire is a Laravel package designed to provide easy tools specifically tailored for optimizing SQLite databases in
production environments.

## Installation

To install Spire into your Laravel project, you can use Composer:

```bash
composer require esplora/spire
```

## Usage

Once installed, you can utilize Spire's commands via the Artisan CLI.

### Commands

#### Enable WAL Journal

To enable WAL journal on SQLite databases for performance optimization:

```bash
php artisan sqlite:wal-enable
```

Enabling WAL journaling can enhance database concurrency, reduce contention, and improve overall database performance,
especially in high-traffic production environments.

#### Optimize Database

To optimize the SQLite database by running VACUUM and PRAGMA optimize:

```bash
php artisan sqlite:optimize
```

This combined optimization process ensures comprehensive optimization of the database file, resulting in improved
performance and efficient storage utilization.

#### Run VACUUM

To optimize the SQLite database by running VACUUM:

```bash
php artisan sqlite:vacuum
```

VACUUM rebuilds the database file, reclaims unused disk space, and can help to improve database performance by
optimizing storage utilization.

### Schedule

For efficient database maintenance, it's highly recommended to schedule some of these commands as cron jobs.
For instance, you can optimize the SQLite database periodically by adding a cron job to your scheduler:

```php
// Optimize SQLite database every minute,
// see https://www.sqlite.org/pragma.html#pragma_optimize
$schedule->command('sqlite:optimize')->everyMinute();
```
