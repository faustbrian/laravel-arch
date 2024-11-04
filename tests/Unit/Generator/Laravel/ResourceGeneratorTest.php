<?php

declare(strict_types=1);

namespace Tests\Unit\Generator\Laravel;

use BaseCodeOy\Arch\Generator\Laravel\ResourceGenerator;

it('should create a resource', function (): void {
    shouldCreateFiles([
        'app/Http/Resources/UserResource.php',
    ]);

    assertMatchesGeneratorSnapshot(ResourceGenerator::class, 'resource/basic');
});
