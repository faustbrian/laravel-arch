<?php

declare(strict_types=1);

namespace Tests\Unit\Generator\Laravel;

use BaseCodeOy\Arch\Generator\Laravel\SeederGenerator;

it('should create a database seeder', function (): void {
    shouldCreateFiles([
        'database/seeders/UserSeeder.php',
    ]);

    assertMatchesGeneratorSnapshot(SeederGenerator::class, 'seeder/basic');
});
