<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Command;

use BombenProdukt\Arch\Arch;
use BombenProdukt\Arch\Facade\Reporter;
use BombenProdukt\Arch\Model\GeneratorResult;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Process;
use Illuminate\Support\Str;

final class BuildCommand extends Command
{
    public $signature = 'arch:build';

    public $description = 'Build the manifest file and generate files and directories from it.';

    public function handle(): int
    {
        Arch::parse($this->draftFile());

        $generated = Arch::generate();

        foreach ($generated->toArray() as $action => $files) {
            if (\count($files) === 0) {
                continue;
            }

            $style = $this->outputStyle($action);

            $this->line(Str::studly($action).':', $style);

            foreach (\array_keys($files) as $file) {
                $this->line("- {$file}", $style);
            }
        }

        $this->createReport($generated);

        $this->applyPhpCodingStandardsFixer($generated);

        return self::SUCCESS;
    }

    private function outputStyle($action)
    {
        if ($action === 'deleted') {
            return 'error';
        }

        if ($action === 'skipped') {
            return 'comment';
        }

        if ($action === 'updated') {
            return 'comment';
        }

        return 'info';
    }

    private function draftFile(): string
    {
        if (File::exists(base_path('.arch/manifest.yml'))) {
            return base_path('.arch/manifest.yml');
        }

        if (File::exists(base_path('.arch/manifest.yaml'))) {
            return base_path('.arch/manifest.yaml');
        }

        throw new \RuntimeException('Could not find draft file');
    }

    private function applyPhpCodingStandardsFixer(GeneratorResult $generated): void
    {
        $binaries = [
            [
                'name' => 'Laravel Pint',
                'path' => base_path('vendor/bin/pint'),
                'args' => ' ',
            ],
            [
                'name' => 'PHP Coding Standards Fixer',
                'path' => base_path('vendor/bin/php-cs-fixer'),
                'args' => ' fix ',
            ],
        ];

        foreach ($binaries as $binary) {
            if (File::missing($binary['path'])) {
                continue;
            }

            $this->info($binary['name'].':');

            foreach ($generated->toArray() as $files) {
                foreach (\array_keys($files) as $file) {
                    Process::run(\sprintf('%s%s%s', $binary['path'], $binary['args'], $file));

                    $this->info("- {$file}");
                }
            }

            break;
        }
    }

    private function createReport(GeneratorResult $generated): void
    {
        $report = Reporter::encode($generated);

        File::put($report->path(), $report->contents());
    }
}
