<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Renderer;

use BaseCodeOy\Arch\Contract\ClassRendererInterface;

final readonly class StubClassRenderer implements ClassRendererInterface
{
    public function render(string $path, array $context): string
    {
        return '<?php'.\PHP_EOL.\PHP_EOL.(new StubFileRenderer())->render($path, $context);
    }
}
