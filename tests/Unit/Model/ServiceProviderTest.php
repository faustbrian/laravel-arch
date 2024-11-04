<?php

declare(strict_types=1);

namespace Tests\Unit\Model;

use BaseCodeOy\Arch\Model\ServiceProvider;

it('can create an instance', function (): void {
    $subject = new ServiceProvider(
        name: 'name',
    );

    expect($subject->name())->toBe('Name');
    expect($subject->nameWithSuffix())->toBe('nameServiceProvider');
});
