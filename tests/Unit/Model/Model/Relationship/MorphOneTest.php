<?php

declare(strict_types=1);

use BaseCodeOy\Arch\Model\Model\Relationship\MorphOne;
use function Spatie\Snapshots\assertMatchesSnapshot;

it('can create an instance', function (): void {
    $subject = new MorphOne(
        related: 'related',
        name: 'name',
        type: 'type',
        id: 'id',
        localKey: 'localKey',
    );

    expect($subject->related())->toBe('related');
    expect($subject->name())->toBe('name');
    expect($subject->type())->toBe('type');
    expect($subject->id())->toBe('id');
    expect($subject->localKey())->toBe('localKey');
});

it('can create an instance from a string', function (): void {
    $subject = MorphOne::fromString('related name type id localKey');

    expect($subject->related())->toBe('related');
    expect($subject->name())->toBe('name');
    expect($subject->type())->toBe('type');
    expect($subject->id())->toBe('id');
    expect($subject->localKey())->toBe('localKey');
});

it('can return an array representation', function (): void {
    $subject = new MorphOne(
        related: 'related',
        name: 'name',
        type: 'type',
        id: 'id',
        localKey: 'localKey',
    );

    assertMatchesSnapshot($subject->toArray());
});
