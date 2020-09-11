<?php


namespace Chelout\EmailValidator\Exceptions;


class MustImplementRuleContract extends \Exception
{
    protected $message = 'Every rule must implement `RuleContract` interface';
}
