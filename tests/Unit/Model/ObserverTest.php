<?php

declare(strict_types=1);

namespace Tests\Unit\Model;

use BaseCodeOy\Arch\Model\Observer;

it('can create an instance', function (): void {
    $subject = new Observer(
        name: 'name',
        plain: true,
    );

    expect($subject->name())->toBe('Name');
    expect($subject->nameWithSuffix())->toBe('nameObserver');
    expect($subject->plain())->toBeTrue();
});
