<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Model;

use Illuminate\Support\Str;

final class Mail extends AbstractData
{
    public function __construct(
        private readonly string $name,
        private readonly string $subject,
        private readonly ?string $view = null,
        private readonly bool $shouldQueue = false,
        private readonly bool $shouldBeMarkdown = false,
    ) {
        $this->normalizeNamespace($name);
    }

    #[\Override()]
    public function name(): string
    {
        return $this->basename($this->name);
    }

    public function subject(): string
    {
        return $this->subject;
    }

    public function view(): string
    {
        if ($this->view === null || $this->view === '' || $this->view === '0') {
            return 'mail.'.Str::kebab($this->name());
        }

        return $this->view;
    }

    public function shouldQueue(): bool
    {
        return $this->shouldQueue;
    }

    public function shouldBeMarkdown(): bool
    {
        return $this->shouldBeMarkdown;
    }
}
