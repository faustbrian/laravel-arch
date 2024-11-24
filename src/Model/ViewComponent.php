<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Model;

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
