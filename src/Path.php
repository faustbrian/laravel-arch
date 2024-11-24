<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch;

use Illuminate\Support\Facades\Config;

final readonly class Path
{
    public static function app(?string $path = null): string
    {
        return self::path(Config::get('arch.app_path'), $path);
    }

    public static function arch(?string $path = null): string
    {
        return self::path(Config::get('arch.arch_path'), $path);
    }

    public static function stub(?string $path = null): string
    {
        return self::path(Config::get('arch.stub_path'), $path);
    }

    private static function path(string $base, ?string $path): string
    {
        return \trim(\sprintf('%s/%s', \str_replace('\\', '/', $base), $path));
    }
}
