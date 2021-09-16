<?php
declare(strict_types=1);


namespace Nca\Rector\Dummy;


use Nca\Rector\Php\SomePhpCode;

final class Dummy
{
    public function dummyMethod(): void
    {
        $haystack = 'abc';
        if(SomePhpCode::stringContainsCharacterA($haystack)) {
            $message = sprintf('Yes, "%s" contains the character A', $haystack);

            echo $message;
        }
    }
}