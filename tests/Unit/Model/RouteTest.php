<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Unit\Model;

use BaseCodeOy\Arch\Model\Route;

it('can create an instance', function (): void {
    $subject = new Route(
        type: 'type',
        verb: 'verb',
        uri: 'uri',
        action: 'action',
        methods: [],
    );

    expect($subject->type())->toBe('type');
    expect($subject->verb())->toBe('verb');
    expect($subject->uri())->toBe('uri');
    expect($subject->action())->toBe('action');
    expect($subject->methods())->toBe([]);
    expect($subject->isApiResource())->toBeFalse();
});
