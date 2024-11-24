<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Unit\Model;

use BaseCodeOy\Arch\Model\Job;

it('can create an instance', function (): void {
    $subject = new Job(
        name: 'name',
        shouldQueue: true,
        shouldBeUnique: true,
    );

    expect($subject->name())->toBe('Name');
    expect($subject->shouldQueue())->toBeTrue();
    expect($subject->shouldBeUnique())->toBeTrue();
});
