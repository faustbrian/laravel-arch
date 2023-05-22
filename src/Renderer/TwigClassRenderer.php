<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Renderer;

use BombenProdukt\Arch\Contract\ClassRendererInterface;

final readonly class TwigClassRenderer implements ClassRendererInterface
{
    public function render(string $path, array $context): string
    {
        return '<?php'.\PHP_EOL.\PHP_EOL.(new TwigFileRenderer())->render($path, $context);
    }
}
