<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Unit\Generator\Laravel;

use BaseCodeOy\Arch\Generator\Artisan\CastGenerator;

it('should create a cast via the Artisan CLI', function (): void {
    assertMatchesGeneratorSnapshot(CastGenerator::class, 'cast/basic');
});
