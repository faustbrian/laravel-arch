<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Unit\Statement\Laravel;

use BaseCodeOy\Arch\Model\Property;
use BaseCodeOy\Arch\Statement\Laravel\FireStatement;

it('outputs named event without parameters', function (): void {
    $fireStatement = new FireStatement('user.created');

    expect($fireStatement->code())->toMatchSnapshot();
});

it('outputs named event with parameters', function (): void {
    $fireStatement = new FireStatement('user.created', [
        new Property('user'),
        new Property('message'),
    ]);

    expect($fireStatement->code())->toMatchSnapshot();
});

it('outputs class-based event without parameters', function (): void {
    $fireStatement = new FireStatement('App\\Events\\UserCreated');

    expect($fireStatement->code())->toMatchSnapshot();
});

it('outputs class-based event with parameters', function (): void {
    $fireStatement = new FireStatement('App\\Events\\UserCreated', [
        new Property('user'),
        new Property('message'),
    ]);

    expect($fireStatement->code())->toMatchSnapshot();
});
