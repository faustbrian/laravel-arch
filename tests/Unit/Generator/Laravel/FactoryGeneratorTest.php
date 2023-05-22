<?php

declare(strict_types=1);

namespace Tests\Unit\Generator\Laravel;

use BombenProdukt\Arch\Generator\Laravel\FactoryGenerator;

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
