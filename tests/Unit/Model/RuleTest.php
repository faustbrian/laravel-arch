<?php

declare(strict_types=1);

namespace Tests\Unit\Model;

use BombenProdukt\Arch\Model\Rule;

it('can create an instance', function (): void {
    $subject = new Rule(
        name: 'name',
    );

    expect($subject->name())->toBe('Name');
});
