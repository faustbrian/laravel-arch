<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Model;

final class View extends AbstractData
{
    public function __construct(private readonly string $name)
    {
        //
    }

    public function name(): string
    {
        return $this->name;
    }
}
