<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Unit\Generator\Laravel;

use BaseCodeOy\Arch\Generator\Laravel\CastableGenerator;

it('should create a castable', function (): void {
    shouldCreateFiles([
        'app/Castables/Address.php',
    ]);

    assertMatchesGeneratorSnapshot(CastableGenerator::class, 'castable/castable');
});

it('should create a castable that returns CastsAttributes', function (): void {
    shouldCreateFiles([
        'app/Castables/Address.php',
    ]);

    assertMatchesGeneratorSnapshot(CastableGenerator::class, 'castable/casts-attributes');
});
