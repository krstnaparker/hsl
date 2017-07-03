# HH\Lib\C

 - [C\any](#cany)
 - [C\contains](#ccontains)
 - [C\contains_key](#ccontains_key)
 - [C\count](#ccount)
 - [C\every](#cevery)
 - [C\find](#cfind)
 - [C\find_key](#cfind_key)
 - [C\first](#cfirst)
 - [C\first_key](#cfirst_key)
 - [C\first_keyx](#cfirst_keyx)
 - [C\firstx](#cfirstx)
 - [C\gen_first](#cgen_first)
 - [C\gen_firstx](#cgen_firstx)
 - [C\is_empty](#cis_empty)
 - [C\last](#clast)
 - [C\last_key](#clast_key)
 - [C\last_keyx](#clast_keyx)
 - [C\lastx](#clastx)
 - [C\max](#cmax)
 - [C\max_by](#cmax_by)
 - [C\min](#cmin)
 - [C\min_by](#cmin_by)
 - [C\nfirst](#cnfirst)
 - [C\onlyx](#conlyx)
 - [C\reduce](#creduce)
 - [C\sum](#csum)
 - [C\sum_float](#csum_float)

## C\any()

```Hack
function any<T>(
  Traversable<T> $traversable,
  ??(function(T):bool) $predicate = null,
): bool
```

Returns true if the given predicate returns true for any element of the
given Traversable. If no predicate is provided, it defaults to casting the
element to bool.

If you're looking for C\none, use !C\any.

## C\contains()

```Hack
function contains<T>(Traversable<T> $traversable, T $value): bool
```

Returns true if the given Traversable contains the value. Strict equality is
used.

## C\contains_key()

```Hack
function contains_key<Tk, Tv>(KeyedContainer<Tk,Tv> $container, Tk $key): bool
```

Returns true if the given KeyedContainer contains the key.

## C\count()

```Hack
function count<T>(Container<T> $container): int
```

Returns the number of elements in the given Container.

## C\every()

```Hack
function every<T>(
  Traversable<T> $traversable,
  ??(function(T):bool) $predicate = null,
): bool
```

Returns true if the given predicate returns true for every element of the
given Traversable. If no predicate is provided, it defaults to casting the
element to bool.

## C\find()

```Hack
function find<T>(
  Traversable<T> $traversable,
  (function(T):bool) $value_predicate,
): ??T
```

Returns the first value of the given Traversable for which the predicate
returns true, or null if no such value is found.

## C\find_key()

```Hack
function find_key<Tk, Tv>(
  KeyedTraversable<Tk,Tv> $traversable,
  (function(Tv):bool) $value_predicate,
): ??Tk
```

Returns the key of the first value of the given KeyedTraversable for which
the predicate returns true, or null if no such value is found.

## C\first()

```Hack
function first<T>(Traversable<T> $traversable): ??T
```

Returns the first element of the given Traversable, or null if the
Traversable is empty.

For non-empty Traversables, see C\firstx.
For possibly null Traversables, see C\nfirst.
For single-element Traversables, see C\onlyx.
For Awaitables that yield Traversables, see C\gen_first.

## C\first_key()

```Hack
function first_key<Tk, Tv>(KeyedTraversable<Tk,Tv> $traversable): ??Tk
```

Returns the first key of the given KeyedTraversable, or null if the
KeyedTraversable is empty.

For non-empty Traversables, see C\first_keyx.

## C\first_keyx()

```Hack
function first_keyx<Tk, Tv>(KeyedTraversable<Tk,Tv> $traversable): Tk
```

Returns the first key of the given KeyedTraversable, or throws if the
KeyedTraversable is empty.

For possibly empty Traversables, see C\first_key.

## C\firstx()

```Hack
function firstx<T>(Traversable<T> $traversable): T
```

Returns the first element of the given Traversable, or throws if the
Traversable is empty.

For possibly empty Traversables, see C\first.
For possibly null Traversables, see C\nfirst.
For single-element Traversables, see C\onlyx.
For Awaitables that yield Traversables, see C\gen_firstx.

## C\gen_first()

```Hack
function gen_first<T>(Awaitable<Traversable<T>> $awaitable): Awaitable<?T>
```

Returns the first element of the result of the given Awaitable, or null if
the Traversable is empty.

For non-Awaitable Traversables, see C\first.

## C\gen_firstx()

```Hack
function gen_firstx<T>(Awaitable<Traversable<T>> $awaitable): Awaitable<T>
```

Returns the first element of the result of the given Awaitable, or throws if
the Traversable is empty.

For non-Awaitable Traversables, see C\firstx.

## C\is_empty()

```Hack
function is_empty<T>(Container<T> $container): bool
```

Returns whether the given Container is empty.

## C\last()

```Hack
function last<Tv>(Traversable<Tv> $traversable): ??Tv
```

Returns the last element of the given Traversable, or null if the
Traversable is empty.

For non-empty Traversables, see C\lastx.
For single-element Traversables, see C\onlyx.

## C\last_key()

```Hack
function last_key<Tk, Tv>(KeyedTraversable<Tk,Tv> $traversable): ??Tk
```

Returns the last key of the given KeyedTraversable, or null if the
KeyedTraversable is empty.

For non-empty Traversables, see C\last_keyx.

## C\last_keyx()

```Hack
function last_keyx<Tk, Tv>(KeyedTraversable<Tk,Tv> $traversable): Tk
```

Returns the last key of the given KeyedTraversable, or throws if the
KeyedTraversable is empty.

For possibly empty Traversables, see C\last_key.

## C\lastx()

```Hack
function lastx<Tv>(Traversable<Tv> $traversable): Tv
```

Returns the last element of the given Traversable, or throws if the
Traversable is empty.

For possibly empty Traversables, see C\last.
For single-element Traversables, see C\onlyx.

## C\max()

```Hack
function max<T as num>(Traversable<T> $traversable): ??T
```

Returns the largest element of the given Traversable, or null if the
Traversable is empty.

For non-numeric elements, see C\max_by.

## C\max_by()

```Hack
function max_by<T>(
  Traversable<T> $traversable,
  (function(T):num) $num_func,
): ??T
```

Returns the largest element of the given Traversable, or null if the
Traversable is empty.

The value for comparison is determined by the given function. In the case of
duplicate numeric keys, later values overwrite previous ones.

For numeric elements, see C\max.

## C\min()

```Hack
function min<T as num>(Traversable<T> $traversable): ??T
```

Returns the smallest element of the given Traversable, or null if the
Traversable is empty.

For non-numeric elements, see C\min_by.

## C\min_by()

```Hack
function min_by<T>(
  Traversable<T> $traversable,
  (function(T):num) $num_func,
): ??T
```

Returns the smallest element of the given Traversable, or null if the
Traversable is empty.

The value for comparison is determined by the given function. In the case of
duplicate numeric keys, later values overwrite previous ones.

For numeric elements, see C\min.

## C\nfirst()

```Hack
function nfirst<T>(??Traversable<T> $traversable): ??T
```

Returns the first element of the given Traversable, or null if the
Traversable is null or empty.

For non-null Traversables, see C\first.
For non-empty Traversables, see C\firstx.
For single-element Traversables, see C\onlyx.

## C\onlyx()

```Hack
function onlyx<T>(Traversable<T> $traversable): T
```

Returns the first and only element of the given Traversable, or throws if the
Traversable is empty.

For Traversables with more than one element, see C\firstx.

## C\reduce()

```Hack
function reduce<Tv, Ta>(
  Traversable<Tv> $traversable,
  (function(Ta,Tv):Ta) $accumulator,
  Ta $initial,
): Ta
```

Reduces the given Traversable into a single value by applying an accumulator
function against an intermediate result and each value.

## C\sum()

```Hack
function sum<T>(
  Traversable<T> $traversable,
  ??(function(T):int) $int_func = null,
): int
```

Returns the intger sum of the values of the given Traversable. An optional
function may be provided to convert values to integers, defaulting to casting
to int.

For a float sum, see C\sum_float.

## C\sum_float()

```Hack
function sum_float<T>(
  Traversable<T> $traversable,
  ??(function(T):num) $num_func = null,
): float
```

Returns the float sum of the values of the given Traversable. An optional
function may be provided to convert values to numbers, defaulting to casting
to float.

For an integer sum, see C\sum.
