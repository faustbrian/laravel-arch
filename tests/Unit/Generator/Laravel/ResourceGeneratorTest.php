<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Unit\Generator\Laravel;

use BaseCodeOy\Arch\Generator\Laravel\ResourceGenerator;

it('should create a resource', function (): void {
    shouldCreateFiles([
        'app/Http/Resources/UserResource.php',
    ]);

    assertMatchesGeneratorSnapshot(ResourceGenerator::class, 'resource/basic');
});
