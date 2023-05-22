<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Contract;

interface TokenizerInterface
{
    public function tokenize(array $tokens): array;
}
