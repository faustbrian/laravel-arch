<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Artisan\Laravel;

use BombenProdukt\Arch\Artisan\AbstractCommand;

final class MakeMailCommand extends AbstractCommand
{
    public function markdown(string $markdown): static
    {
        $this->option('markdown', $markdown);

        return $this;
    }

    public function pest(): static
    {
        $this->option('pest');

        return $this;
    }

    public function test(): static
    {
        $this->option('test');

        return $this;
    }

    protected function signature(): string
    {
        return 'make:mail';
    }
}
