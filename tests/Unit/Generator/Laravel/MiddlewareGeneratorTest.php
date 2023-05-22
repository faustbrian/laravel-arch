<?php

declare(strict_types=1);

namespace Tests\Unit\Generator\Laravel;

use BombenProdukt\Arch\Generator\Laravel\MiddlewareGenerator;

it('should create a cast', function (): void {
    shouldCreateFiles([
        'app/Http/Middleware/EnsureTokenIsValid.php',
    ]);

    assertMatchesGeneratorSnapshot(MiddlewareGenerator::class, 'middleware/basic');
});
