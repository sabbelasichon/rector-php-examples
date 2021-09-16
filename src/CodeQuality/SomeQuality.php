<?php
declare(strict_types=1);


namespace Nca\Rector\CodeQuality;


class SomeQuality
{
    /**
     * @return bool
     */
    public function inArray(array $items)
    {
        foreach ($items as $item) {
            if ($item === 'something') {
                return true;
            }
        }

        return false;
    }
}