# Available Chainable Methods:

## StringableTrait.php

### Methods

| A - G	                                  | H - Q 	       | R - Z 	       |
|-----------------------------------------|---------------|---------------|
| [append()](#append) 	                   | Method Name 	 | Method Name 	 |
| [compress()](#compress)                 | Method Name 	 | Method Name 	 |
| [compressBetween()](#compressBetween) 	 | Method Name 	 | Method Name 	 |
| [compressEnd()](#compressEnd) 	         | Method Name 	 | Method Name 	 |
| [compressStart()](#compressStart) 	     | Method Name 	 | Method Name 	 |

#### <a name="append">append()</a>

Appends a substring to the end (right side) of the string. Returns the Twine object.

```php
$string = Twine::of('Hello world');
$string->append('!')->append('!')->append('!');
// $string === 'Hello world!!!'
```

#### <a name="compress">compress()</a>

Compresses the string by removing consecutive whitespace characters, leaving only one whitespace character remaining in each replace instance. Returns the Twine object.

```php
$string = Twine::of('    Hello   world    ');
$string->compress();
// $string === ' Hello world '
```

#### <a name="compressBetween">compressBetween()</a>

Compresses the whitespace between words, but not at the beginning or the end of the string. Returns the Twine object.

```php
$string = Twine::of('    Hello    world    ');
$string->compressBetween();
// $string === '    Hello world    '
```

#### <a name="compressEnd">compressEnd()</a>

Compresses the whitespace at the end of the string. Returns the Twine object.

```php
$string = Twine::of('Hello world    ');
$string->compressEnd();
// $string === 'Hello world '
```

#### <a name="compressStart">compressStart()</a>

Compresses the whitespace at the beginning of the string. Returns the Twine object.

```php
$string = Twine::of('    Hello world');
$string->compressStart();
// $string === ' Hello world'
```


