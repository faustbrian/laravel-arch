<?php

declare(strict_types=1);

namespace Tests\Unit\Statement\Laravel;

use BombenProdukt\Arch\Model\Property;
use BombenProdukt\Arch\Statement\Laravel\DispatchStatement;
use function Spatie\Snapshots\assertMatchesSnapshot;

it('can generate the statement without parameters', function (): void {
    $dispatchStatement = new DispatchStatement('App\\Jobs\\SendNotification');

    assertMatchesSnapshot($dispatchStatement->code());
});

it('can generate the statement with parameters', function (): void {
    $dispatchStatement = new DispatchStatement(
        job: 'App\\Jobs\\SendNotification',
        parameters: [
            new Property('user'),
            new Property('message'),
        ],
    );

    assertMatchesSnapshot($dispatchStatement->code());
});

it('can generate test code', function (): void {
    $dispatchStatement = new DispatchStatement('App\\Jobs\\SendNotification');

    assertMatchesSnapshot($dispatchStatement->test());
});
