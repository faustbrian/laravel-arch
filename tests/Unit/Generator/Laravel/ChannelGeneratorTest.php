<?php

declare(strict_types=1);

namespace Tests\Unit\Generator\Laravel;

use BombenProdukt\Arch\Generator\Laravel\ChannelGenerator;

it('should create a channel', function (): void {
    shouldCreateFiles([
        'app/Channels/OrderChannel.php',
    ]);

    assertMatchesGeneratorSnapshot(ChannelGenerator::class, 'channel/channel');
});
