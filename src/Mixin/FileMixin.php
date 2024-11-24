<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Mixin;

use BaseCodeOy\Arch\Path;
use Illuminate\Support\Facades\File;

/**
 * @mixin File
 */
final class FileMixin
{
    public function stub(): \Closure
    {
        return function (string $path): string {
            /** @var File $this */
            return $this->get(Path::stub($path));
        };
    }
}
