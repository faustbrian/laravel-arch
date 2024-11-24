<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Unit\Statement\Laravel;

use BaseCodeOy\Arch\Statement\Laravel\RespondStatement;

it('outputs the statement with no content', function (): void {
    $respondStatement = new RespondStatement();

    expect($respondStatement->code())->toMatchSnapshot();
});

it('outputs the statement with status code and no content', function (): void {
    $respondStatement = new RespondStatement(204);

    expect($respondStatement->code())->toMatchSnapshot();
});

it('outputs the statement with status code and array content', function (): void {
    $respondStatement = new RespondStatement(200, ['key' => 'value']);

    expect($respondStatement->code())->toMatchSnapshot();
});

it('outputs the statement with status code and non-array content', function (): void {
    $respondStatement = new RespondStatement(200, '$content');

    expect($respondStatement->code())->toMatchSnapshot();
});
