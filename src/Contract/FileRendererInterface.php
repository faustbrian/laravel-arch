<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Contract;

interface FileRendererInterface
{
    public function render(string $path, array $context): string;
}
