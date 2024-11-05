<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Environment;

final class StatementRepository
{
    /**
     * @var Statement[]
     */
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
     * @return Statement[]
     */
    public function findByMethod(string $method): array
    {
        return \array_filter(
            $this->statements,
            fn (Statement $statement) => \in_array($method, $statement->methods(), true),
        );
    }
}
