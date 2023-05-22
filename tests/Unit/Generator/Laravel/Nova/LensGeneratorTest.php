<?php

declare(strict_types=1);

namespace Tests\Unit\Generator\Laravel\Nova;

use BombenProdukt\Arch\Generator\Laravel\Nova\LensGenerator;

it('should create a nova lens', function (): void {
    shouldCreateFiles([
        'app/Nova/Lenses/MostValuableUsers.php',
    ]);

    assertMatchesGeneratorSnapshot(LensGenerator::class, 'nova/lens');
});
