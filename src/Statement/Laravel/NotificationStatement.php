<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Statement\Laravel;

use BaseCodeOy\Arch\Contract\StatementInterface;
use BaseCodeOy\Arch\Renderer\FileRenderer;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;

final readonly class NotificationStatement implements StatementInterface
{
    public function __construct(
        private string $mailable,
        private string $recipient,
        private array $parameters,
    ) {}

    public static function from(array $context): StatementInterface
    {
        $statement = Str::parseStatement($context['statement']);

        return new self(
            mailable: $statement[0],
            recipient: Arr::get($statement, 'recipient.0'),
            parameters: Arr::mapValueToProperty($statement['with'] ?? []),
        );
    }

    public function code(array $context = []): string
    {
        return \sprintf(
            'Notification::send($%s, new %s(%s));',
            \str_replace('.', '->', $this->recipient),
            $this->mailable,
            Arr::propertiesToVariableList($this->parameters),
        );
    }

    public function test(array $context = []): string
    {
        return FileRenderer::render('laravel/notification/test/notification', [
            'class' => $this->mailable,
            'recipient' => $this->recipient,
        ]);
    }

    public function imports(array $context = []): array
    {
        return [
            Notification::class,
        ];
    }

    public function traits(array $context = []): array
    {
        return [];
    }
}
