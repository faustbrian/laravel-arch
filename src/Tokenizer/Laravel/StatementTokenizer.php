<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Tokenizer\Laravel;

use BombenProdukt\Arch\Contract\TokenizerInterface;
use BombenProdukt\Arch\Exception\WrongStatementHandlerException;
use BombenProdukt\Arch\Facade\Environment;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Traits\Macroable;

final class StatementTokenizer implements TokenizerInterface
{
    use Macroable;

    public function tokenize(array $tokens): array
    {
        $statements = [];

        foreach ($tokens as $statement) {
            $method = \key($statement);

            foreach (Environment::statements()->findByMethod($method) as $statementHandler) {
                try {
                    $statements[] = App::call(
                        [
                            $statementHandler->fullyQualifiedClassName(),
                            'from',
                        ],
                        [
                            'context' => [
                                'method' => $method,
                                'statement' => $statement[$method],
                            ],
                        ],
                    );
                } catch (WrongStatementHandlerException) {
                    continue;
                }
            }
        }

        return $statements;
    }
}
