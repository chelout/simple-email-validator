# Simple Email Validator

## Installation

You can install the package via composer:

```bash
composer require chelout/simple-email-validator
```

## Usage

```php
$validation = new EmailValidator([
    new RegexpRule(),
    new MxRule(),
]);
$validation->validate('user@example.com'); // boolean result
var_dump($validation->getErrors());
```

## Custom rules

To create custom rule, you should implement `Chelout\EmailValidator\Rules\RuleContract`:

```php
class FilterVarRule implements RuleContract
{
    public function isValid(string $email): bool
    {
        return ! (filter_var($email, FILTER_VALIDATE_EMAIL) === false);
    }

    public function getError(): string
    {
        return 'Filter Var Rule failed.';
    }
}
```