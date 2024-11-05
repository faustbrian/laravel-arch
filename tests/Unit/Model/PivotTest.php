<?php

declare(strict_types=1);

namespace Tests\Unit\Model;

use BaseCodeOy\Arch\Model\Pivot;

it('can create an instance', function (): void {
    $subject = new Pivot(
        name: 'name',
    );

    expect($subject->name())->toBe('Name');
});
