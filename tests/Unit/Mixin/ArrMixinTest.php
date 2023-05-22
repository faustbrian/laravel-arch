<?php

declare(strict_types=1);

namespace Tests\Unit\Transformer\Property;

use BombenProdukt\Arch\Model\Property;
use Illuminate\Support\Arr;
use function Spatie\Snapshots\assertMatchesSnapshot;

it('transforms the properties into an array', function (): void {
    $formatted = Arr::propertiesToArray([
        new Property(
            name: 'name',
            type: 'string',
        ),
        new Property(
            name: 'age',
            type: 'int',
        ),
    ]);

    assertMatchesSnapshot($formatted);
});

it('transforms the properties into a compact array', function (): void {
    $formatted = Arr::propertiesToCompact([
        new Property(
            name: 'name',
            type: 'string',
        ),
        new Property(
            name: 'age',
            type: 'int',
        ),
    ]);

    assertMatchesSnapshot($formatted);
});

it('transforms the properties into constructor arguments', function (): void {
    $formatted = Arr::propertiesToConstructor([
        new Property(
            name: 'name',
            type: 'string',
            visibility: 'private',
            isReadonly: false,
        ),
        new Property(
            name: 'age',
            type: 'int',
            visibility: 'public',
            isReadonly: true,
            defaultValue: 0,
        ),
    ]);

    assertMatchesSnapshot($formatted);
});

it('transforms the properties into function arguments', function (): void {
    $formatted = Arr::propertiesToFunction([
        new Property(
            name: 'name',
            type: 'string',
        ),
        new Property(
            name: 'age',
            type: 'int',
        ),
        new Property(
            name: 'gender',
            type: 'string',
            defaultValue: 'male',
        ),
    ]);

    assertMatchesSnapshot($formatted);
});
