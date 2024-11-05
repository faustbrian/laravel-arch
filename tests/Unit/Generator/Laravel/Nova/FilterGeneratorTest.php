<?php

declare(strict_types=1);

namespace Tests\Unit\Generator\Laravel\Nova;

use BaseCodeOy\Arch\Generator\Laravel\Nova\FilterGenerator;

it('should create a nova filter', function (string $filter): void {
    shouldCreateFiles([
        'app/Nova/Filters/UserType.php',
    ]);

    assertMatchesGeneratorSnapshot(FilterGenerator::class, "nova/filter/{$filter}");
})->with([
    'boolean',
    'date',
    'filter',
]);
