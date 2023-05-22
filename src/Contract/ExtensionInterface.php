<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Contract;

interface ExtensionInterface
{
    public function register(array $configuration): void;
}
