<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Unit\Model;

use BaseCodeOy\Arch\Model\Column;

it('can create an instance', function (): void {
    $subject = new Column(
        name: 'name',
        type: 'type',
        attributes: [],
        modifiers: [],
    );

    expect($subject->name())->toBe('name');
    expect($subject->type())->toBe('type');
    expect($subject->attributes())->toBe([]);
    expect($subject->modifiers())->toBe([]);
    expect($subject->foreignKey())->toBeNull();
    expect($subject->isNullable())->toBeFalse();
    expect($subject->defaultValue())->toBeNull();
});
