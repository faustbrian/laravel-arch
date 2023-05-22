<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Command;

use BombenProdukt\Arch\Facade\Reporter;
use BombenProdukt\Arch\Path;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

final class PurgeCommand extends Command
{
    public $signature = 'arch:purge';

    public $description = 'Purge all files and directories generated from the manifest.';

    public function handle(): int
    {
        $report = Path::arch('report.yaml');

        if (File::missing($report)) {
            $this->error("The report file {$report} does not exist.");

            return self::FAILURE;
        }

        $this->info('Deleted:');

        foreach (\array_keys(Reporter::decode($report)->created()) as $path) {
            $this->info("- {$path}");

            File::delete($path);
        }

        return self::SUCCESS;
    }
}
