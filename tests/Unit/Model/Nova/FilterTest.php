<?php

declare(strict_types=1);

namespace Tests\Unit\Model\Nova;

use BaseCodeOy\Arch\Model\Nova\Filter;

it('can create an instance', function (): void {
    $subject = new Filter(
        name: 'name',
        type: 'type',
    );

    expect($subject->name())->toBe('Name');
    expect($subject->type())->toBe('type');
});
