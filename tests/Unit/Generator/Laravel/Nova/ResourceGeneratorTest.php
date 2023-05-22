<?php

declare(strict_types=1);

namespace Tests\Unit\Generator\Laravel\Nova;

use BombenProdukt\Arch\Generator\Laravel\Nova\ResourceGenerator;

it('should create a nova resource', function (): void {
    shouldCreateFiles([
        'app/Nova/User.php',
    ]);

    assertMatchesGeneratorSnapshot(ResourceGenerator::class, 'nova/resource/resource');
});
