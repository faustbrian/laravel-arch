<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Statement\Laravel;

use BombenProdukt\Arch\Contract\StatementInterface;
use BombenProdukt\Arch\Facade\Tree;
use BombenProdukt\Arch\Model\Notification;
use BombenProdukt\Arch\Renderer\FileRenderer;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

final readonly class MailStatement implements StatementInterface
{
    public function __construct(
        private string $mailable,
        private string $recipient,
        private array $parameters,
    ) {}

    public static function from(array $context): StatementInterface
    {
        $statement = Str::parseStatement($context['statement']);

        Tree::add('notifications', new Notification(name: $statement[0]));

        return new self(
            mailable: $statement[0],
            recipient: Arr::get($statement, 'recipient.0'),
            parameters: Arr::mapValueToProperty($statement['with'] ?? []),
        );
    }

    public function code(array $context = []): string
    {
        return \sprintf(
            'Mail::to($%s)->send(new %s(%s));',
            \str_replace('.', '->', $this->recipient),
            $this->mailable,
            Arr::propertiesToVariableList($this->parameters),
        );
    }

    public function test(array $context = []): string
    {
        return FileRenderer::render('laravel/mail/test/mail', [
            'class' => $this->mailable,
            'recipient' => $this->recipient,
        ]);
    }

    public function imports(array $context = []): array
    {
        return [
            Mail::class,
        ];
    }

    public function traits(array $context = []): array
    {
        return [];
    }
}
