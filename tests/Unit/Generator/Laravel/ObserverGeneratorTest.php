<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Unit\Generator\Laravel;

use BaseCodeOy\Arch\Generator\Laravel\ObserverGenerator;

it('should create an observer', function (): void {
    shouldCreateFiles([
        'app/Observers/UserObserver.php',
    ]);

    assertMatchesGeneratorSnapshot(ObserverGenerator::class, 'observer/basic');
});

it('should create an observer without any functions', function (): void {
    shouldCreateFiles([
        'app/Observers/PostObserver.php',
    ]);

    assertMatchesGeneratorSnapshot(ObserverGenerator::class, 'observer/plain');
});
