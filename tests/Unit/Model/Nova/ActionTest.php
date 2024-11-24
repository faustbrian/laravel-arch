<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Unit\Model\Nova;

use BaseCodeOy\Arch\Model\Nova\Action;

it('can create an instance', function (): void {
    $subject = new Action(
        name: 'name',
        shouldBeDestructive: true,
        shouldBeQueued: true,
    );

    expect($subject->name())->toBe('Name');
    expect($subject->shouldBeDestructive())->toBeTrue();
    expect($subject->shouldBeQueued())->toBeTrue();
});
