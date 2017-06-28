# HH\Lib\Math

 - [Math\abs](#mathabs)
 - [Math\base_convert](#mathbase_convert)
 - [Math\ceil](#mathceil)
 - [Math\cos](#mathcos)
 - [Math\exp](#mathexp)
 - [Math\floor](#mathfloor)
 - [Math\from_base](#mathfrom_base)
 - [Math\int_div](#mathint_div)
 - [Math\log](#mathlog)
 - [Math\max](#mathmax)
 - [Math\mean](#mathmean)
 - [Math\median](#mathmedian)
 - [Math\min](#mathmin)
 - [Math\round](#mathround)
 - [Math\sin](#mathsin)
 - [Math\sqrt](#mathsqrt)
 - [Math\tan](#mathtan)
 - [Math\to_base](#mathto_base)

## Math\abs()

```Hack
function abs<T as num>(T $number): T
```


## Math\base_convert()

```Hack
function base_convert(string $value, int $from_base, int $to_base): string
```

Converts the given string in base `$from_base` to base `$to_base`, assuming
letters a-z are used for digits for bases greater than 10. The conversion is
done to arbitrary precision.

To convert a string in some base to an int, see `Math\from_base`.
To convert an int to a string in some base, see `Math\to_base`.

## Math\ceil()

```Hack
function ceil(num $value): float
```


## Math\cos()

```Hack
function cos(num $arg): float
```


## Math\exp()

```Hack
function exp(num $arg): float
```


## Math\floor()

```Hack
function floor(num $value): float
```


## Math\from_base()

```Hack
function from_base(string $number, int $from_base): int
```


## Math\int_div()

```Hack
function int_div(int $numerator, int $denominator): int
```


## Math\log()

```Hack
function log(num $arg, num $base = \M_E): float
```


## Math\max()

```Hack
function max<T as num>(T $first_number, T ...$numbers): T
```

Returns the largest of all input numbers.

For finding the smallest number, see Math\min.
For Traversables, see C\max.

## Math\mean()

```Hack
function mean(num $first_number, num ...$numbers): float
```


## Math\median()

```Hack
function median(num $first_number, num ...$numbers): float
```

Returns the median of the given numbers.

To find the mean, see `Math\mean`.
To find the standard deviation, see `Math\fb\std_dev`.

## Math\min()

```Hack
function min<T as num>(T $first_number, T ...$numbers): T
```

Returns the smallest of all input numbers.

For finding the largest number, see Math\max.
For Traversables, see C\min.

## Math\round()

```Hack
function round(num $val, int $precision = 0): float
```


## Math\sin()

```Hack
function sin(num $arg): float
```


## Math\sqrt()

```Hack
function sqrt(num $arg): float
```


## Math\tan()

```Hack
function tan(num $arg): float
```


## Math\to_base()

```Hack
function to_base(int $number, int $to_base): string
```

