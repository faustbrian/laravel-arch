<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Artisan\Laravel;

use BombenProdukt\Arch\Artisan\AbstractCommand;

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
