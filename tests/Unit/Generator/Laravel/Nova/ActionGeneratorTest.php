<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Unit\Generator\Laravel\Nova;

use BaseCodeOy\Arch\Generator\Laravel\Nova\ActionGenerator;

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
