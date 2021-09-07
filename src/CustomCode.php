<?php
declare(strict_types=1);


namespace Schreibersebastian\P2mediaRector;


use Countable;
use Traversable;

final class CustomCode
{
    const SOME = 'foo';

    /**
     * @var string
     */
    private string $property = '';

    /**
     * @var SomeClass
     */
    private $someClass;

    public function __construct(SomeClass $someClass)
    {

        $this->someClass = $someClass;
    }

    public function sort(array $values)
    {
        usort($values, function ($a, $b) {
            if ($a[0] === $b[0]) {
                return 0;
            }

            return ($a[0] < $b[0]) ? 1 : -1;
        });
    }

    public function getDirectoryTwoLevelUp(string $path): string
    {
        return dirname(dirname($path));
    }

    public function getPosition(int $needle)
    {
        return strpos('725', $needle);
    }

    public function setCookie($value): void
    {
        setcookie('name', $value, 360);
    }

    public function getValueOrDefaultIfNull(int $value = null): int
    {
        return $value === null ? 10 : $value;
    }

    public function isIterable($value): bool
    {
        return is_array($value) || $value instanceof Traversable;
    }

    public function isCountable($value): bool
    {
        return is_array($value) || $value instanceof Countable;
    }

    public function filterNumbersGreaterTen(array $numbers): array
    {
        return array_filter($numbers, function (int $number) {
            return $number > 10;
        });
    }

    public function getProperty(): string
    {
        return $this->property;
    }

    public function getType(string $value): string
    {
        switch ($value) {
            case '1':
                $type = 'select';
                break;
            case '2':
                $type = 'input';
                break;
            default:
                $type = 'text';
                break;
        }

        return $type;
    }

    /**
     * @param array|int $number
     *
     * @return array|int
     */
    public function go($number)
    {
        return $number;
    }

    public function stringContains(): bool
    {
        return strpos('abc', 'a') !== false;
    }

    public function __toString(): string
    {
        return $this->property;
    }
}