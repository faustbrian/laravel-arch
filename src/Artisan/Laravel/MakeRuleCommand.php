<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Artisan\Laravel;

use BaseCodeOy\Arch\Artisan\AbstractCommand;

final class MakeRuleCommand extends AbstractCommand
{
    public function implicit(): static
    {
        $this->option('implicit');

        return $this;
    }

    protected function signature(): string
    {
        return 'make:rule';
    }
}
