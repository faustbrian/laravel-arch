<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

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
