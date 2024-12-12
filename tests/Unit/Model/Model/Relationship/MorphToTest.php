<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

use BaseCodeOy\Arch\Model\Model\Relationship\MorphTo;

it('can create an instance', function (): void {
    $subject = new MorphTo(
        name: 'name',
        type: 'type',
        id: 'id',
        ownerKey: 'ownerKey',
    );

    expect($subject->name())->toBe('name');
    expect($subject->type())->toBe('type');
    expect($subject->id())->toBe('id');
    expect($subject->ownerKey())->toBe('ownerKey');
});

it('can create an instance from a string', function (): void {
    $morphTo = MorphTo::fromString('name type id ownerKey');

    expect($morphTo->name())->toBe('name');
    expect($morphTo->type())->toBe('type');
    expect($morphTo->id())->toBe('id');
    expect($morphTo->ownerKey())->toBe('ownerKey');
});

it('can return an array representation', function (): void {
    $subject = new MorphTo();

    expect($subject->toArray())->toMatchSnapshot();
});
