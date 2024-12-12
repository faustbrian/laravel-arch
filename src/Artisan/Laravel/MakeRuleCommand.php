<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Artisan\Laravel;

use BaseCodeOy\Arch\Artisan\AbstractCommand;

final class MakeRuleCommand extends AbstractCommand
{
    public function implicit(): static
    {
        $this->option('implicit');

        return $this;
    }

    #[\Override()]
    protected function signature(): string
    {
        return 'make:rule';
    }
}
