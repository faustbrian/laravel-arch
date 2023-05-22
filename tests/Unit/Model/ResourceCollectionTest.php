<?php

declare(strict_types=1);

namespace Tests\Unit\Model;

use BombenProdukt\Arch\Model\ResourceCollection;

it('can create an instance', function (): void {
    $subject = new ResourceCollection(
        name: 'name',
    );

    expect($subject->name())->toBe('Name');
    expect($subject->nameWithSuffix())->toBe('nameCollection');
});
