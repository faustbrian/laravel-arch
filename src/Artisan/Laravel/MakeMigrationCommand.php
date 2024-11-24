<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

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
