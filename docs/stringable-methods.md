# Available Chainable Methods:

## StringableTrait.php

### Methods
TODO: 

* append() - add string to end of string
* compress() - remove excess whitespace, leave only one space
* compressBetween() - remove excess whitespace between words
* compressEnd() - remove excess whitespace at end of string
* compressStart() - remove excess whitespace at start of string
* decodeHTML() - convert HTML entities to characters
* decodeJson() - convert JSON string to array
* encodeHTML() - convert characters to HTML entities
* encodeJson() - convert array to JSON string
* lcFirst() - convert first character to lowercase
* lcLast() - convert last character to lowercase
* padBothEnds() - pad both ends of string with substring N times
* padEnd() - pad end of string with substring N times
* padStart() - pad start of string with substring N times
* prepend() - add string to start of string
* repeat() - repeat string N times with separator (default is no separator)
* replace() - replace all occurrences of substring with replacement
* reverse() - reverse string
* stripSubstrings() - strip the string of all substrings in array
* stripSubstring() - strip the string all occurrences of substring
* stripEnd() - strip the last "word" of the string of all occurrences of substring
* stripNonNumeric() - strip the string of all non-numeric characters
* stripNumeric() - strip the string of all numeric characters
* stripStart() - strip the first "word" of the string of all occurrences of substring
* stripAlpha() - strip the string of all alphabetic characters
* stripAlphaNumeric() - strip the string of all alphabetic and numeric characters
* stripSpecial() - strip the string of all special characters (non alpha-numeric)
* stripWhitespace() - strip the string of all whitespace characters
* toCamelCase() - convert string to camelCase
* toPascalCase() - convert string to PascalCase
* toSnakeCase() - convert string to snake_case
* toKebabCase() - convert string to kebab-case
* toTitleCase() - convert string to Title Case
* toLowerCase() - convert string to lowercase
* toUpperCase() - convert string to UPPERCASE
* toSnakeCaseUC() - convert string to SNAKE_CASE
* toKebabCaseUC() - convert string to KEBAB-CASE
* toMemeCase() - convert string to mEmE cAsE
* toE161() - convert string to e161: Hello = 4433555555666
* trim() - remove whitespace from beginning and end of string
* trimEnd() - remove whitespace from end of string
* trimStart() - remove whitespace from beginning of string
* trimFirstWord() - remove first word from string
* trimLastWord() - remove last word from string
* trimBothEndWords() - remove first and last word from string
* trimFirstChar() - remove first character from string
* trimLastChar() - remove last character from string
* trimBothEndChars() - remove first and last character from string
* trimSubstringFromStart() - remove the substring from the first occurrence of the string
* trimSubstringFromEnd() - remove the substring from the last occurrence of the string
* trimSubstringFromBothEnds() - remove the substring from the first and last occurrence of the string
* ucFirst() - convert first character to uppercase
* ucLast() - convert last character to uppercase
* ucNth() - convert Nth character to uppercase
* lcNth() - convert Nth character to lowercase
* toSlug() - convert the string to a URL friendly slug. Most often uses the '-' as a separator
* swap() - swap a substring for a substring in a string using strstr. Accepts an array of substrings to swap and their values
* before() - return the substring before the first occurrence of the string
* after() - return the substring after the first occurrence of the string
* between() - return the substring between the first occurrence of the first string and the first occurrence of the second string
* betweenLast() - return the substring between the last occurrence of the first string and the last occurrence of the second string
* beforeLast() - return the substring before the last occurrence of the string
* mask() - mask the string with a character or substring. Accepts an optional start and end position to mask
* limit() - limit the string to a certain number of characters. Accepts an optional ending character or substring

## Twine.php

The methods in the Twine class itself (not inherited from Traits or Interfaces) are not chainable. They return a specific value, like a string or an array.

### Methods
TODO:

* __construct() - create a new Twine object
* toString() - return the string
* toArray() - return the string as an array of characters
* toArray(onWords: true) - returns the string as an array of words
* contains() - return true if the string contains the substring
* containsAll() - return true if the string contains all substrings in the array
* containsAny() - return true if the string contains any substrings in the array
* containsNone() - return true if the string contains none of the substrings in the array
* count() - return the number of occurrences of the substring in the string
* countAll() - return the number of occurrences of all substrings in the array
* countAny() - return the number of occurrences of any substrings in the array
* length() - return the length of the string
* wordCount() - return the number of words in the string
* splitOnWords() - return the string as an array of words
* splitOnSubstr() - alias to splitOnSubstring()
* splitOnChar() - alias to splitOnSubstr()
* splitOnSubstring() - return the string as an array of substrings split on the given character
* splitOnUC() - return the string as an array of substrings split on uppercase characters
* splitOnUpperCase() - alias of splitOnUC()
* splitOnLC() - return the string as an array of substrings split on lowercase characters
* splitOnLowerCase() - alias of splitOnLC()
* splitOnNumeric() - return the string as an array of substrings split on numeric characters
* splitOnAlpha() - return the string as an array of substrings split on alphabetic characters
* splitOnSpecial() - return the string as an array of substrings split on any non alpha-numeric (special) characters
* split() - alias of splitOnSubstring(), default is split on empty character
* splitOn() - alias of splitOnSubstring()
* splitOnEmpty() - return the string as an array of substrings split on empty characters
* countSubstring() - return count of occurrences of substring in string
* countSubstrings() - return count of occurrences of all substrings in array in string
* countChar() - alias of countSubstring()
* countChars() - alias of countSubstrings()
* countUC() - return count of uppercase characters in string
* countUpperCase() - alias of countUC()
* countLC() - return count of lowercase characters in string
* countLowerCase() - alias of countLC()
* countNumeric() - return count of numeric characters in string
* countAlpha() - return count of alphabetic characters in string
* countSpecial() - return count of special characters in string
* countWhitespace() - return count of whitespace characters in string
* mostFrequentChar() - return the most frequent character in the string
* mostFrequentChars() - return the n most frequent characters in the string. If n > length, return array of all chars + counts
* mostFrequentWord() - return the most frequent word in the string
* mostFrequentWords() - return the n most frequent words in the string. If n > wordCount, return array of all words + counts

### Static Methods
TODO:

* random() - return a random string of length N
* randomAlpha() - return a random string of length N containing only alphabetic characters
* randomNumeric() - return a random string of length N containing only numeric characters
* randomAlphaNumeric() - return a random string of length N containing only alphabetic and numeric characters
* randomSpecial() - return a random string of length N containing only special characters
* randomHex() - return a random string of length N containing only hexadecimal characters
* randomBinary() - return a random string of length N containing only binary characters
* randomOctal() - return a random string of length N containing only octal characters
* uuid() - return a random UUID
* All available methods from the StringableTrait and Twine.php are also available as static methods, which creates a new Twine object from the string or array passed as the first argument, and then returns the result of the method as a string.


#### <a name="append">append()</a>

Appends a substring to the end (right side) of the string. Returns the Twine object.

```php
$string = Twine::of('Hello world');
$string->append('!')->append('!')->append('!');
// $string === 'Hello world!!!'
```

#### <a name="compress">compress()</a>

Compresses the string by removing consecutive whitespace characters, leaving only one whitespace character remaining in
each replace instance. Returns the Twine object.

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


