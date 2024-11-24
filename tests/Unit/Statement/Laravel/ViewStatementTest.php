<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Unit\Statement\Laravel;

use BaseCodeOy\Arch\Model\Property;
use BaseCodeOy\Arch\Statement\Laravel\ViewStatement;

it('outputs the statement without parameters', function (): void {
    $viewStatement = new ViewStatement('welcome');

    expect($viewStatement->code())->toMatchSnapshot();
});

it('outputs the statement with parameters', function (): void {
    $viewStatement = new ViewStatement('welcome', [
        new Property('user'),
        new Property('message'),
    ]);

    expect($viewStatement->code())->toMatchSnapshot();
});
