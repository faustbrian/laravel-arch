<?php

declare(strict_types=1);

use BaseCodeOy\Arch\Model\Model\Cast;

it('can create an instance', function (): void {
    $subject = new Cast('name', 'integer');

    expect($subject->name())->toBe('name');
    expect($subject->type())->toBe('integer');
});
