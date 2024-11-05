<?php

declare(strict_types=1);

namespace Tests\Unit\Statement\Laravel;

use BaseCodeOy\Arch\Model\Property;
use BaseCodeOy\Arch\Statement\Laravel\ActionRedirectStatement;
use function Spatie\Snapshots\assertMatchesSnapshot;

it('outputs the redirect statement without parameters', function (): void {
    $actionRedirectStatement = new ActionRedirectStatement('App\\Http\\Controllers\\PostController', 'index');

    assertMatchesSnapshot($actionRedirectStatement->code());
});

it('outputs the redirect statement with parameters', function (): void {
    $actionRedirectStatement = new ActionRedirectStatement('App\\Http\\Controllers\\PostController', 'show', [
        new Property('id'),
    ]);

    assertMatchesSnapshot($actionRedirectStatement->code());
});
