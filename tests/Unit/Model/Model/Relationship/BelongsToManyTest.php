<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

use BaseCodeOy\Arch\Model\Model\Relationship\BelongsToMany;

it('can create an instance', function (): void {
    $subject = new BelongsToMany(
        related: 'related',
        table: 'table',
        foreignPivotKey: 'foreignPivotKey',
        relatedPivotKey: 'relatedPivotKey',
        parentKey: 'parentKey',
        relatedKey: 'relatedKey',
        relation: 'relation',
    );

    expect($subject->related())->toBe('related');
    expect($subject->table())->toBe('table');
    expect($subject->foreignPivotKey())->toBe('foreignPivotKey');
    expect($subject->relatedPivotKey())->toBe('relatedPivotKey');
    expect($subject->parentKey())->toBe('parentKey');
    expect($subject->relatedKey())->toBe('relatedKey');
    expect($subject->relation())->toBe('relation');
});

it('can create an instance from a string', function (): void {
    $belongsToMany = BelongsToMany::fromString('related table foreignPivotKey relatedPivotKey parentKey relatedKey relation');

    expect($belongsToMany->related())->toBe('related');
    expect($belongsToMany->table())->toBe('table');
    expect($belongsToMany->foreignPivotKey())->toBe('foreignPivotKey');
    expect($belongsToMany->relatedPivotKey())->toBe('relatedPivotKey');
    expect($belongsToMany->parentKey())->toBe('parentKey');
    expect($belongsToMany->relatedKey())->toBe('relatedKey');
    expect($belongsToMany->relation())->toBe('relation');
});

it('can return an array representation', function (): void {
    $subject = new BelongsToMany(
        related: 'related',
        table: 'table',
        foreignPivotKey: 'foreignPivotKey',
        relatedPivotKey: 'relatedPivotKey',
        parentKey: 'parentKey',
        relatedKey: 'relatedKey',
        relation: 'relation',
    );

    expect($subject->toArray())->toMatchSnapshot();
});
