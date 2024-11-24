<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

use BaseCodeOy\Arch\Model\Model\Relationship\BelongsTo;

it('can create an instance', function (): void {
    $subject = new BelongsTo(
        related: 'related',
        foreignKey: 'foreignKey',
        ownerKey: 'ownerKey',
        relation: 'relation',
    );

    expect($subject->related())->toBe('related');
    expect($subject->foreignKey())->toBe('foreignKey');
    expect($subject->ownerKey())->toBe('ownerKey');
    expect($subject->relation())->toBe('relation');
});

it('can create an instance from a string', function (): void {
    $subject = BelongsTo::fromString('related foreignKey ownerKey relation');

    expect($subject->related())->toBe('related');
    expect($subject->foreignKey())->toBe('foreignKey');
    expect($subject->ownerKey())->toBe('ownerKey');
    expect($subject->relation())->toBe('relation');
});

it('can return an array representation', function (): void {
    $subject = new BelongsTo(
        related: 'related',
        foreignKey: 'foreignKey',
        ownerKey: 'ownerKey',
        relation: 'relation',
    );

    expect($subject->toArray())->toMatchSnapshot();
});
