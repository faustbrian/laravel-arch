<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Unit\Generator\Laravel;

use BaseCodeOy\Arch\Generator\Laravel\RouteGenerator;
use Illuminate\Support\Facades\File;

it('should create route declarations', function (): void {
    File::partialMock();

    File::shouldReceive('append')
        ->once()
        ->with('routes/web.php', "Route::resource('users', App\\Http\\Controllers\\UserController::class)->only('index', 'store', 'update');");

    File::shouldReceive('append')
        ->once()
        ->with('routes/api.php', "Route::apiResource('users', App\\Http\\Controllers\\UserController::class)->except('show', 'destroy');");

    assertMatchesGeneratorSnapshot(RouteGenerator::class, 'route/basic');
});
