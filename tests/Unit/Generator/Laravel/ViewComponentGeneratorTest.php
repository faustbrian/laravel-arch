<?php

declare(strict_types=1);

namespace Tests\Unit\Generator\Laravel;

use BaseCodeOy\Arch\Generator\Laravel\ViewComponentGenerator;

it('should create a view component', function (): void {
    shouldCreateFiles([
        'app/View/Components/Alert.php',
    ]);

    assertMatchesGeneratorSnapshot(ViewComponentGenerator::class, 'view-component/basic');
});

it('should create a view component with constructor properties', function (): void {
    shouldCreateFiles([
        'app/View/Components/Notification.php',
    ]);

    assertMatchesGeneratorSnapshot(ViewComponentGenerator::class, 'view-component/properties');
});
