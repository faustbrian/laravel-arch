<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Model;

use BaseCodeOy\Arch\Contract\StatementInterface;

final class ControllerMethod
{
    /**
     * @param StatementInterface[] $statements
     */
    public function __construct(
        private readonly string $verb,
        private readonly string $name,
        private readonly array $statements = [],
    ) {}

    public function verb(): string
    {
        return $this->verb;
    }

    public function name(): string
    {
        return $this->name;
    }

    /**
     * @return StatementInterface[]
     */
    public function statements(): array
    {
        return $this->statements;
    }
}
