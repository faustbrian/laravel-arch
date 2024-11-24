<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Unit\Generator\Laravel\Nova;

use BaseCodeOy\Arch\Generator\Laravel\Nova\MetricGenerator;
use Illuminate\Support\Str;

it('should create a nova metric', function (string $metric): void {
    shouldCreateFiles([
        'app/Nova/Metrics/'.Str::studly($metric).'.php',
    ]);

    assertMatchesGeneratorSnapshot(MetricGenerator::class, "nova/metric/{$metric}");
})->with([
    'partition',
    'progress',
    'table',
    'trend',
    'value',
]);
