<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Tokenizer\Laravel;

use BaseCodeOy\Arch\Contract\TokenizerInterface;
use BaseCodeOy\Arch\Exception\WrongStatementHandlerException;
use BaseCodeOy\Arch\Facade\Environment;
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
