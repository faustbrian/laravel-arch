<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Feature\Command;

use BaseCodeOy\Arch\Command\SetupCommand;
use BaseCodeOy\Arch\Path;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

it('creates the manifest file', function (): void {
    File::expects('exists')
        ->with(Path::arch('manifest.yaml'))
        ->andReturn(false);

    File::expects('ensureDirectoryExists')
        ->with(Path::arch())
        ->andReturn(true);

    File::expects('put')
        ->with(Path::arch('manifest.yaml'), 'arch: 1.0.0')
        ->andReturn(true);

    $result = Artisan::call(SetupCommand::class);

    expect($result)->toBe(SetupCommand::SUCCESS);

    expect(Artisan::output())->toMatchSnapshot();
});
