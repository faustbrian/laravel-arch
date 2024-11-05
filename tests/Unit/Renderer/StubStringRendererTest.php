<?php

declare(strict_types=1);

namespace Tests\Unit\Renderer;

use BaseCodeOy\Arch\Renderer\StubStringRenderer;
use function Spatie\Snapshots\assertMatchesSnapshot;

it('should render a string stub', function (): void {
    $result = (new StubStringRenderer())->render('{{ name }} ({{ age }})', [
        'name' => 'John Doe',
        'age' => 30,
    ]);

    assertMatchesSnapshot($result);
});
