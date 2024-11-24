<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Unit\Statement\Laravel;

use BaseCodeOy\Arch\Model\Property;
use BaseCodeOy\Arch\Statement\Laravel\RouteRedirectStatement;

it('outputs the redirect statement without parameters', function (): void {
    $routeRedirectStatement = new RouteRedirectStatement('home');

    expect($routeRedirectStatement->code())->toMatchSnapshot();
});

it('outputs the redirect statement with parameters', function (): void {
    $routeRedirectStatement = new RouteRedirectStatement('profile', [
        new Property('id'),
    ]);

    expect($routeRedirectStatement->code())->toMatchSnapshot();
});
