<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Unit\Statement\Laravel;

use BaseCodeOy\Arch\Model\Property;
use BaseCodeOy\Arch\Statement\Laravel\DispatchStatement;

it('can generate the statement without parameters', function (): void {
    $dispatchStatement = new DispatchStatement('App\\Jobs\\SendNotification');

    expect($dispatchStatement->code())->toMatchSnapshot();
});

it('can generate the statement with parameters', function (): void {
    $dispatchStatement = new DispatchStatement(
        job: 'App\\Jobs\\SendNotification',
        parameters: [
            new Property('user'),
            new Property('message'),
        ],
    );

    expect($dispatchStatement->code())->toMatchSnapshot();
});

it('can generate test code', function (): void {
    $dispatchStatement = new DispatchStatement('App\\Jobs\\SendNotification');

    expect($dispatchStatement->test())->toMatchSnapshot();
});
