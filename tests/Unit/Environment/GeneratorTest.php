<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Unit\Environment;

use BaseCodeOy\Arch\Environment\Generator;

it('returns the correct generator type', function (): void {
    $generator = new Generator('casts', 'My\\Full\\Qualified\\Class\\Name', 'My\\Namespace', '/my/directory');

    expect($generator->accessor())->toBe('casts');
});

it('returns the correct fully qualified class name', function (): void {
    $generator = new Generator('casts', 'My\\Full\\Qualified\\Class\\Name', 'My\\Namespace', '/my/directory');

    expect($generator->fullyQualifiedClassName())->toBe('My\\Full\\Qualified\\Class\\Name');
});

it('returns the correct namespace', function (): void {
    $generator = new Generator('casts', 'My\\Full\\Qualified\\Class\\Name', 'My\\Namespace', '/my/directory');

    expect($generator->namespace())->toBe('My\\Namespace');
});

it('returns the correct directory', function (): void {
    $generator = new Generator('casts', 'My\\Full\\Qualified\\Class\\Name', 'My\\Namespace', '/my/directory');

    expect($generator->directory())->toBe('/my/directory');
});
