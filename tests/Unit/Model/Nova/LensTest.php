<?php

declare(strict_types=1);

namespace Tests\Unit\Model\Nova;

use BombenProdukt\Arch\Model\Nova\Lens;

it('can create an instance', function (): void {
    $subject = new Lens(
        name: 'name',
    );

    expect($subject->name())->toBe('Name');
});
