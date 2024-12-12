<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Model;

use BaseCodeOy\Arch\Contract\StatementInterface;

final readonly class ControllerMethod
{
    /**
     * @param array<StatementInterface> $statements
     */
    public function __construct(
        private string $verb,
        private string $name,
        private array $statements = [],
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
     * @return array<StatementInterface>
     */
    public function statements(): array
    {
        return $this->statements;
    }
}
