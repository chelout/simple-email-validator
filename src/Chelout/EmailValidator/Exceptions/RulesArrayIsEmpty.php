<?php

namespace Chelout\EmailValidator\Exceptions;

use Exception;

class RulesArrayIsEmpty extends Exception
{
    protected $message = 'Rules array is empty';
}
