<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Feature\Command;

use BaseCodeOy\Arch\Command\PurgeCommand;
use BaseCodeOy\Arch\Path;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

it('deletes every file that was previously created', function (): void {
    File::expects('exists')
        ->with(Path::arch('report.yaml'))
        ->andReturn(true);

    File::expects('get')
        ->with(Path::arch('report.yaml'))
        ->andReturn(fixture('report', 'yaml'));

    File::expects('delete')
        ->withAnyArgs()
        ->times(24)
        ->andReturn(true);

    $result = Artisan::call(PurgeCommand::class);

    expect($result)->toBe(PurgeCommand::SUCCESS);

    expect(Artisan::output())->toMatchSnapshot();
});
