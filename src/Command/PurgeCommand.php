<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Command;

use BaseCodeOy\Arch\Facade\Reporter;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

final class PurgeCommand extends Command
{
    public $signature = 'arch:purge';

    public $description = 'Purge all files and directories generated from the manifest.';

    public function handle(): int
    {
        if (!Reporter::exists()) {
            $this->error('The report file does not exist.');

            return self::FAILURE;
        }

        $this->info('Deleted:');

        foreach (\array_keys(Reporter::decode()->created()) as $path) {
            $this->info("- {$path}");

            File::delete($path);
        }

        return self::SUCCESS;
    }
}
