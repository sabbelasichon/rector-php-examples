<?php

namespace Nca\Rector\Php;

use Nca\Rector\Dummy\Dummy;
use Traversable;
use UnexpectedValueException;

class SomePhpCode implements \Stringable
{
    const SOME = 'foo';

    private string $property = 'bar';

    public function __construct()
    {
        $this->bootstrap();
    }

    public function bootstrap()
    {
        define('CONSTANT_2', 'value');
    }

    /**
     * @param mixed $data
     *
     * @return string
     */
    public function jsonEncode($data)
    {
        $json = json_encode($data, JSON_THROW_ON_ERROR);

        if($json === false) {
            throw new UnexpectedValueException('Could not encode value to json');
        }

        return $json;
    }

    /**
     * @param string $path
     *
     * @return string
     */
    public function getDirectoryTwoLevelUp($path)
    {
        return dirname($path, 2);
    }

    /**
     * @param mixed|null $value
     *
     * @return int|mixed
     */
    public function getValueOrDefaultIfNull($value = null)
    {
        return $value ?? 10;
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
        return array_filter($numbers, fn($number) => $number > 10);
    }

    public function mySort(array $values)
    {
        usort($values, fn($a, $b) => $b[0] <=> $a[0]);

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

    public function __toString(): string
    {
        return $this->property .' '. self::SOME;
    }
}