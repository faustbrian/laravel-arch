<?php

declare(strict_types=1);

namespace Tests\Feature\Command;

use BombenProdukt\Arch\Command\SetupCommand;
use BombenProdukt\Arch\Path;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use function Spatie\Snapshots\assertMatchesSnapshot;

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

    assertMatchesSnapshot(Artisan::output());
});
