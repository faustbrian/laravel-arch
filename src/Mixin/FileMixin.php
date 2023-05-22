<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Mixin;

use BombenProdukt\Arch\Path;
use Closure;
use Illuminate\Support\Facades\File;

/**
 * @mixin File
 */
final class FileMixin
{
    public function stub(): Closure
    {
        return function (string $path): string {
            /** @var File $this */
            return $this->get(Path::stub($path));
        };
    }
}
