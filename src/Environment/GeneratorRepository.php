<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Environment;

final class GeneratorRepository
{
    /** @var array<Generator> */
    private array $generators = [];

    public function __construct()
    {
        //
    }

    /** @var array<Generator> */
    public function all(): array
    {
        return $this->generators;
    }

    public function add(array $generator): void
    {
        $this->generators[] = new Generator(...$generator);
    }

    public function findByAccessor(string $accessor): Generator
    {
        return head(\array_filter($this->generators, fn (Generator $generator): bool => $generator->accessor() === $accessor));
    }
}
