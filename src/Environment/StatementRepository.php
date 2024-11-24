<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Environment;

final class StatementRepository
{
    /** @var array<Statement> */
    private array $statements = [];

    public function __construct()
    {
        //
    }

    public function all(): array
    {
        return $this->statements;
    }

    public function add(array $statement): void
    {
        $this->statements[] = new Statement(...$statement);
    }

    /**
     * @return array<Statement>
     */
    public function findByMethod(string $method): array
    {
        return \array_filter(
            $this->statements,
            fn (Statement $statement) => \in_array($method, $statement->methods(), true),
        );
    }
}
