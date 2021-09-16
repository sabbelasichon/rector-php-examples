<?php
declare(strict_types=1);


namespace Nca\Rector\Php;


use Nca\Rector\Dummy\Dummy;
use Traversable;

final class SomePhpCode
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
    }

    public function getDirectoryTwoLevelUp(string $path): string
    {
        return dirname(dirname($path));
    }

    public function getValueOrDefaultIfNull(int $value = null): int
    {
        return $value === null ? 10 : $value;
    }

    public function isIterable($value): bool
    {
        return is_array($value) || $value instanceof Traversable;
    }

    public function filterNumbersGreaterTen(array $numbers): array
    {
        return array_filter($numbers, function (int $number) {
            return $number > 10;
        });
    }

    public function mySort(array $values)
    {
        usort($values, function ($a, $b) {
            if ($a[0] === $b[0]) {
                return 0;
            }

            return ($a[0] < $b[0]) ? 1 : -1;
        });
    }

    public static function stringContainsCharacterA(string $haystack): bool
    {
        return strpos($haystack, 'a') !== false;
    }

    public function __toString(): string
    {
        return $this->property .' '. self::SOME;
    }
}