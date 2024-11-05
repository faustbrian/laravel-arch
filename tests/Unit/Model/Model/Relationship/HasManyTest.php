<?php

declare(strict_types=1);

use BaseCodeOy\Arch\Model\Model\Relationship\HasMany;
use function Spatie\Snapshots\assertMatchesSnapshot;

it('can create an instance', function (): void {
    $subject = new HasMany(
        related: 'related',
        foreignKey: 'foreignKey',
        localKey: 'localKey',
    );

    expect($subject->related())->toBe('related');
    expect($subject->foreignKey())->toBe('foreignKey');
    expect($subject->localKey())->toBe('localKey');
});

it('can create an instance from a string', function (): void {
    $subject = HasMany::fromString('related foreignKey localKey');

    expect($subject->related())->toBe('related');
    expect($subject->foreignKey())->toBe('foreignKey');
    expect($subject->localKey())->toBe('localKey');
});

it('can return an array representation', function (): void {
    $subject = new HasMany(
        related: 'related',
        foreignKey: 'foreignKey',
        localKey: 'localKey',
    );

    assertMatchesSnapshot($subject->toArray());
});
