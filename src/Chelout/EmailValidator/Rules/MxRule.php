<?php


namespace Chelout\EmailValidator\Rules;


class MxRule implements RuleContract
{
    public function isValid(string $email): bool
    {
        $domain = $this->parseDomain($email);

        return getmxrr(idn_to_ascii($domain), $mxRecords);
    }

    public function getError(): string
    {
        return 'MX failed.';
    }

    private function parseDomain(string $email): string
    {
        $lastAtPos = strrpos($email, '@');

        if (false !== $lastAtPos) {
            return substr($email, $lastAtPos + 1);
        }

        return $email;
    }

}