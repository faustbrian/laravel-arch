<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Statement\Laravel;

use BaseCodeOy\Arch\Contract\StatementInterface;
use BaseCodeOy\Arch\Renderer\FileRenderer;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;

final readonly class RespondStatement implements StatementInterface
{
    public function __construct(
        private readonly int $statusCode = 200,
        private readonly mixed $content = null,
    ) {}

    public static function from(array $context): StatementInterface
    {
        $statement = Str::parseStatement($context['statement']);

        return new self(
            statusCode: (int) Arr::get($statement, 'statusCode.0', 200),
            content: $statement['content'] ?? null,
        );
    }

    #[\Override()]
    public function code(array $context = []): string
    {
        if (\is_array($this->content)) {
            return \sprintf(
                'return Response::json(%s);',
                Arr::propertiesToArray(Arr::mapValueToProperty($this->content)),
            );
        }

        if ($this->content) {
            return \sprintf(
                'return Response::make(%s%s);',
                $this->content,
                $this->statusCode,
            );
        }

        return \sprintf('return Response::noContent(%s);', $this->statusCode === 204 ? '' : $this->statusCode);
    }

    #[\Override()]
    public function test(array $context = []): string
    {
        return FileRenderer::render('laravel/response/test/response', [
            'statusCode' => $this->statusCode,
        ]);
    }

    #[\Override()]
    public function imports(array $context = []): array
    {
        return [
            Response::class,
        ];
    }

    #[\Override()]
    public function traits(array $context = []): array
    {
        return [];
    }
}
