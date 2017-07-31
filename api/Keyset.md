# HH\Lib\Keyset

 - [Keyset\chunk](#keysetchunk)
 - [Keyset\diff](#keysetdiff)
 - [Keyset\drop](#keysetdrop)
 - [Keyset\equal](#keysetequal)
 - [Keyset\filter](#keysetfilter)
 - [Keyset\filter_nulls](#keysetfilter_nulls)
 - [Keyset\flatten](#keysetflatten)
 - [Keyset\intersect](#keysetintersect)
 - [Keyset\keys](#keysetkeys)
 - [Keyset\keys_with_truthy_values](#keysetkeys_with_truthy_values)
 - [Keyset\map](#keysetmap)
 - [Keyset\map_with_key](#keysetmap_with_key)
 - [Keyset\partition](#keysetpartition)
 - [Keyset\slice](#keysetslice)
 - [Keyset\sort](#keysetsort)
 - [Keyset\take](#keysettake)
 - [Keyset\union](#keysetunion)

## Keyset\chunk()

```Hack
function chunk<Tv as arraykey>(
  Traversable<Tv> $traversable,
  int $size,
): vec<keyset<Tv>>
```

Returns a vec containing the given Traversable split into chunks of the
given size.

If the given Traversable doesn't divide evenly, the final chunk will be
smaller than the specified size. If there are duplicate values in the
Traversable, some chunks may be smaller than the specified size.

## Keyset\diff()

```Hack
function diff<Tv1 as arraykey, Tv2 as arraykey>(
  Traversable<Tv1> $first,
  Traversable<Tv2> $second,
  Traversable<Tv2> ...$rest
): keyset<Tv1>
```

Returns a new keyset containing only the elements of the first Traversable
that do not appear in any of the other ones.

## Keyset\drop()

```Hack
function drop<Tv as arraykey>(Traversable<Tv> $traversable, int $n): keyset<Tv>
```

Returns a new keyset containing all except the first `$n` elements of
the given Traversable.

To take only the first `$n` elements, see `Keyset\take`.

## Keyset\equal()

```Hack
function equal<Tv as arraykey>(keyset<Tv> $keyset1, keyset<Tv> $keyset2): bool
```

Returns whether the two given keysets have the same elements, using strict
equality. To guarantee equality of order as well as contents, use `===`.

## Keyset\filter()

```Hack
function filter<Tv as arraykey>(
  Traversable<Tv> $traversable,
  ??(function(Tv):bool) $value_predicate = null,
): keyset<Tv>
```

Returns a new keyset containing only the values for which the given predicate
returns `true`. The default predicate is casting the value to boolean.

To remove null values in a typechecker-visible way, see Keyset\filter_nulls.

## Keyset\filter_nulls()

```Hack
function filter_nulls<Tv as arraykey>(
  Traversable<?Tv> $traversable,
): keyset<Tv>
```

Returns a new keyset containing only non-null values of the given
Traversable.

## Keyset\flatten()

```Hack
function flatten<Tv as arraykey>(
  Traversable<Traversable<Tv>> $traversables,
): keyset<Tv>
```

Returns a new keyset formed by joining the values
within the given Traversables into
a keyset.

For a fixed number of Traversables, see Keyset\union.

## Keyset\intersect()

```Hack
function intersect<Tv as arraykey>(
  Traversable<Tv> $first,
  Traversable<Tv> $second,
  Traversable<Tv> ...$rest
): keyset<Tv>
```

Returns a new keyset containing only the elements of the first Traversable
that appear in all the other ones.

## Keyset\keys()

```Hack
function keys<Tk as arraykey, Tv>(
  KeyedTraversable<Tk,Tv> $traversable,
): keyset<Tk>
```

Returns a new keyset containing the keys of the given KeyedTraversable,
maintaining the iteration order.

## Keyset\keys_with_truthy_values()

```Hack
function keys_with_truthy_values<Tk as arraykey, Tv>(
  KeyedTraversable<Tk,Tv> $traversable,
): keyset<Tk>
```

Returns a new keyset containing only the keys of the given KeyedTraversable
that map to truthy values.

## Keyset\map()

```Hack
function map<Tv1, Tv2 as arraykey>(
  Traversable<Tv1> $traversable,
  (function(Tv1):Tv2) $value_func,
): keyset<Tv2>
```

Returns a new keyset where each value is the result of calling the given
function on the original value.

## Keyset\map_with_key()

```Hack
function map_with_key<Tk, Tv1, Tv2 as arraykey>(
  KeyedTraversable<Tk,Tv1> $traversable,
  (function(Tk,Tv1):Tv2) $value_func,
): keyset<Tv2>
```

Returns a new keyset where each value is the result of calling the given
function on the original key and value.

## Keyset\partition()

```Hack
function partition<Tv as arraykey>(
  Traversable<Tv> $traversable,
  (function(Tv):bool) $predicate,
): (keyset<Tv>,keyset<Tv>)
```

Returns a 2-tuple containing keysets for which the given predicate returned
`true` and `false`, respectively.

## Keyset\slice()

```Hack
function slice<Tv as arraykey>(
  Container<Tv> $container,
  int $offset,
  ??int $length = null,
): keyset<Tv>
```

Returns a new keyset containing the subsequence of the given Traversable
determined by the offset and length.

If no length is given or it exceeds the upper bound of the Traversable,
the keyset will contain every element after the offset.

If there are duplicate values in the Traversable, the keyset may be shorter
than the specified length.

## Keyset\sort()

```Hack
function sort<Tv as arraykey>(
  Traversable<Tv> $traversable,
  ??(function(Tv,Tv):int) $comparator = null,
): keyset<Tv>
```

Returns a new keyset sorted by the values of the given Traversable. If the
optional comparator function isn't provided, the values will be sorted in
ascending order.

## Keyset\take()

```Hack
function take<Tv as arraykey>(Traversable<Tv> $traversable, int $n): keyset<Tv>
```

Returns a new keyset containing the first `$n` elements of the given
Traversable.

If there are duplicate values in the Traversable, the keyset may be shorter
than the specified length.

To drop the first `$n` elements, see `Keyset\drop`.

## Keyset\union()

```Hack
function union<Tv as arraykey>(Traversable<Tv> ...$traversables): keyset<Tv>
```

Returns a new keyset containing all of the elements of the given
Traversables.

For a variable number of Traversables, see Keyset\flatten.
