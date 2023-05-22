<?php

declare(strict_types=1);

namespace Tests\Feature\Command;

use BombenProdukt\Arch\Command\PurgeCommand;
use BombenProdukt\Arch\Path;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use function Spatie\Snapshots\assertMatchesSnapshot;

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

    assertMatchesSnapshot(Artisan::output());
});
