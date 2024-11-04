<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Renderer;

use BaseCodeOy\Arch\Contract\StringRendererInterface;
use Twig\Environment;
use Twig\Loader\ArrayLoader;

final readonly class TwigStringRenderer implements StringRendererInterface
{
    public function render(string $template, array $context): string
    {
        return (new Environment(new ArrayLoader()))
            ->createTemplate($template)
            ->render($context);
    }
}
