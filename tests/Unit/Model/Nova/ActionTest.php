<?php

declare(strict_types=1);

namespace Tests\Unit\Model\Nova;

use BombenProdukt\Arch\Model\Nova\Action;

it('can create an instance', function (): void {
    $subject = new Action(
        name: 'name',
        shouldBeDestructive: true,
        shouldBeQueued: true,
    );

    expect($subject->name())->toBe('Name');
    expect($subject->shouldBeDestructive())->toBeTrue();
    expect($subject->shouldBeQueued())->toBeTrue();
});
