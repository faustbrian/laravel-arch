<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Unit\Statement\Laravel;

use BaseCodeOy\Arch\Statement\Laravel\SessionStatement;

it('outputs the statement with put operation', function (): void {
    $sessionStatement = new SessionStatement('put', 'user.name');

    expect($sessionStatement->code())->toMatchSnapshot();
});

it('outputs the statement with get operation', function (): void {
    $sessionStatement = new SessionStatement('get', 'user.name');

    expect($sessionStatement->code())->toMatchSnapshot();
});

it('outputs the statement with forget operation', function (): void {
    $sessionStatement = new SessionStatement('forget', 'user.name');

    expect($sessionStatement->code())->toMatchSnapshot();
});
