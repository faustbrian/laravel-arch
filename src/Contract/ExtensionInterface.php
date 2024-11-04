<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Contract;

interface ExtensionInterface
{
    public function register(array $configuration): void;
}
