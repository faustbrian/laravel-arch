<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Unit\Parser;

use BaseCodeOy\Arch\Model\Manifest;
use BaseCodeOy\Arch\Parser\YamlParser;

it('should parse a YAML file', function (): void {
    $result = (new YamlParser())->parse(__DIR__.'/fixtures/manifest.yaml');

    expect($result)->toBeInstanceOf(Manifest::class);
    expect($result->arch())->toBeString();
    expect($result->definitions())->toBeArray();
});
