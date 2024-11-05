<?php

declare(strict_types=1);

namespace Tests\Unit\Generator\Laravel;

use BaseCodeOy\Arch\Generator\Laravel\ChannelGenerator;

it('should create a channel', function (): void {
    shouldCreateFiles([
        'app/Channels/OrderChannel.php',
    ]);

    assertMatchesGeneratorSnapshot(ChannelGenerator::class, 'channel/channel');
});
