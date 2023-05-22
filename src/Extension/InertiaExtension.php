<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Extension;

use BombenProdukt\Arch\Contract\ExtensionInterface;
use BombenProdukt\Arch\Facade\Environment;

final readonly class InertiaExtension implements ExtensionInterface
{
    public function register(array $configuration): void
    {
        foreach ($configuration['statements'] as $statement) {
            Environment::statements()->add($statement);
        }
    }
}
