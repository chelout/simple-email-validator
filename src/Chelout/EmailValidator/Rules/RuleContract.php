<?php

namespace Chelout\EmailValidator\Rules;

interface RuleContract
{
    public function isValid(string $email): bool;

    public function getError(): string;
}
