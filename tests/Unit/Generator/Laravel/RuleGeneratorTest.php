<?php

declare(strict_types=1);

namespace Tests\Unit\Generator\Laravel;

use BombenProdukt\Arch\Generator\Laravel\RuleGenerator;

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
