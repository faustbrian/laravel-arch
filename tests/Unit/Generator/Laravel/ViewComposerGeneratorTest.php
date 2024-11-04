<?php

declare(strict_types=1);

namespace Tests\Unit\Generator\Laravel;

use BaseCodeOy\Arch\Generator\Laravel\ViewComposerGenerator;

it('should create a view composer', function (): void {
    shouldCreateFiles([
        'app/View/Composers/DashboardComposer.php',
    ]);

    assertMatchesGeneratorSnapshot(ViewComposerGenerator::class, 'view-composer/basic');
});

it('should create a view composer with constructor properties', function (): void {
    shouldCreateFiles([
        'app/View/Composers/ProfileComposer.php',
    ]);

    assertMatchesGeneratorSnapshot(ViewComposerGenerator::class, 'view-composer/properties');
});
