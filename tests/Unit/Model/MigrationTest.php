<?php

declare(strict_types=1);

namespace Tests\Unit\Model;

use BombenProdukt\Arch\Model\Migration;

it('can create an instance', function (): void {
    $subject = new Migration(
        name: 'name',
        columns: [],
        indexes: [],
    );

    expect($subject->name())->toBe('name');
});
