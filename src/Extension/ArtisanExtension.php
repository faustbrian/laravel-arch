<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Extension;

use BombenProdukt\Arch\Contract\ExtensionInterface;
use BombenProdukt\Arch\Facade\Environment;

final readonly class ArtisanExtension implements ExtensionInterface
{
    public function register(array $configuration): void
    {
        foreach ($configuration['generators'] as $generator) {
            Environment::generators()->add($generator);
        }

        foreach ($configuration['statements'] as $statement) {
            Environment::statements()->add($statement);
        }

        foreach ($configuration['tokenizers'] as $tokenizerClassName => $tokenizerConfiguration) {
            if (\is_string($tokenizerClassName)) {
                Environment::tokenizers()->add($tokenizerClassName, $tokenizerConfiguration);
            } else {
                Environment::tokenizers()->add($tokenizerConfiguration);
            }
        }
    }
}
