<?php

declare(strict_types=1);

use BombenProdukt\Arch\Model\Model\Relationship\MorphTo;
use function Spatie\Snapshots\assertMatchesSnapshot;

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
    $subject = MorphTo::fromString('name type id ownerKey');

    expect($subject->name())->toBe('name');
    expect($subject->type())->toBe('type');
    expect($subject->id())->toBe('id');
    expect($subject->ownerKey())->toBe('ownerKey');
});

it('can return an array representation', function (): void {
    $subject = new MorphTo();

    assertMatchesSnapshot($subject->toArray());
});
