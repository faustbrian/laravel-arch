<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Contract;

interface ClassRendererInterface
{
    public function render(string $path, array $context): string;
}
