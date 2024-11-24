<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Unit\Generator\Laravel;

use BaseCodeOy\Arch\Generator\Laravel\MigrationGenerator;
use Carbon\Carbon;

beforeEach(function (): void {
    Carbon::setTestNow('2023-01-01 00:00:00');
});

it('should create a migration for a model', function (): void {
    shouldCreateFiles([
        'database/migrations/2023_01_01_000000_create_users_table.php',
    ]);

    assertMatchesGeneratorSnapshot(MigrationGenerator::class, 'migration/basic');
});

it('should create a migration for a belongsToMany relationship', function (): void {
    shouldCreateFiles([
        'database/migrations/2023_01_01_000000_create_role_user_table.php',
    ]);

    assertMatchesGeneratorSnapshot(MigrationGenerator::class, 'migration/belongs-to-many');
});

it('should create a migration for a morphedByMany relationship', function (): void {
    shouldCreateFiles([
        'database/migrations/2023_01_01_000000_create_tagables_table.php',
    ]);

    assertMatchesGeneratorSnapshot(MigrationGenerator::class, 'migration/morphed-by-many');
});
