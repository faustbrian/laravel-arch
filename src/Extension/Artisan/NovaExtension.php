<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Extension\Artisan;

use BombenProdukt\Arch\Contract\ExtensionInterface;
use BombenProdukt\Arch\Facade\Environment;

final readonly class NovaExtension implements ExtensionInterface
{
    public function register(array $configuration): void
    {
        foreach ($configuration['generators'] as $generator) {
            Environment::generators()->add($generator);
        }

        foreach ($configuration['tokenizers'] as $tokenizer) {
            Environment::tokenizers()->add($tokenizer);
        }
    }
}
