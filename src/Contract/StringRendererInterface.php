<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Contract;

interface StringRendererInterface
{
    public function render(string $template, array $context): string;
}
