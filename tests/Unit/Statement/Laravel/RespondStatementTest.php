<?php

declare(strict_types=1);

namespace Tests\Unit\Statement\Laravel;

use BaseCodeOy\Arch\Statement\Laravel\RespondStatement;
use function Spatie\Snapshots\assertMatchesSnapshot;

it('outputs the statement with no content', function (): void {
    $respondStatement = new RespondStatement();

    assertMatchesSnapshot($respondStatement->code());
});

it('outputs the statement with status code and no content', function (): void {
    $respondStatement = new RespondStatement(204);

    assertMatchesSnapshot($respondStatement->code());
});

it('outputs the statement with status code and array content', function (): void {
    $respondStatement = new RespondStatement(200, ['key' => 'value']);

    assertMatchesSnapshot($respondStatement->code());
});

it('outputs the statement with status code and non-array content', function (): void {
    $respondStatement = new RespondStatement(200, '$content');

    assertMatchesSnapshot($respondStatement->code());
});
