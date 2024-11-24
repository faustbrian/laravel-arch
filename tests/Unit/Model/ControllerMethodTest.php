<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Unit\Model;

use BaseCodeOy\Arch\Model\ControllerMethod;

it('can create an instance', function (): void {
    $subject = new ControllerMethod(
        verb: 'verb',
        name: 'name',
        statements: [],
    );

    expect($subject->verb())->toBe('verb');
    expect($subject->name())->toBe('name');
    expect($subject->statements())->toBe([]);
});
