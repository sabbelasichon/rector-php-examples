<?php

namespace Nca\Rector\Php;

use JsonException;
use Nca\Rector\Dummy\Dummy;
use Traversable;
use UnexpectedValueException;

class SomePhpCode implements \Stringable
{
    public const SOME = 'foo';

    private string $property = 'bar';

    public function __construct(private Dummy $dummy)
    {
        $this->bootstrap();
    }

    public function bootstrap()
    {
        define('CONSTANT_2', 'value');
    }

    /**
     * @throws JsonException
     */
    public function jsonEncode(mixed $data): string
    {
        return json_encode($data, 512, JSON_THROW_ON_ERROR);
    }

    public function getDirectoryTwoLevelUp(string $path) : string
    {
        return dirname($path,2);
    }

    /**
     * @param mixed|null $value
     *
     * @return int|mixed
     */
    public function getValueOrDefaultIfNull($value = null)
    {
        return  $value ?? 10;
    }

    /**
     * @param mixed $value
     *
     * @return bool
     */
    public function isIterable($value)
    {
        return is_iterable($value);
    }

    /**
     * @return array
     */
    public function filterNumbersGreaterTen(array $numbers)
    {
        return array_filter($numbers, fn($number) => $number > 10 );
    }

    /**
     * @param array $values
     */
    public function mySort(array $values)
    {
        usort($values, function ($a, $b) {
            return $a <=> $b;
        });

        return $values;
    }

    /**
     * @param string $haystack
     *
     * @return bool
     */
    public static function stringContainsCharacterA($haystack)
    {
        return str_contains($haystack, 'a');
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->property .' '. self::SOME;
    }
}