<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Environment;

final class TokenizerRepository
{
    /**
     * @var Tokenizer[]
     */
    private array $tokenizers = [];

    public function __construct()
    {
        //
    }

    /**
     * @return Tokenizer[]
     */
    public function all(): array
    {
        return $this->tokenizers;
    }

    public function add(string $fullyQualifiedClassName, array $configuration = []): void
    {
        $this->tokenizers[] = new Tokenizer($fullyQualifiedClassName, $configuration);
    }
}
