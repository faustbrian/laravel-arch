<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

use BaseCodeOy\Arch\Model\Model\Relationship\HasManyThrough;

it('can create an instance', function (): void {
    $subject = new HasManyThrough(
        related: 'related',
        through: 'through',
        firstKey: 'firstKey',
        secondKey: 'secondKey',
        localKey: 'localKey',
        secondLocalKey: 'secondLocalKey',
    );

    expect($subject->related())->toBe('related');
    expect($subject->through())->toBe('through');
    expect($subject->firstKey())->toBe('firstKey');
    expect($subject->secondKey())->toBe('secondKey');
    expect($subject->localKey())->toBe('localKey');
    expect($subject->secondLocalKey())->toBe('secondLocalKey');
});

it('can create an instance from a string', function (): void {
    $hasManyThrough = HasManyThrough::fromString('related through firstKey secondKey localKey secondLocalKey');

    expect($hasManyThrough->related())->toBe('related');
    expect($hasManyThrough->through())->toBe('through');
    expect($hasManyThrough->firstKey())->toBe('firstKey');
    expect($hasManyThrough->secondKey())->toBe('secondKey');
    expect($hasManyThrough->localKey())->toBe('localKey');
    expect($hasManyThrough->secondLocalKey())->toBe('secondLocalKey');
});

it('can return an array representation', function (): void {
    $subject = new HasManyThrough(
        related: 'related',
        through: 'through',
        firstKey: 'firstKey',
        secondKey: 'secondKey',
        localKey: 'localKey',
        secondLocalKey: 'secondLocalKey',
    );

    expect($subject->toArray())->toMatchSnapshot();
});
