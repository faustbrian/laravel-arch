<?php

declare(strict_types=1);

use BombenProdukt\Arch\Model\Model\GlobalScope;

it('can create an instance', function (): void {
    $subject = new GlobalScope('Ancient');

    expect($subject->name())->toBe('Ancient');
});
