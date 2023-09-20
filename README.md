# Twine.php

[![Latest Version on Packagist](https://img.shields.io/packagist/v/gtmassey/twine.svg?style=flat-square)](https://packagist.org/packages/gtmassey/twine)
[![Tests](https://img.shields.io/github/actions/workflow/status/gtmassey/twine/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/gtmassey/twine/actions/workflows/run-tests.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/gtmassey/twine.svg?style=flat-square)](https://packagist.org/packages/gtmassey/twine)

A framework-agnostic, OOP-centered approach for easily manipulating strings in PHP. 

Never slog through the php string function docs again!

PHP comes with a lot of built-in functions for manipulating strings, but they are not very intuitive to use, and the naming conventions are... bad.

Inspired by the [Laravel String](https://laravel.com/docs/10.x/strings) helper class, Twine.php is a framework-agnostic, OOP-centered approach for easily manipulating strings in PHP. No more calling random functions with random arguments and hoping for the best. Instead, convert your strings to a Twine object and manipulate them by chaining functions in an elegant and fluent way.

## Installation

You can install the package via composer:

```bash
composer require gtmassey/twine
```

## Usage

### Getting started

You can use the `new` keyword to create a new Twine object, the constructor accepts a string or null as an argument. If null, the default is an empty string `""`. 

```php
$string = new Twine('Hello world!');
echo($string->toString());
// "Hello world!"

$emptyString = new Twine();
echo($emptyString->toString());
// ""
```

You can also use the static `make()`, `of()`, and `from()` methods to create a new Twine object from either a string or an array. 

If you use an array as the argument for the static construction methods, the array will be imploded with a space as the separator.

```php
$string = Twine::make('Hello world!');
echo($string->toString());
// "Hello world!"

$string = Twine::make(['Hello', 'world!']);
echo($string->toString());
// "Hello world!"

$string = Twine::of(['a', 'b', 'c']);
echo($string->toString());
// "a b c"

$string = Twine::from(['a', 'b', 'c']);
echo($string->toString());
// "a b c"
```

### Manipulating strings

Twine comes with several methods for manipulating strings. Methods that live in the `StringableTrait` trait are chainable. Methods that live in the Twine.php class are not chainable, but instead return a specific value, like a string or an array.

[Available Stringable Methods](docs/stringable-methods.md)

Example of chaining methods to manipulate a string:
```php
$string = Twine::from('Foo bar');
//"Foo bar"
$string->toPascalCase();
//"FooBar"
$string->append(' baz');
//"FooBar baz"
$string->toTitleCase()->stripChar('a')->lcFirst()
//"fooBr Bz
$string->stripWhitespace()->stripChar('o');
//fBrBz
```

```php
//example: manipulating phone number string:
$phoneNumber = Twine::from('+1 (123) 456-7890 x123');
$phone = $phoneNumber->splitOn('x')[0];
//"+1 (123) 456-7890"
$extension = $phoneNumber->splitOn('x')[1];
//"123"
$phone->stripNonNumeric()->stripWhitespace()->toString();
//"11234567890"
$phone->getIntegerValue();
//11234567890
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](https://github.com/spatie/.github/blob/main/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Garrett Massey](https://github.com/gtmassey)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
