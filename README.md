#  Spire - Easy Tools for Laravel SQLite Database

Spire is a Laravel package designed to provide easy tools for optimizing SQLite databases. 
It offers functionalities such as running VACUUM, enabling WAL journal, and optimizing SQLite databases to enhance performance.

## Installation

To install Spire into your Laravel project, you can use Composer:

```bash
composer require esplora/spire
```

## Usage

Once installed, you can utilize Spire's commands via the Artisan CLI.

### Commands

#### Run VACUUM

To optimize the SQLite database by running VACUUM:

```bash
php artisan sqlite:vacuum
```

#### Enable WAL Journal

To enable WAL journal on SQLite databases for performance optimization:

```bash
php artisan sqlite:wal-enable
```

#### Optimize Database

To optimize the SQLite database by running VACUUM and PRAGMA optimize:

```bash
php artisan sqlite:optimize
```
