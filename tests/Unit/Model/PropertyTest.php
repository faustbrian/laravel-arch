<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Unit\Model;

use BaseCodeOy\Arch\Model\Property;

it('can create an instance', function (): void {
    $subject = new Property(
        name: 'name',
        type: 'type',
        visibility: 'visibility',
        isReadonly: true,
        isNullable: true,
        defaultValue: 'defaultValue',
    );

    expect($subject->name())->toBe('name');
    expect($subject->type())->toBe('type');
    expect($subject->visibility())->toBe('visibility');
    expect($subject->isReadonly())->toBeTrue();
    expect($subject->isNullable())->toBeTrue();
    expect($subject->defaultValue())->toBe('defaultValue');
});
