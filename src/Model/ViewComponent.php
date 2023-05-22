<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Model;

use Illuminate\Support\Str;

final class ViewComponent extends AbstractData
{
    public function __construct(
        private readonly string $name,
        private readonly ?string $view = null,
    ) {
        $this->normalizeNamespace($name);
    }

    public function name(): string
    {
        return $this->basename($this->name);
    }

    public function view(): string
    {
        if (empty($this->view)) {
            return 'components.'.Str::kebab($this->name);
        }

        return $this->view;
    }

    public function inline(): bool
    {
        return $this->view === null;
    }
}
