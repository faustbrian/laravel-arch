<?php

declare(strict_types=1);

namespace Tests\Unit\Renderer;

use BaseCodeOy\Arch\Renderer\TwigStringRenderer;
use function Spatie\Snapshots\assertMatchesSnapshot;

it('should render a string stub', function (): void {
    $result = (new TwigStringRenderer())->render('{{ name }} ({{ age }})', [
        'name' => 'John Doe',
        'age' => 30,
    ]);

    assertMatchesSnapshot($result);
});
