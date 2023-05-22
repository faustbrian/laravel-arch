<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Command;

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
