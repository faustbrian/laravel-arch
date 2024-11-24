<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Unit\Generator\Laravel;

use BaseCodeOy\Arch\Generator\Laravel\ServiceProviderGenerator;

it('should create a service provider', function (): void {
    shouldCreateFiles([
        'app/Providers/EloquentServiceProvider.php',
    ]);

    assertMatchesGeneratorSnapshot(ServiceProviderGenerator::class, 'service-provider/basic');
});
