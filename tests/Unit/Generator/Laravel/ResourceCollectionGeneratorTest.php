<?php

declare(strict_types=1);

namespace Tests\Unit\Generator\Laravel;

use BaseCodeOy\Arch\Generator\Laravel\ResourceCollectionGenerator;

it('should create a resource collection', function (): void {
    shouldCreateFiles([
        'app/Http/Resources/UserCollection.php',
    ]);

    assertMatchesGeneratorSnapshot(ResourceCollectionGenerator::class, 'resource-collection/basic');
});
