# Available Chainable Methods:

## StringableTrait.php

### Available Methods

| **A-P**                       | **P-T**                         | **T-Z**                              |
|-------------------------------|---------------------------------|--------------------------------------|
| [after()](#after)             | [padEnd()](#a)                  | [toMemeCase()](#a)                   |
| [append()](#append)           | [padStart()](#a)                | [toPascalCase()](#a)                 |
| [before()](#before)           | [prepend()](#a)                 | [toSlug()](#a)                       |
| [beforeLast()](#beforeLast)   | [repeat()](#a)                  | [toSnakeCase()](#a)                  |
| [between()](#between)         | [replace()](#a)                 | [toSnakeCaseUC()](#a)                |
| [betweenLast()](#betweenLast) | [reverse()](#a)                 | [toTitleCase()](#a)                  |
| [compress()](#a)              | [stripAlpha()](#a)              | [toUpperCase()](#a)                  |
| [compressBetween()](#a)       | [stripAlphaNumeric()](#a)       | [trim()](#a)                         |
| [compressEnd()](#a)           | [stripNonNumeric()](#a)         | [trimEnd()](#a)                      |
| [compressStart()](#a)         | [stripNumeric()](#a)            | [trimFirstAndLastChar()](#a)         |
| [decodeHTML()](#a)            | [stripSpecial()](#a)            | [trimFirstAndLastWords()](#a)        |
| [decodeJson()](#a)            | [stripSubstring()](#a)          | [trimFirstChar()](#a)                |
| [encodeHTML()](#a)            | [stripSubstringFromEnd()](#a)   | [trimFirstWord()](#a)                |
| [encodeJson()](#a)            | [stripSubstringFromStart()](#a) | [trimLastChar()](#a)                 |
| [lcFirst()](#a)               | [stripSubstrings()](#a)         | [trimLastWord()](#a)                 |
| [lcLast()](#a)                | [stripWhitespace()](#a)         | [trimStart()](#a)                    |
| [lcNth()](#a)                 | [swap()](#a)                    | [trimSubstringFromEnd()](#a)         |
| [limit()](#a)                 | [toCamelCase()](#a)             | [trimSubstringFromStart()](#a)       |
| [mask()](#a)                  | [toE161()](#a)                  | [trimSubstringFromStartAndEnd()](#a) |
| [maskAfter()](#a)             | [toKebabCase()](#a)             | [ucFirst()](#a)                      |
| [maskBefore()](#a)            | [toKebabCaseUC()](#a)           | [ucLast()](#a)                       |
| [padBothEnds()](#a)           | [toLowerCase()](#a)             | [ucNth()](#a)                        |

****

#### <a name="after">after(string $substring)</a>

Returns the substring after the first occurrence of the provided substring.

```php
$twine = Twine::make('abcdefg');
$twine->after('cd');
// "efg"
```

#### <a name="append">append(string $string)</a>

Appends the provided string to the end of the current string.

```php
$twine = Twine::make('Good morning');
$twine->append(', America!');
// "Good morning, America!"
```

#### <a name="before">before(string $substring)</a>

Returns the substring before the first occurrence of the provided substring.

```php
$twine = Twine::make('abcdefg');
$twine->before('cd');
// "ab"
```

#### <a name="beforeLast">beforeLast(string $substring)</a>

Returns the substring before the *last* occurrence of the provided substring.

```php
$twine = Twine::make('aa bb cc dd cc bb aa');
$twine->beforeLast('cc');
// "aa bb cc dd "

$twine = Twine::make('the quick brown fox jumps over the lazy dog');
$twine->beforeLast('the');
// "the quick brown fox jumps over "
```

#### <a name="between">between(string $start, string $end)</a>

Returns the substring between the first occurrence of the provided start string and the first occurrence of the provided end string.

```php
$twine = Twine::make('abcdefg');
$twine->between('b', 'f');
// "cde"
```




