<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Unit\Generator\Laravel;

use BaseCodeOy\Arch\Generator\Laravel\ResourceCollectionGenerator;

it('should create a resource collection', function (): void {
    shouldCreateFiles([
        'app/Http/Resources/UserCollection.php',
    ]);

    assertMatchesGeneratorSnapshot(ResourceCollectionGenerator::class, 'resource-collection/basic');
});
