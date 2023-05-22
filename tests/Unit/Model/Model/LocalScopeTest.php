<?php

declare(strict_types=1);

use BombenProdukt\Arch\Model\Model\LocalScope;

it('can create an instance', function (): void {
    $subject = new LocalScope('popular');

    expect($subject->name())->toBe('Popular');
});
