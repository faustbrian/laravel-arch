<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Artisan\Laravel;

use BaseCodeOy\Arch\Artisan\AbstractCommand;

final class MakeListenerCommand extends AbstractCommand
{
    public function event(string $event): static
    {
        $this->option('event', $event);

        return $this;
    }

    public function pest(): static
    {
        $this->option('pest');

        return $this;
    }

    public function queued(): static
    {
        $this->option('queued');

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
        return 'make:listener';
    }
}
