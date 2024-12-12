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

    #[\Override()]
    public function code(array $context = []): string
    {
        return \sprintf(
            'Notification::send($%s, new %s(%s));',
            \str_replace('.', '->', $this->recipient),
            $this->mailable,
            Arr::propertiesToVariableList($this->parameters),
        );
    }

    #[\Override()]
    public function test(array $context = []): string
    {
        return FileRenderer::render('laravel/notification/test/notification', [
            'class' => $this->mailable,
            'recipient' => $this->recipient,
        ]);
    }

    #[\Override()]
    public function imports(array $context = []): array
    {
        return [
            Notification::class,
        ];
    }

    #[\Override()]
    public function traits(array $context = []): array
    {
        return [];
    }
}
