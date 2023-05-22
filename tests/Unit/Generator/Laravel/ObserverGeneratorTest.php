<?php

declare(strict_types=1);

namespace Tests\Unit\Generator\Laravel;

use BombenProdukt\Arch\Generator\Laravel\ObserverGenerator;

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
