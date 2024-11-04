<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Reporter;

final readonly class Report
{
    public function __construct(
        private string $path,
        private string $contents,
    ) {}

    public function path(): string
    {
        return $this->path;
    }

    public function contents(): string
    {
        return $this->contents;
    }
}
