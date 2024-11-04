<?php

declare(strict_types=1);

use BaseCodeOy\Arch\Model\Model\LocalScope;

it('can create an instance', function (): void {
    $subject = new LocalScope('popular');

    expect($subject->name())->toBe('Popular');
});
