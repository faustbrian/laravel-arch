<?php

declare(strict_types=1);

namespace Tests\Unit\Model;

use BombenProdukt\Arch\Model\Job;

it('can create an instance', function (): void {
    $subject = new Job(
        name: 'name',
        shouldQueue: true,
        shouldBeUnique: true,
    );

    expect($subject->name())->toBe('Name');
    expect($subject->shouldQueue())->toBeTrue();
    expect($subject->shouldBeUnique())->toBeTrue();
});
