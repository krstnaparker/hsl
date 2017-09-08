# HH\Lib\Str

 - [Str\capitalize](#strcapitalize)
 - [Str\capitalize_words](#strcapitalize_words)
 - [Str\chunk](#strchunk)
 - [Str\compare](#strcompare)
 - [Str\compare_ci](#strcompare_ci)
 - [Str\contains](#strcontains)
 - [Str\contains_ci](#strcontains_ci)
 - [Str\ends_with](#strends_with)
 - [Str\ends_with_ci](#strends_with_ci)
 - [Str\format_number](#strformat_number)
 - [Str\is_empty](#stris_empty)
 - [Str\join](#strjoin)
 - [Str\length](#strlength)
 - [Str\lowercase](#strlowercase)
 - [Str\pad_left](#strpad_left)
 - [Str\pad_right](#strpad_right)
 - [Str\repeat](#strrepeat)
 - [Str\replace](#strreplace)
 - [Str\replace_ci](#strreplace_ci)
 - [Str\replace_every](#strreplace_every)
 - [Str\search](#strsearch)
 - [Str\search_ci](#strsearch_ci)
 - [Str\search_last](#strsearch_last)
 - [Str\slice](#strslice)
 - [Str\splice](#strsplice)
 - [Str\split](#strsplit)
 - [Str\starts_with](#strstarts_with)
 - [Str\starts_with_ci](#strstarts_with_ci)
 - [Str\strip_prefix](#strstrip_prefix)
 - [Str\strip_suffix](#strstrip_suffix)
 - [Str\to_int](#strto_int)
 - [Str\trim](#strtrim)
 - [Str\trim_left](#strtrim_left)
 - [Str\trim_right](#strtrim_right)
 - [Str\uppercase](#struppercase)

## Str\capitalize()

```Hack
function capitalize(string $string): string
```

Returns the string with the first character capitalized.

If the first character is already capitalized or isn't alphabetic, the string
will be unchanged.

To capitalize all characters, see Str\uppercase.
To capitalize all words, see Str\capitalize_words.

## Str\capitalize_words()

```Hack
function capitalize_words(
  string $string,
  string $delimiters = " \t\r\n\f\v",
): string
```

Returns the string with all words capitalized.

Words are delimited by space, tab, newline, carriage return, form-feed, and
vertical tab by default, but you can specify custom delimiters.

To capitalize all characters, see Str\uppercase.
To capitalize only the first character, see Str\capitalize.

## Str\chunk()

```Hack
function chunk(string $string, int $chunk_size = 1): vec<string>
```

Returns a vec containing the string split into chunks of the given size.

## Str\compare()

```Hack
function compare(string $string1, string $string2): int
```

Returns < 0 if `$string1` is less than `$string2`, > 0 if `$string1` is
greater than `$string2`, and 0 if they are equal.

For a case-insensitive comparison, see Str\compare_ci.

## Str\compare_ci()

```Hack
function compare_ci(string $string1, string $string2): int
```

Returns < 0 if `$string1` is less than `$string2`, > 0 if `$string1` is
greater than `$string2`, and 0 if they are equal (case-insensitive).

For a case-sensitive comparison, see Str\compare.

## Str\contains()

```Hack
function contains(string $haystack, string $needle, int $offset = 0): bool
```

Returns whether the "haystack" string contains the "needle" string.

An optional offset determines where in the haystack the search begins. If the
offset is negative, the search will begin that many characters from the end
of the string. If the offset is out-of-bounds, a ViolationException will be
thrown.

To get the position of the needle, see Str\search.
To search for the needle case-insensitively, see Str\contains_ci.

## Str\contains_ci()

```Hack
function contains_ci(string $haystack, string $needle, int $offset = 0): bool
```

Returns whether the "haystack" string contains the "needle" string
(case-insensitive).

An optional offset determines where in the haystack the search begins. If the
offset is negative, the search will begin that many characters from the end
of the string. If the offset is out-of-bounds, a ViolationException will be
thrown.

To search for the needle case-sensitively, see Str\contains.
To get the position of the needle case-insensitively, see Str\search_ci.

## Str\ends_with()

```Hack
function ends_with(string $string, string $suffix): bool
```

Returns whether the string ends with the given suffix.

For a case-insensitive check, see Str\ends_with_ci.

## Str\ends_with_ci()

```Hack
function ends_with_ci(string $string, string $suffix): bool
```

Returns whether the string ends with the given suffix (case-insensitive).

For a case-sensitive check, see Str\ends_with.

## Str\format_number()

```Hack
function format_number(
  num $number,
  int $decimals = 0,
  string $decimal_point = '.',
  string $thousands_separator = ',',
): string
```

Returns a string representation of the given number with grouped thousands.

If `$decimals` is provided, the string will contain that many decimal places.
The optional `$decimal_point` and `$thousands_separator` arguments define the
strings used for decimals and commas, respectively.

## Str\is_empty()

```Hack
function is_empty(?string $string): bool
```

Returns whether the input is null or the empty string.

## Str\join()

```Hack
function join(string $glue, Traversable<arraykey> $pieces): string
```

Returns a string formed by joining the elements of the Traversable with the
given `$glue` string.

Previously known as `implode` in PHP.

## Str\length()

```Hack
function length(string $string): int
```

Returns the length of the given string, i.e. the number of bytes.

## Str\lowercase()

```Hack
function lowercase(string $string): string
```

Returns the string with all alphabetic characters converted to lowercase.

## Str\pad_left()

```Hack
function pad_left(
  string $string,
  int $total_length,
  string $pad_string = ' ',
): string
```

Returns the string padded to the total length by appending the `$pad_string`
to the left.

If the length of the input string plus the pad string exceeds the total
length, the pad string will be truncated. If the total length is less than or
equal to the length of the input string, no padding will occur.

To pad the string on the right, see Str\pad_right.

## Str\pad_right()

```Hack
function pad_right(
  string $string,
  int $total_length,
  string $pad_string = ' ',
): string
```

Returns the string padded to the total length by appending the `$pad_string`
to the right.

If the length of the input string plus the pad string exceeds the total
length, the pad string will be truncated. If the total length is less than or
equal to the length of the input string, no padding will occur.

To pad the string on the left, see Str\pad_left.

## Str\repeat()

```Hack
function repeat(string $string, int $multiplier): string
```

Returns the input string repeated `$multiplier` times.

If the multiplier is 0, the empty string will be returned.

## Str\replace()

```Hack
function replace(string $haystack, string $needle, string $replacement): string
```

Returns the "haystack" string with all occurences of `$needle` replaced by
`$replacement`.

For a case-insensitive search/replace, see Str\replace_ci.
For multiple searches/replacements, see Str\replace_every.

## Str\replace_ci()

```Hack
function replace_ci(
  string $haystack,
  string $needle,
  string $replacement,
): string
```

Returns the "haystack" string with all occurences of `$needle` replaced by
`$replacement` (case-insensitive).

For a case-sensitive search/replace, see Str\replace.
For multiple searches/replacements, see Str\replace_every.

## Str\replace_every()

```Hack
function replace_every(
  string $haystack,
  KeyedContainer<string,string> $replacements,
): string
```

Returns the "haystack" string with all occurences of the keys of
`$replacements` replaced by the corresponding values.

For a single search/replace, see Str\replace.

## Str\search()

```Hack
function search(string $haystack, string $needle, int $offset = 0): ?int
```

Returns the first position of the "needle" string in the "haystack" string,
or null if it isn't found.

An optional offset determines where in the haystack the search begins. If the
offset is negative, the search will begin that many characters from the end
of the string. If the offset is out-of-bounds, a ViolationException will be
thrown.

To simply check if the haystack contains the needle, see Str\contains.
To get the case-insensitive position, see Str\search_ci.
To get the last position of the needle, see Str\search_last.

Previously known in PHP as `strpos`.

## Str\search_ci()

```Hack
function search_ci(string $haystack, string $needle, int $offset = 0): ?int
```

Returns the first position of the "needle" string in the "haystack" string,
or null if it isn't found (case-insensitive).

An optional offset determines where in the haystack the search begins. If the
offset is negative, the search will begin that many characters from the end
of the string. If the offset is out-of-bounds, a ViolationException will be
thrown.

To simply check if the haystack contains the needle, see Str\contains.
To get the case-sensitive position, see Str\search.
To get the last position of the needle, see Str\search_last.

Previously known in PHP as `stripos`.

## Str\search_last()

```Hack
function search_last(string $haystack, string $needle, int $offset = 0): ?int
```

Returns the last position of the "needle" string in the "haystack" string,
or null if it isn't found.

An optional offset determines where in the haystack (from the beginning) the
search begins. If the offset is negative, the search will begin that many
characters from the end of the string and go backwards. If the offset is
out-of-bounds, a ViolationException will be thrown.

To simply check if the haystack contains the needle, see Str\contains.
To get the first position of the needle, see Str\search.

Previously known in PHP as `strrpos`.

## Str\slice()

```Hack
function slice(string $string, int $offset, ?int $length = null): string
```

Returns a substring of length `$length` of the given string starting at the
`$offset`.

If no length is given, the slice will contain the rest of the
string. If the length is zero, the empty string will be returned. If the
offset is out-of-bounds, a ViolationException will be thrown.

Previously known as `substr` in PHP.

## Str\splice()

```Hack
function splice(
  string $string,
  string $replacement,
  int $offset,
  ?int $length = null,
): string
```

Return the string with a slice specified by the offset/length replaced by the
given replacement string.

If the length is omitted or exceeds the upper bound of the string, the
remainder of the string will be replaced. If the length is zero, the
replacement will be inserted at the offset.

Previously known in PHP as `substr_replace`.

## Str\split()

```Hack
function split(
  string $delimiter,
  string $string,
  ?int $limit = null,
): vec<string>
```

Returns a vec containing the string split on the given delimiter. The vec
will not contain the delimiter itself.

If the limit is provided, the vec will only contain that many elements, where
the last element is the remainder of the string.

Previously known as `explode` in PHP.

## Str\starts_with()

```Hack
function starts_with(string $string, string $prefix): bool
```

Returns whether the string starts with the given prefix.

For a case-insensitive check, see Str\starts_with_ci.

## Str\starts_with_ci()

```Hack
function starts_with_ci(string $string, string $prefix): bool
```

Returns whether the string starts with the given prefix (case-insensitive).

For a case-sensitive check, see Str\starts_with.

## Str\strip_prefix()

```Hack
function strip_prefix(string $string, string $prefix): string
```

Returns the string with the given prefix removed, or the string itself if
it doesn't start with the prefix.

## Str\strip_suffix()

```Hack
function strip_suffix(string $string, string $suffix): string
```

Returns the string with the given suffix removed, or the string itself if
it doesn't end with the suffix.

## Str\to_int()

```Hack
function to_int(string $string): ?int
```

Returns the given string as an integer, or null if the string isn't numeric.

## Str\trim()

```Hack
function trim(string $string, ?string $char_mask = null): string
```

Returns the given string with whitespace stripped from the beginning and end.

If the optional character mask isn't provided, the following characters will
be stripped: space, tab, newline, carriage return, NUL byte, vertical tab.

To only strip from the left, see Str\trim_left.
To only strip from the right, see Str\trim_right.

## Str\trim_left()

```Hack
function trim_left(string $string, ?string $char_mask = null): string
```

Returns the given string with whitespace stripped from the left.
See Str\trim for more details.

To strip from both ends, see Str\trim.
To only strip from the right, see Str\trim_right.

## Str\trim_right()

```Hack
function trim_right(string $string, ?string $char_mask = null): string
```

Returns the given string with whitespace stripped from the right.
See Str\trim for more details.

To strip from both ends, see Str\trim.
To only strip from the left, see Str\trim_left.

## Str\uppercase()

```Hack
function uppercase(string $string): string
```

Returns the string with all alphabetic characters converted to uppercase.
