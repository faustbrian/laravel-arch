<?php

declare(strict_types=1);

namespace Tests\Unit\Model;

use BombenProdukt\Arch\Model\View;

it('can create an instance', function (): void {
    $subject = new View(
        name: 'name',
    );

    expect($subject->name())->toBe('name');
});
