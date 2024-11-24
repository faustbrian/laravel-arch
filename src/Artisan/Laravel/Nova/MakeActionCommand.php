<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Artisan\Laravel\Nova;

use BaseCodeOy\Arch\Artisan\AbstractCommand;

final class MakeActionCommand extends AbstractCommand
{
    public function destructive(): static
    {
        $this->option('destructive');

        return $this;
    }

    public function queued(): static
    {
        $this->option('queued');

        return $this;
    }

    protected function signature(): string
    {
        return 'nova:action';
    }
}
