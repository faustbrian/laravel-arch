<?php

declare(strict_types=1);

namespace Tests\Unit\Statement\Laravel;

use BaseCodeOy\Arch\Model\Property;
use BaseCodeOy\Arch\Statement\Laravel\RouteRedirectStatement;
use function Spatie\Snapshots\assertMatchesSnapshot;

it('outputs the redirect statement without parameters', function (): void {
    $routeRedirectStatement = new RouteRedirectStatement('home');

    assertMatchesSnapshot($routeRedirectStatement->code());
});

it('outputs the redirect statement with parameters', function (): void {
    $routeRedirectStatement = new RouteRedirectStatement('profile', [
        new Property('id'),
    ]);

    assertMatchesSnapshot($routeRedirectStatement->code());
});
