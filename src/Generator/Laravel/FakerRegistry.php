<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Generator\Laravel;

final readonly class FakerRegistry
{
    public static function data(string $name): ?string
    {
        return match ($name) {
            'address1' => 'streetAddress',
            'address2' => 'secondaryAddress',
            'city' => 'city',
            'company' => 'company',
            'content' => 'paragraphs(3, true)',
            'country' => 'country',
            'description' => 'text',
            'email' => 'safeEmail',
            'first_name' => 'firstName',
            'firstname' => 'firstName',
            'guid' => 'uuid',
            'last_name' => 'lastName',
            'lastname' => 'lastName',
            'lat' => 'latitude',
            'latitude' => 'latitude',
            'lng' => 'longitude',
            'longitude' => 'longitude',
            'name' => 'name',
            'password' => 'password',
            'phone' => 'phoneNumber',
            'phone_number' => 'phoneNumber',
            'postal_code' => 'postcode',
            'postcode' => 'postcode',
            'remember_token' => 'uuid',
            'slug' => 'slug',
            'ssn' => 'ssn',
            'street' => 'streetName',
            'summary' => 'text',
            'title' => 'sentence(4)',
            'url' => 'url',
            'user_name' => 'userName',
            'username' => 'userName',
            'uuid' => 'uuid',
            'zip' => 'postcode',
            default => null,
        };
    }

    public static function dataType(string $type): ?string
    {
        return match (\mb_strtolower($type)) {
            'biginteger' => 'numberBetween(-100000, 100000)',
            'binary' => 'sha256',
            'boolean' => 'boolean',
            'char' => 'randomLetter',
            'date' => 'date()',
            'datetime' => 'dateTime()',
            'datetimetz' => 'dateTime()',
            'decimal' => 'randomFloat(/** decimal_attributes **/)',
            'double' => 'randomFloat(/** double_attributes **/)',
            'enum' => 'randomElement(/** enum_attributes **/)',
            'float' => 'randomFloat(/** float_attributes **/)',
            'fulltext' => 'text',
            'geometry' => 'word',
            'geometrycollection' => 'word',
            'guid' => 'uuid',
            'id' => 'randomDigitNotNull',
            'integer' => 'numberBetween(-10000, 10000)',
            'ipaddress' => 'ipv4',
            'linestring' => 'word',
            'longtext' => 'text',
            'macaddress' => 'macAddress',
            'mediuminteger' => 'numberBetween(-10000, 10000)',
            'mediumtext' => 'text',
            'morphs_id' => 'randomDigitNotNull',
            'morphs_type' => 'word',
            'multilinestring' => 'word',
            'multipoint' => 'word',
            'multipolygon' => 'word',
            'nullablemorphs' => null,
            'nullabletimestamps' => null,
            'nullableuuidmorphs' => null,
            'point' => 'word',
            'polygon' => 'word',
            'set' => 'randomElement(/** set_attributes **/)',
            'smallint' => 'numberBetween(-1000, 1000)',
            'smallinteger' => 'numberBetween(-1000, 1000)',
            'string' => 'word',
            'text' => 'text',
            'time' => 'time()',
            'timestamp' => 'dateTime()',
            'timestamptz' => 'dateTime()',
            'timetz' => 'time()',
            'tinyinteger' => 'numberBetween(-8, 8)',
            'unsignedbiginteger' => 'randomNumber()',
            'unsigneddecimal' => 'randomNumber()',
            'unsignedinteger' => 'randomNumber()',
            'unsignedmediuminteger' => 'randomNumber()',
            'unsignedsmallinteger' => 'randomNumber()',
            'unsignedtinyinteger' => 'randomDigitNotNull',
            'uuid' => 'uuid',
            'uuidmorphs' => 'word',
            'year' => 'year()',
            default => null,
        };
    }
}
