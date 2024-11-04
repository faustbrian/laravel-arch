<?php

declare(strict_types=1);

use BaseCodeOy\Arch\Model\Model\Relationship\MorphToMany;
use function Spatie\Snapshots\assertMatchesSnapshot;

it('can create an instance', function (): void {
    $subject = new MorphToMany(
        related: 'related',
        name: 'name',
        table: 'table',
        foreignPivotKey: 'foreignPivotKey',
        relatedPivotKey: 'relatedPivotKey',
        parentKey: 'parentKey',
        relatedKey: 'relatedKey',
        relation: 'relation',
        inverse: true,
    );

    expect($subject->related())->toBe('related');
    expect($subject->name())->toBe('name');
    expect($subject->table())->toBe('table');
    expect($subject->foreignPivotKey())->toBe('foreignPivotKey');
    expect($subject->relatedPivotKey())->toBe('relatedPivotKey');
    expect($subject->parentKey())->toBe('parentKey');
    expect($subject->relatedKey())->toBe('relatedKey');
    expect($subject->relation())->toBe('relation');
    expect($subject->inverse())->toBeTrue();
});

it('can create an instance from a string', function (): void {
    $subject = MorphToMany::fromString('related name table foreignPivotKey relatedPivotKey parentKey relatedKey relation true');

    expect($subject->related())->toBe('related');
    expect($subject->name())->toBe('name');
    expect($subject->table())->toBe('table');
    expect($subject->foreignPivotKey())->toBe('foreignPivotKey');
    expect($subject->relatedPivotKey())->toBe('relatedPivotKey');
    expect($subject->parentKey())->toBe('parentKey');
    expect($subject->relatedKey())->toBe('relatedKey');
    expect($subject->relation())->toBe('relation');
    expect($subject->inverse())->toBeTrue();
});

it('can return an array representation', function (): void {
    $subject = new MorphToMany(
        related: 'related',
        name: 'name',
        table: 'table',
        foreignPivotKey: 'foreignPivotKey',
        relatedPivotKey: 'relatedPivotKey',
        parentKey: 'parentKey',
        relatedKey: 'relatedKey',
        relation: 'relation',
        inverse: true,
    );

    assertMatchesSnapshot($subject->toArray());
});
