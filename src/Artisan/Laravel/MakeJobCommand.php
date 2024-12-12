<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Artisan\Laravel;

use BaseCodeOy\Arch\Artisan\AbstractCommand;

final class MakeJobCommand extends AbstractCommand
{
    public function pest(): static
    {
        $this->option('pest');

        return $this;
    }

    public function sync(): static
    {
        $this->option('sync');

        return $this;
    }

    public function test(): static
    {
        $this->option('test');

        return $this;
    }

    #[\Override()]
    protected function signature(): string
    {
        return 'make:job';
    }
}
