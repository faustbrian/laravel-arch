<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Artisan\Laravel\Nova;

use BaseCodeOy\Arch\Artisan\AbstractCommand;

final class MakeFilterCommand extends AbstractCommand
{
    public function boolean(): static
    {
        $this->option('boolean');

        return $this;
    }

    public function date(): static
    {
        $this->option('date');

        return $this;
    }

    #[\Override()]
    protected function signature(): string
    {
        return 'nova:filter';
    }
}
