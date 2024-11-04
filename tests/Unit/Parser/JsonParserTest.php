<?php

declare(strict_types=1);

namespace Tests\Unit\Parser;

use BaseCodeOy\Arch\Model\Manifest;
use BaseCodeOy\Arch\Parser\JsonParser;

it('should parse a JSON file', function (): void {
    $result = (new JsonParser())->parse(__DIR__.'/fixtures/manifest.json');

    expect($result)->toBeInstanceOf(Manifest::class);
    expect($result->arch())->toBeString();
    expect($result->definitions())->toBeArray();
});
