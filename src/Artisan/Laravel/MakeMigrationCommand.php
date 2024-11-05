<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Artisan\Laravel;

use BaseCodeOy\Arch\Artisan\AbstractCommand;

final class MakeMigrationCommand extends AbstractCommand
{
    public function create(string $create): static
    {
        $this->option('create', $create);

        return $this;
    }

    public function table(string $table): static
    {
        $this->option('table', $table);

        return $this;
    }

    public function path(string $path): static
    {
        $this->option('path', $path);

        return $this;
    }

    protected function signature(): string
    {
        return 'make:migration';
    }
}
