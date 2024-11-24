<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Unit\Generator\Laravel;

use BaseCodeOy\Arch\Generator\Laravel\RuleGenerator;

it('should create a rule', function (): void {
    shouldCreateFiles([
        'app/Rules/Uppercase.php',
    ]);

    assertMatchesGeneratorSnapshot(RuleGenerator::class, 'rule/basic');
});

it('should create a rule with constructor properties', function (): void {
    shouldCreateFiles([
        'app/Rules/Lowercase.php',
    ]);

    assertMatchesGeneratorSnapshot(RuleGenerator::class, 'rule/properties');
});
