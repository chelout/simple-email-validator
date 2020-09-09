<?php

namespace Chelout\EmailValidator;

use Chelout\EmailValidator\Rules\RuleContract;

class EmailValidator
{
    protected array $rules;

    protected array $errors = [];

    public function __construct(array $rules)
    {
        if (empty($rules)) {
            throw new \Exception('Rules array is empty.');
        }

        foreach ($rules as $rule) {
            if (! $rule instanceof RuleContract) {
                throw new \Exception('Every rule must implement `RuleContract` interface.');
            }
        }

        $this->rules = $rules;
    }

    public function validate(string $email): bool
    {
        foreach ($this->rules as $rule) {
            if (! $rule->isValid($email)) {
                $this->errors[] = $rule->getError();
            }
        }

        return empty($this->errors);
    }

    public function getErrors(): array
    {
        return $this->errors;
    }
}