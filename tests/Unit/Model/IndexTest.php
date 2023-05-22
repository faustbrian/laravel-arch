<?php

declare(strict_types=1);

namespace Tests\Unit\Model;

use BombenProdukt\Arch\Model\Index;

it('can create an instance', function (): void {
    $subject = new Index(
        type: 'type',
        columns: [],
    );

    expect($subject->type())->toBe('type');
    expect($subject->columns())->toBe([]);
});
