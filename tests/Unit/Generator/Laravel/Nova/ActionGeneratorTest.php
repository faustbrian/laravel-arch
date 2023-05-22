<?php

declare(strict_types=1);

namespace Tests\Unit\Generator\Laravel\Nova;

use BombenProdukt\Arch\Generator\Laravel\Nova\ActionGenerator;

it('should create a nova action', function (): void {
    shouldCreateFiles([
        'app/Nova/Actions/EmailAccountProfile.php',
    ]);

    assertMatchesGeneratorSnapshot(ActionGenerator::class, 'nova/action/basic');
});

it('should create a nova action that is queued', function (): void {
    shouldCreateFiles([
        'app/Nova/Actions/EmailAccountProfile.php',
    ]);

    assertMatchesGeneratorSnapshot(ActionGenerator::class, 'nova/action/queued');
});

it('should create a nova action that is destructive', function (): void {
    shouldCreateFiles([
        'app/Nova/Actions/DeleteUserData.php',
    ]);

    assertMatchesGeneratorSnapshot(ActionGenerator::class, 'nova/action/destructive');
});

it('should create a nova action that is destructive and queued', function (): void {
    shouldCreateFiles([
        'app/Nova/Actions/DeleteUserData.php',
    ]);

    assertMatchesGeneratorSnapshot(ActionGenerator::class, 'nova/action/destructive/queued');
});
