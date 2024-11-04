<?php

declare(strict_types=1);

namespace Tests\Unit\Generator\Laravel;

use BaseCodeOy\Arch\Generator\Laravel\ServiceProviderGenerator;

it('should create a service provider', function (): void {
    shouldCreateFiles([
        'app/Providers/EloquentServiceProvider.php',
    ]);

    assertMatchesGeneratorSnapshot(ServiceProviderGenerator::class, 'service-provider/basic');
});
