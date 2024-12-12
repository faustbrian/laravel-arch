<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Mixin;

use BaseCodeOy\Arch\Model\Property;
use Illuminate\Support\Arr;

/**
 * @mixin Arr
 */
final readonly class ArrMixin
{
    public function propertiesToArray(): \Closure
    {
        /**
         * @param array<Property> $properties
         */
        return function (array $properties): string {
            $arguments = [];

            foreach ($properties as $property) {
                $arguments[] = \sprintf("'%s' => $%s", $property->name(), $property->name());
            }

            return \sprintf('[%s]', \implode(', ', $arguments));
        };
    }

    public function propertiesToArrayItem(): \Closure
    {
        /**
         * @param array<Property> $properties
         */
        return function (array $properties): string {
            $arguments = [];

            foreach ($properties as $key => $value) {
                $arguments[] = \is_numeric($key) ? \sprintf("'%s' => $%s", $value, $value) : \sprintf("'%s' => '%s'", $key, $value);
            }

            return \implode(', ', $arguments);
        };
    }

    public function propertiesToCompact(): \Closure
    {
        /**
         * @param array<Property> $properties
         */
        return function (array $properties): string {
            $arguments = [];

            foreach ($properties as $property) {
                $arguments[] = \sprintf("'%s'", $property->name());
            }

            return \sprintf('compact(%s)', \implode(', ', $arguments));
        };
    }

    public function propertiesToConstructor(): \Closure
    {
        /**
         * @param array<Property> $properties
         */
        return function (array $properties): string {
            $result = [];

            foreach ($properties as $property) {
                $propertyString = $property->visibility();

                if ($property->isReadonly()) {
                    $propertyString .= ' readonly';
                }

                if ($property->isNullable()) {
                    $propertyString .= ' ?';
                } else {
                    $propertyString .= ' ';
                }

                $propertyString .= $property->type();
                $propertyString .= ' $'.$property->name();

                if ($property->isNullable() && $property->defaultValue() === null) {
                    $propertyString .= ' = null';
                }

                if ($property->defaultValue() !== null) {
                    $propertyString .= \sprintf(' = "%s"', $property->defaultValue());
                }

                $result[] = $propertyString;
            }

            return \implode(', ', $result);
        };
    }

    public function propertiesToFunction(): \Closure
    {
        /**
         * @param array<Property> $properties
         */
        return function (array $properties): string {
            $arguments = [];

            foreach ($properties as $property) {
                if ($property->defaultValue() !== null) {
                    $arguments[] = \sprintf("%s $%s = '%s'", $property->type(), $property->name(), $property->defaultValue());
                } else {
                    $arguments[] = \sprintf('%s $%s', $property->type(), $property->name());
                }
            }

            return \implode(', ', $arguments);
        };
    }

    public function propertiesToVariableList(): \Closure
    {
        /**
         * @param array<Property> $properties
         */
        return function (array $properties): string {
            $arguments = [];

            foreach ($properties as $property) {
                $arguments[] = \sprintf('$%s', $property->name());
            }

            return \implode(', ', $arguments);
        };
    }

    public function mapValueToProperty(): \Closure
    {
        /**
         * @param array<Property> $properties
         */
        return function (array $properties): array {
            $result = [];

            foreach ($properties as $key => $value) {
                $result[] = new Property(name: \is_numeric($key) ? $value : $key);
            }

            return $result;
        };
    }
}
