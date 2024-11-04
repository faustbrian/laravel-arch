<?php

declare(strict_types=1);

namespace Tests\Unit\Generator\Laravel;

use BaseCodeOy\Arch\Generator\Laravel\ViewGenerator;

it('should create a view', function (): void {
    shouldCreateFiles([
        'resources/views/dashboard.blade.php',
    ]);

    assertMatchesGeneratorSnapshot(ViewGenerator::class, 'view/basic');
});
