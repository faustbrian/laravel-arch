<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Model;

final readonly class Manifest
{
    private string $arch;

    private array $definitions;

    public function arch(): string
    {
        return $this->arch;
    }

    public function definitions(): array
    {
        return $this->definitions;
    }

    public function setVersion(string $arch): void
    {
        $this->arch = $arch;
    }

    public function setDefinitions(array $definitions): void
    {
        $this->definitions = $definitions;
    }
}
