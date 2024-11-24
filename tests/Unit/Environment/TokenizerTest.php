<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Unit\Environment;

use BaseCodeOy\Arch\Environment\Tokenizer;

it('tokenizes a fully qualified class name', function (): void {
    $tokenizer = new Tokenizer('My\\Full\\Qualified\\Class\\Name', []);

    expect($tokenizer->fullyQualifiedClassName())->toBeString();
    expect($tokenizer->fullyQualifiedClassName())->toBe('My\\Full\\Qualified\\Class\\Name');
    expect($tokenizer->configuration())->toBeArray();
});
