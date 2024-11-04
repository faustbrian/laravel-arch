<?php

declare(strict_types=1);

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
        if (empty($this->view)) {
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
