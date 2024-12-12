<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Command;

use BaseCodeOy\Arch\Arch;
use BaseCodeOy\Arch\Facade\Reporter;
use BaseCodeOy\Arch\Model\GeneratorResult;
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

        $generatorResult = Arch::generate();

        foreach ($generatorResult->toArray() as $action => $files) {
            if (\count($files) === 0) {
                continue;
            }

            $style = $this->outputStyle($action);

            $this->line(Str::studly($action).':', $style);

            foreach (\array_keys($files) as $file) {
                $this->line('- '.$file, $style);
            }
        }

        $this->createReport($generatorResult);

        $this->applyPhpCodingStandardsFixer($generatorResult);

        return self::SUCCESS;
    }

    private function outputStyle(int|string $action): string
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

    private function applyPhpCodingStandardsFixer(GeneratorResult $generatorResult): void
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

            foreach ($generatorResult->toArray() as $files) {
                foreach (\array_keys($files) as $file) {
                    Process::run(\sprintf('%s%s%s', $binary['path'], $binary['args'], $file));

                    $this->info('- '.$file);
                }
            }

            break;
        }
    }

    private function createReport(GeneratorResult $generatorResult): void
    {
        $report = Reporter::encode($generatorResult);

        File::put($report->path(), $report->contents());
    }
}
