<?php

declare(strict_types=1);

namespace Tests\Unit\Model;

use BombenProdukt\Arch\Model\ViewComponent;

it('can create an instance', function (): void {
    $subject = new ViewComponent(
        name: 'name',
        view: 'view',
    );

    expect($subject->name())->toBe('Name');
    expect($subject->view())->toBe('view');
});
