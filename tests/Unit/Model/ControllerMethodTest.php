<?php

declare(strict_types=1);

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
