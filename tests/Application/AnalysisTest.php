<?php

declare(strict_types=1);

namespace Tests\Application;

use BaseCodeOy\PackagePowerPack\TestBench\AbstractAnalysisTestCase;
use SplFileInfo;

/**
 * @internal
 *
 * @coversNothing
 */
final class AnalysisTest extends AbstractAnalysisTestCase
{
    protected static function shouldAnalyzeFile(SplFileInfo $file): bool
    {
        if (\str_contains($file->getPath(), '__snapshots__')) {
            return false;
        }

        if (\str_contains($file->getPath(), 'Fixtures')) {
            return false;
        }

        return true;
    }

    protected static function getIgnored(): array
    {
        return [
            'Spatie\Snapshots\assertMatchesSnapshot',
        ];
    }
}
