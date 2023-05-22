<?php

declare(strict_types=1);

namespace Tests\Unit\Statement\Laravel;

use BombenProdukt\Arch\Statement\Laravel\ResourceCollectionStatement;
use function Spatie\Snapshots\assertMatchesSnapshot;

it('can generate code', function (): void {
    $resourceCollectionStatement = new ResourceCollectionStatement('Post', 'posts');

    assertMatchesSnapshot($resourceCollectionStatement->code());
});
