<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

use BaseCodeOy\Arch\Model\Model\Relationship\MorphToMany;

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
    $morphToMany = MorphToMany::fromString('related name table foreignPivotKey relatedPivotKey parentKey relatedKey relation true');

    expect($morphToMany->related())->toBe('related');
    expect($morphToMany->name())->toBe('name');
    expect($morphToMany->table())->toBe('table');
    expect($morphToMany->foreignPivotKey())->toBe('foreignPivotKey');
    expect($morphToMany->relatedPivotKey())->toBe('relatedPivotKey');
    expect($morphToMany->parentKey())->toBe('parentKey');
    expect($morphToMany->relatedKey())->toBe('relatedKey');
    expect($morphToMany->relation())->toBe('relation');
    expect($morphToMany->inverse())->toBeTrue();
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

    expect($subject->toArray())->toMatchSnapshot();
});
