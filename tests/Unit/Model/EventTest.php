<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Unit\Model;

use BaseCodeOy\Arch\Model\Event;

beforeEach(fn () => registerExtensions());

it('can create an instance', function (): void {
    $subject = new Event(
        name: 'name',
        shouldBroadcast: true,
    );

    expect($subject->name())->toBe('Name');
    expect($subject->fullyQualifiedNamespace())->toBe('App\Events');
    expect($subject->fullyQualifiedClassName())->toBe('App\Events\Name');
    expect($subject->shouldBroadcast())->toBeTrue();
});

it('can create an instance with a custom namespace', function (): void {
    $subject = new Event(
        name: 'App\Custom\NameEvent',
        shouldBroadcast: true,
    );

    expect($subject->name())->toBe('Name');
    expect($subject->shouldBroadcast())->toBeTrue();
    expect($subject->fullyQualifiedNamespace())->toBe('App\Custom');
    expect($subject->fullyQualifiedClassName())->toBe('App\Custom\Name');
});
