<?php

declare(strict_types=1);

namespace Tests\Unit\Model\Nova;

use BaseCodeOy\Arch\Model\Nova\Dashboard;

it('can create an instance', function (): void {
    $subject = new Dashboard(
        name: 'name',
    );

    expect($subject->name())->toBe('Name');
});
