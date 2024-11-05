<?php

declare(strict_types=1);

namespace Tests\Unit\Generator\Laravel;

use BaseCodeOy\Arch\Generator\Laravel\ModelGenerator;
use Carbon\Carbon;

beforeEach(function (): void {
    Carbon::setTestNow('2023-01-01 00:00:00');
});

it('should create a model', function (): void {
    shouldCreateFiles([
        'app/Models/User.php',
    ]);

    assertMatchesGeneratorSnapshot(ModelGenerator::class, 'model/basic');
});

it('should create a model with global scopes', function (): void {
    shouldCreateFiles([
        'app/Models/User.php',
    ]);

    assertMatchesGeneratorSnapshot(ModelGenerator::class, 'model/scope/global');
});

it('should create a model with local scopes', function (): void {
    shouldCreateFiles([
        'app/Models/User.php',
    ]);

    assertMatchesGeneratorSnapshot(ModelGenerator::class, 'model/scope/local');
});

it('should create a model with factory, migration and seeder', function (): void {
    shouldCreateFiles([
        'database/factories/UserFactory.php',
        'database/migrations/2023_01_01_000000_create_users_table.php',
        'app/Models/User.php',
        'database/seeders/UserSeeder.php',
    ]);

    assertMatchesArchSnapshot('model/model-with-factory-migration-and-seeder');
});
