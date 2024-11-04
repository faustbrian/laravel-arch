<?php

declare(strict_types=1);

namespace Tests\Unit\Model;

use BaseCodeOy\Arch\Model\Resource;

it('can create an instance', function (): void {
    $subject = new Resource(
        name: 'name',
    );

    expect($subject->name())->toBe('Name');
    expect($subject->nameWithSuffix())->toBe('nameResource');
});
