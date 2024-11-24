<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Transformer;

use BaseCodeOy\Arch\Model\Column;
use Illuminate\Support\Str;

final readonly class RuleTransformer
{
    public const INTEGER_TYPES = [
        'integer',
        'tinyInteger',
        'smallInteger',
        'mediumInteger',
        'bigInteger',
        'increments',
        'tinyIncrements',
        'smallIncrements',
        'mediumIncrements',
        'bigIncrements',
        'unsignedBigInteger',
        'unsignedInteger',
        'unsignedMediumInteger',
        'unsignedSmallInteger',
        'unsignedTinyInteger',
    ];

    public static function fromColumn(string $context, Column $column)
    {
        $rules = [];

        $rules[] = \in_array('nullable', $column->modifiers(), true) ? 'nullable' : 'required';

        if (\in_array($column->type(), ['string', 'char', 'text', 'longText', 'fullText'], true)) {
            $rules[] = self::overrideStringRuleForSpecialNames($column->name());
        }

        if ($column->type() === 'id' && ($column->attributes() || Str::endsWith($column->name(), '_id'))) {
            $reference = $column->attributes()[0] ?? Str::beforeLast($column->name(), '_id');
            $rules = \array_merge($rules, ['integer', 'exists:'.Str::plural($reference).',id']);
        }

        if (\in_array($column->type(), self::INTEGER_TYPES, true)) {
            $rules[] = 'integer';

            if (Str::startsWith($column->type(), 'unsigned')) {
                $rules[] = 'gt:0';
            }
        }

        if (\in_array($column->type(), ['json'], true)) {
            $rules[] = 'json';
        }

        if (\in_array($column->type(), ['decimal', 'double', 'float', 'unsignedDecimal'], true)) {
            $rules[] = 'numeric';

            if (Str::startsWith($column->type(), 'unsigned') || \in_array('unsigned', $column->modifiers(), true)) {
                $rules[] = 'gt:0';
            }

            if (!empty($column->attributes())) {
                $rules[] = self::betweenRuleForColumn($column);
            }
        }

        if (\in_array($column->type(), ['enum', 'set'], true)) {
            $rules[] = 'in:'.\implode(',', $column->attributes());
        }

        if (\in_array($column->type(), ['date', 'dateTime', 'dateTimeTz'], true)) {
            $rules[] = 'date';
        }

        if ($column->attributes()) {
            if (\in_array($column->type(), ['string', 'char'], true)) {
                $rules[] = 'max:'.\implode('', $column->attributes());
            }
        }

        if (\in_array('unique', $column->modifiers(), true)) {
            $rules[] = 'unique:'.$context.','.$column->name();
        }

        return $rules;
    }

    private static function overrideStringRuleForSpecialNames($name)
    {
        if (Str::startsWith($name, 'email')) {
            return 'email';
        }

        if ($name === 'password') {
            return 'password';
        }

        return 'string';
    }

    private static function betweenRuleForColumn(Column $column)
    {
        $precision = $column->attributes()[0];
        $scale = $column->attributes()[1] ?? 0;

        $value = \substr_replace(\mb_str_pad('', $precision, '9'), '.', $precision - $scale, 0);

        if ((int) $scale === 0) {
            $value = \trim($value, '.');
        }

        if ($precision === $scale) {
            $value = '0'.$value;
        }

        $min = $column->type() === 'unsignedDecimal' || \in_array('unsigned', $column->modifiers(), true) ? '0' : '-'.$value;

        return 'between:'.$min.','.$value;
    }
}
