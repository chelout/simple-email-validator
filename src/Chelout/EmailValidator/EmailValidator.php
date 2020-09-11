<?php

namespace Chelout\EmailValidator;

use Chelout\EmailValidator\Exceptions\MustImplementRuleContract;
use Chelout\EmailValidator\Exceptions\RulesArrayIsEmpty;
use Chelout\EmailValidator\Rules\RuleContract;

class EmailValidator
{
    protected array $rules;

    protected array $errors = [];

    /**
     * EmailValidator constructor.
     *
     * @param  array  $rules
     *
     * @throws \Chelout\EmailValidator\Exceptions\MustImplementRuleContract
     * @throws \Chelout\EmailValidator\Exceptions\RulesArrayIsEmpty
     */
    public function __construct(array $rules)
    {
        if (empty($rules)) {
            throw new RulesArrayIsEmpty();
        }

        foreach ($rules as $rule) {
            if (! $rule instanceof RuleContract) {
                throw new MustImplementRuleContract();
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
