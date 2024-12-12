<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Renderer;

use BaseCodeOy\Arch\Contract\StringRendererInterface;
use Illuminate\Support\Str;

final readonly class StubStringRenderer implements StringRendererInterface
{
    #[\Override()]
    public function render(string $template, array $context): string
    {
        return Str::of($template)->replace(
            \array_map(fn ($key): string => \sprintf('{{ %s }}', $key), \array_keys($context)),
            \array_values($context),
        )->toString();
    }
}
