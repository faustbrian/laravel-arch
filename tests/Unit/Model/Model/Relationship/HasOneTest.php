<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

use BaseCodeOy\Arch\Model\Model\Relationship\HasOne;

it('can create an instance', function (): void {
    $subject = new HasOne(
        related: 'related',
        foreignKey: 'foreignKey',
        localKey: 'localKey',
    );

    expect($subject->related())->toBe('related');
    expect($subject->foreignKey())->toBe('foreignKey');
    expect($subject->localKey())->toBe('localKey');
});

it('can create an instance from a string', function (): void {
    $subject = HasOne::fromString('related foreignKey localKey');

    expect($subject->related())->toBe('related');
    expect($subject->foreignKey())->toBe('foreignKey');
    expect($subject->localKey())->toBe('localKey');
});

it('can return an array representation', function (): void {
    $subject = new HasOne(
        related: 'related',
        foreignKey: 'foreignKey',
        localKey: 'localKey',
    );

    expect($subject->toArray())->toMatchSnapshot();
});
