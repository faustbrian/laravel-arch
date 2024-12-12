<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

use BaseCodeOy\Arch\Model\Model\Relationship\HasOneThrough;

it('can create an instance', function (): void {
    $subject = new HasOneThrough(
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
    $hasOneThrough = HasOneThrough::fromString('related through firstKey secondKey localKey secondLocalKey');

    expect($hasOneThrough->related())->toBe('related');
    expect($hasOneThrough->through())->toBe('through');
    expect($hasOneThrough->firstKey())->toBe('firstKey');
    expect($hasOneThrough->secondKey())->toBe('secondKey');
    expect($hasOneThrough->localKey())->toBe('localKey');
    expect($hasOneThrough->secondLocalKey())->toBe('secondLocalKey');
});

it('can return an array representation', function (): void {
    $subject = new HasOneThrough(
        related: 'related',
        through: 'through',
        firstKey: 'firstKey',
        secondKey: 'secondKey',
        localKey: 'localKey',
        secondLocalKey: 'secondLocalKey',
    );

    expect($subject->toArray())->toMatchSnapshot();
});
