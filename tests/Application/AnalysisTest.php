<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Application;

use BaseCodeOy\Crate\TestBench\AbstractAnalysisTestCase;

/**
 * @internal
 */
#[\PHPUnit\Framework\Attributes\CoversNothing()]
final class AnalysisTest extends AbstractAnalysisTestCase
{
    #[\Override()]
    protected static function shouldAnalyzeFile(\SplFileInfo $file): bool
    {
        if (\str_contains($file->getPath(), '__snapshots__')) {
            return false;
        }

        return !\str_contains($file->getPath(), 'Fixtures');
    }
}
