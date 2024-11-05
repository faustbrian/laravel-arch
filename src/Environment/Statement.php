<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Environment;

final class Statement
{
    public function __construct(
        private readonly array $methods,
        private readonly string $fullyQualifiedClassName,
    ) {}

    public function methods(): array
    {
        return $this->methods;
    }

    public function fullyQualifiedClassName(): string
    {
        return $this->fullyQualifiedClassName;
    }
}
