<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Environment;

final readonly class Tokenizer
{
    public function __construct(
        private string $fullyQualifiedClassName,
        private array $configuration,
    ) {}

    public function fullyQualifiedClassName(): string
    {
        return $this->fullyQualifiedClassName;
    }

    public function configuration(): array
    {
        return $this->configuration;
    }
}
