<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Renderer;

use BaseCodeOy\Arch\Contract\StringRendererInterface;
use Illuminate\Support\Str;

final readonly class StubStringRenderer implements StringRendererInterface
{
    public function render(string $template, array $context): string
    {
        return Str::of($template)->replace(
            \array_map(fn ($key) => "{{ {$key} }}", \array_keys($context)),
            \array_values($context),
        )->toString();
    }
}
