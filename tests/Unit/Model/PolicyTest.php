<?php

declare(strict_types=1);

namespace Tests\Unit\Model;

use BombenProdukt\Arch\Model\Policy;

it('can create an instance', function (): void {
    $subject = new Policy(
        name: 'name',
        plain: true,
    );

    expect($subject->name())->toBe('Name');
    expect($subject->nameWithSuffix())->toBe('namePolicy');
    expect($subject->plain())->toBeTrue();
});
