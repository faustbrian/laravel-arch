<?php

declare(strict_types=1);

namespace Tests\Unit\Generator\Laravel;

use BombenProdukt\Arch\Generator\Laravel\RouteGenerator;
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
