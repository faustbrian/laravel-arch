<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Command;

use Illuminate\Console\Command;

final class TraceCommand extends Command
{
    public $signature = 'arch:trace';

    public $description = 'Trace files and directories and generate a manifest file from them.';

    public function handle(): int
    {
        return self::SUCCESS;
    }
}
