<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Command;

use BaseCodeOy\Arch\Path;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

final class SetupCommand extends Command
{
    public $signature = 'arch:setup';

    public $description = 'Create the initial manifest file.';

    public function handle(): int
    {
        $manifest = Path::arch('manifest.yaml');

        if (File::exists($manifest)) {
            $this->error("The manifest file {$manifest} already exists.");

            return self::FAILURE;
        }

        File::ensureDirectoryExists(Path::arch());

        File::put($manifest, 'arch: 1.0.0');

        $this->info('The manifest file was created.');

        return self::SUCCESS;
    }
}
