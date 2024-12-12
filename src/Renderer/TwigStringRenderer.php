<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Renderer;

use BaseCodeOy\Arch\Contract\StringRendererInterface;
use Twig\Environment;
use Twig\Loader\ArrayLoader;

final readonly class TwigStringRenderer implements StringRendererInterface
{
    #[\Override()]
    public function render(string $template, array $context): string
    {
        return (new Environment(new ArrayLoader()))
            ->createTemplate($template)
            ->render($context);
    }
}
