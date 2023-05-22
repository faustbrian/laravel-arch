<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Artisan\Laravel;

use BombenProdukt\Arch\Artisan\AbstractCommand;

final class MakePolicyCommand extends AbstractCommand
{
    public function model(string $model): static
    {
        $this->option('model', $model);

        return $this;
    }

    public function guard(string $guard): static
    {
        $this->option('guard', $guard);

        return $this;
    }

    protected function signature(): string
    {
        return 'make:policy';
    }
}
