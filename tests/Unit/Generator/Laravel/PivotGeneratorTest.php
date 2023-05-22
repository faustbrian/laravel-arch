<?php

declare(strict_types=1);

namespace Tests\Unit\Generator\Laravel;

use BombenProdukt\Arch\Generator\Laravel\PivotGenerator;

it('should create a pivot', function (): void {
    shouldCreateFiles([
        'app/Models/TeamMember.php',
    ]);

    assertMatchesGeneratorSnapshot(PivotGenerator::class, 'pivot/basic');
});
