<?php

declare(strict_types=1);

namespace Tests\Unit\Model;

use BombenProdukt\Arch\Model\Cast;

it('can create an instance', function (): void {
    $subject = new Cast(
        name: 'name',
        inbound: true,
    );

    expect($subject->name())->toBe('Name');
    expect($subject->inbound())->toBeTrue();
});
