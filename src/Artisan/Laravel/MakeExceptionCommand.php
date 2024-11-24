<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Artisan\Laravel;

use BaseCodeOy\Arch\Artisan\AbstractCommand;

final class MakeExceptionCommand extends AbstractCommand
{
    public function render(): static
    {
        $this->option('render');

        return $this;
    }

    public function report(): static
    {
        $this->option('report');

        return $this;
    }

    protected function signature(): string
    {
        return 'make:exception';
    }
}
