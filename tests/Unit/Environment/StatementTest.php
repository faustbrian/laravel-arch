<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Unit\Environment;

use BaseCodeOy\Arch\Environment\Statement;

it('returns methods from the statement', function (): void {
    $methods = ['method1', 'method2', 'method3'];
    $fullyQualifiedClassName = 'My\\Full\\Qualified\\Class\\Name';
    $statement = new Statement($methods, $fullyQualifiedClassName);

    expect($statement->methods())->toBeArray();
    expect($statement->methods())->toEqual($methods);
});

it('returns fully qualified class name from the statement', function (): void {
    $methods = ['method1', 'method2', 'method3'];
    $fullyQualifiedClassName = 'My\\Full\\Qualified\\Class\\Name';
    $statement = new Statement($methods, $fullyQualifiedClassName);

    expect($statement->fullyQualifiedClassName())->toBeString();
    expect($statement->fullyQualifiedClassName())->toEqual($fullyQualifiedClassName);
});
