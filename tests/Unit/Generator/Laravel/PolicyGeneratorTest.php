<?php

declare(strict_types=1);

namespace Tests\Unit\Generator\Laravel;

use BombenProdukt\Arch\Generator\Laravel\PolicyGenerator;

it('should create a policy', function (): void {
    shouldCreateFiles([
        'app/Policies/PostPolicy.php',
    ]);

    assertMatchesGeneratorSnapshot(PolicyGenerator::class, 'policy/basic');
});

it('should create a policy without any functions', function (): void {
    shouldCreateFiles([
        'app/Policies/ProductPolicy.php',
    ]);

    assertMatchesGeneratorSnapshot(PolicyGenerator::class, 'policy/plain');
});
