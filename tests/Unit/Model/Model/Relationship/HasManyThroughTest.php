<?php

declare(strict_types=1);

use BaseCodeOy\Arch\Model\Model\Relationship\HasManyThrough;
use function Spatie\Snapshots\assertMatchesSnapshot;

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
    $subject = HasManyThrough::fromString('related through firstKey secondKey localKey secondLocalKey');

    expect($subject->related())->toBe('related');
    expect($subject->through())->toBe('through');
    expect($subject->firstKey())->toBe('firstKey');
    expect($subject->secondKey())->toBe('secondKey');
    expect($subject->localKey())->toBe('localKey');
    expect($subject->secondLocalKey())->toBe('secondLocalKey');
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

    assertMatchesSnapshot($subject->toArray());
});
