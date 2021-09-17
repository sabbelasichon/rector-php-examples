<?php

namespace Nca\Rector\Php;

use Nca\Rector\Dummy\Dummy;
use Traversable;
use UnexpectedValueException;

class SomePhpCode
{
    const SOME = 'foo';

    /**
     * @var Dummy
     */
    private $dummy;

    /**
     * @var string
     */
    private $property = 'bar';

    public function __construct(Dummy $dummy)
    {
        $this->dummy = $dummy;
        $this->bootstrap();
    }

    public function bootstrap()
    {
        define(CONSTANT_2, 'value');
    }

    /**
     * @param mixed $data
     *
     * @return string
     */
    public function jsonEncode($data)
    {
        $json = json_encode($data);

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
        return dirname(dirname($path));
    }

    /**
     * @param null $value
     *
     * @return int|mixed
     */
    public function getValueOrDefaultIfNull($value = null)
    {
        return $value === null ? 10 : $value;
    }

    /**
     * @param mixed $value
     *
     * @return bool
     */
    public function isIterable($value)
    {
        return is_array($value) || $value instanceof Traversable;
    }

    /**
     * @return array
     */
    public function filterNumbersGreaterTen(array $numbers)
    {
        return array_filter($numbers, function ($number) {
            return $number > 10;
        });
    }

    /**
     * @param array $values
     */
    public function mySort(array $values)
    {
        usort($values, function ($a, $b) {
            if ($a[0] === $b[0]) {
                return 0;
            }

            return ($a[0] < $b[0]) ? 1 : -1;
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
        return strpos($haystack, 'a') !== false;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->property .' '. self::SOME;
    }
}