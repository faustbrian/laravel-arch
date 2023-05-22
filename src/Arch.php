<?php

declare(strict_types=1);

namespace BombenProdukt\Arch;

use BombenProdukt\Arch\Contract\GeneratorInterface;
use BombenProdukt\Arch\Contract\TokenizerInterface;
use BombenProdukt\Arch\Facade\Environment;
use BombenProdukt\Arch\Facade\Parser;
use BombenProdukt\Arch\Facade\Tree;
use BombenProdukt\Arch\Model\GeneratorResult;
use BombenProdukt\Arch\Model\Manifest;
use Illuminate\Support\Facades\App;

final readonly class Arch
{
    public static function parse(string $path): void
    {
        self::tokenize(Parser::parse($path));
    }

    public static function tokenize(Manifest $manifest): void
    {
        Tree::flush();

        foreach (Environment::tokenizers()->all() as $tokenizer) {
            /** @var TokenizerInterface */
            $tokenizer = App::make($tokenizer->fullyQualifiedClassName(), [
                'configuration' => $tokenizer->configuration(),
            ]);

            Tree::merge(
                tokens: $tokenizer->tokenize($manifest->definitions()),
                replaceOnConflict: true,
            );
        }
    }

    public static function generate(): GeneratorResult
    {
        $components = [];

        foreach (Environment::generators()->all() as $generator) {
            /** @var GeneratorInterface */
            $generator = App::make($generator->fullyQualifiedClassName());

            App::call([$generator, 'generate']);

            $components = \array_merge_recursive($components, $generator->result()->toArray());
        }

        return new GeneratorResult(...$components);
    }
}
