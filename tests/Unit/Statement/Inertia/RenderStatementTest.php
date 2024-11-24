<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Unit\Statement\Inertia;

use BaseCodeOy\Arch\Model\Property;
use BaseCodeOy\Arch\Statement\Inertia\RenderStatement;

it('outputs the statement without parameters', function (): void {
    $inertiaStatement = new RenderStatement('Dashboard');

    expect($inertiaStatement->code())->toMatchSnapshot();
});

it('outputs the statement with parameters', function (): void {
    $inertiaStatement = new RenderStatement('Dashboard', [
        new Property('user'),
        new Property('posts'),
    ]);

    expect($inertiaStatement->code())->toMatchSnapshot();
});
