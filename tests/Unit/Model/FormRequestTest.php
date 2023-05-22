<?php

declare(strict_types=1);

namespace Tests\Unit\Model;

use BombenProdukt\Arch\Model\FormRequest;

it('can create an instance', function (): void {
    $subject = new FormRequest(
        name: 'name',
    );

    expect($subject->name())->toBe('Name');
    expect($subject->nameWithSuffix())->toBe('nameRequest');
});
