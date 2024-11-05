<?php

declare(strict_types=1);

namespace Tests\Unit\Model;

use BaseCodeOy\Arch\Model\Middleware;

it('can create an instance', function (): void {
    $subject = new Middleware(
        name: 'name',
    );

    expect($subject->name())->toBe('Name');
});
