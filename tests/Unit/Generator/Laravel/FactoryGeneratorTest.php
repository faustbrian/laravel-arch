<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Unit\Generator\Laravel;

use BaseCodeOy\Arch\Generator\Laravel\FactoryGenerator;

it('should create a model factory', function (): void {
    shouldCreateFiles([
        'database/factories/UserFactory.php',
    ]);

    assertMatchesGeneratorSnapshot(FactoryGenerator::class, 'factory/basic');
});

it('should create a model factory with foreign key properties', function (): void {
    shouldCreateFiles([
        'database/factories/ForeignFactory.php',
    ]);

    assertMatchesGeneratorSnapshot(FactoryGenerator::class, 'factory/foreign-key');
});

it('should create a model factory that morphs a model', function (): void {
    shouldCreateFiles([
        'database/factories/MorphsFactory.php',
    ]);

    assertMatchesGeneratorSnapshot(FactoryGenerator::class, 'factory/morphs');
});
