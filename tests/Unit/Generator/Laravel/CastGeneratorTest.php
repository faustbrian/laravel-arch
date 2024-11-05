<?php

declare(strict_types=1);

namespace Tests\Unit\Generator\Laravel;

use BaseCodeOy\Arch\Generator\Laravel\CastGenerator;

it('should create a cast', function (): void {
    shouldCreateFiles([
        'app/Casts/Json.php',
    ]);

    assertMatchesGeneratorSnapshot(CastGenerator::class, 'cast/basic');
});

it('should create an inbound cast', function (): void {
    shouldCreateFiles([
        'app/Casts/Inbound.php',
    ]);

    assertMatchesGeneratorSnapshot(CastGenerator::class, 'cast/inbound');
});
