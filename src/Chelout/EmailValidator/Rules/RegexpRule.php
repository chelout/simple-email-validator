<?php

namespace Chelout\EmailValidator\Rules;

class RegexpRule implements RuleContract
{
    private static string $pattern = '/([\p{L}\-_0-9]+@[\p{L}\-_0-9]+\.[\p{L}]{2,6})/u';

    public function isValid(string $email): bool
    {
        if (preg_match(static::$pattern, $email, $matches) === false) {
            throw new \Exception('Error occurred.');
        }

        return $email === $matches[0];
    }

    public function getError(): string
    {
        return 'Regexp rule failed.';
    }
}
