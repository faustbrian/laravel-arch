<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Unit\Generator\Laravel;

use BaseCodeOy\Arch\Generator\Laravel\PolicyGenerator;

it('should create a policy', function (): void {
    shouldCreateFiles([
        'app/Policies/PostPolicy.php',
    ]);

    assertMatchesGeneratorSnapshot(PolicyGenerator::class, 'policy/basic');
});

it('should create a policy without any functions', function (): void {
    shouldCreateFiles([
        'app/Policies/ProductPolicy.php',
    ]);

    assertMatchesGeneratorSnapshot(PolicyGenerator::class, 'policy/plain');
});
