<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Model\Model;

use Illuminate\Support\Str;

final class LocalScope
{
    public function __construct(private readonly string $name)
    {
        //
    }

    public function name(): string
    {
        return Str::studly($this->name);
    }
}
