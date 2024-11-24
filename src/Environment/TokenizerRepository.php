<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Environment;

final class TokenizerRepository
{
    /** @var array<Tokenizer> */
    private array $tokenizers = [];

    public function __construct()
    {
        //
    }

    /**
     * @return array<Tokenizer>
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
