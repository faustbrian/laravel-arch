<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Model;

use Illuminate\Support\Str;

final class Livewire extends AbstractData
{
    public function __construct(
        private readonly string $name,
        private readonly ?string $view = null,
        private readonly bool $inline = false,
    ) {
        $this->normalizeNamespace($name);
    }

    public function name(): string
    {
        return $this->basename($this->name);
    }

    public function nameWithSuffixForTest(): string
    {
        return Str::suffix($this->name(), 'Test');
    }

    public function nameWithSuffixForView(): string
    {
        return Str::suffix(Str::kebab($this->name()), '.blade');
    }

    public function view(): string
    {
        if (empty($this->view)) {
            return 'livewire.'.Str::kebab($this->name());
        }

        return $this->view;
    }

    public function inline(): bool
    {
        return $this->inline;
    }

    protected function accessor(): string
    {
        return 'livewire.components';
    }
}
