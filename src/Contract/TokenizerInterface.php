<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Contract;

interface TokenizerInterface
{
    public function tokenize(array $tokens): array;
}
