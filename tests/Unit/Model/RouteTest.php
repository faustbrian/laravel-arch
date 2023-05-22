<?php

declare(strict_types=1);

namespace Tests\Unit\Model;

use BombenProdukt\Arch\Model\Route;

it('can create an instance', function (): void {
    $subject = new Route(
        type: 'type',
        verb: 'verb',
        uri: 'uri',
        action: 'action',
        methods: [],
    );

    expect($subject->type())->toBe('type');
    expect($subject->verb())->toBe('verb');
    expect($subject->uri())->toBe('uri');
    expect($subject->action())->toBe('action');
    expect($subject->methods())->toBe([]);
    expect($subject->isApiResource())->toBeFalse();
});
