<?php

declare(strict_types=1);

namespace Tests\Unit\Model;

use BombenProdukt\Arch\Model\Notification;

it('can create an instance', function (): void {
    $subject = new Notification(
        name: 'name',
        view: 'view',
        shouldQueue: true,
        shouldBeMarkdown: true,
    );

    expect($subject->name())->toBe('Name');
    expect($subject->view())->toBe('view');
    expect($subject->shouldQueue())->toBeTrue();
    expect($subject->shouldBeMarkdown())->toBeTrue();
});
