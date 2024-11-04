<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Model;

final class Index
{
    public function __construct(
        private readonly string $type,
        private readonly array $columns = [],
    ) {}

    public function type()
    {
        return $this->type;
    }

    public function columns()
    {
        return $this->columns;
    }
}
