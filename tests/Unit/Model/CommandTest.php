<?php

declare(strict_types=1);

namespace Tests\Unit\Model;

use BombenProdukt\Arch\Model\Command;

it('can create an instance', function (): void {
    $subject = new Command(
        name: 'name',
        signature: 'signature',
        description: 'description',
    );

    expect($subject->name())->toBe('Name');
    expect($subject->signature())->toBe('signature');
    expect($subject->description())->toBe('description');
});
