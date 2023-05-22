<?php

declare(strict_types=1);

namespace Tests\Unit\Statement\Laravel;

use BombenProdukt\Arch\Statement\Laravel\ResourceStatement;
use function Spatie\Snapshots\assertMatchesSnapshot;

it('can generate code', function (): void {
    $resourceStatement = new ResourceStatement('post', 'post');

    assertMatchesSnapshot($resourceStatement->code());
});
