<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Artisan\Laravel;

use BombenProdukt\Arch\Artisan\AbstractCommand;

final class MakeFactoryCommand extends AbstractCommand
{
    public function model(string $model): static
    {
        $this->option('model', $model);

        return $this;
    }

    protected function signature(): string
    {
        return 'make:factory';
    }
}
