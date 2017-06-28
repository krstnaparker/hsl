# HH\Lib\Dict

 - [Dict\associate](#dictassociate)
 - [Dict\chunk](#dictchunk)
 - [Dict\count_values](#dictcount_values)
 - [Dict\diff_by_key](#dictdiff_by_key)
 - [Dict\equal](#dictequal)
 - [Dict\fill_keys](#dictfill_keys)
 - [Dict\filter](#dictfilter)
 - [Dict\filter_keys](#dictfilter_keys)
 - [Dict\filter_nulls](#dictfilter_nulls)
 - [Dict\filter_with_key](#dictfilter_with_key)
 - [Dict\flip](#dictflip)
 - [Dict\from_entries](#dictfrom_entries)
 - [Dict\from_keys](#dictfrom_keys)
 - [Dict\from_values](#dictfrom_values)
 - [Dict\gen](#dictgen)
 - [Dict\gen_filter](#dictgen_filter)
 - [Dict\gen_filter_with_key](#dictgen_filter_with_key)
 - [Dict\gen_from_keys](#dictgen_from_keys)
 - [Dict\gen_map](#dictgen_map)
 - [Dict\group](#dictgroup)
 - [Dict\group_by](#dictgroup_by)
 - [Dict\map](#dictmap)
 - [Dict\map_keys](#dictmap_keys)
 - [Dict\map_with_key](#dictmap_with_key)
 - [Dict\merge](#dictmerge)
 - [Dict\partition](#dictpartition)
 - [Dict\partition_with_key](#dictpartition_with_key)
 - [Dict\pull](#dictpull)
 - [Dict\pull_with_key](#dictpull_with_key)
 - [Dict\reverse](#dictreverse)
 - [Dict\select_keys](#dictselect_keys)
 - [Dict\slice](#dictslice)
 - [Dict\sort](#dictsort)
 - [Dict\sort_by](#dictsort_by)
 - [Dict\sort_by_key](#dictsort_by_key)
 - [Dict\unique](#dictunique)
 - [Dict\unique_by](#dictunique_by)

## Dict\associate()

```Hack
function associate<Tk as arraykey, Tv>(
  Traversable<Tk> $keys,
  Traversable<Tv> $values,
): dict<Tk,Tv>
```

Returns a new dict where each element in `$keys` maps to the
corresponding element in `$values`.

## Dict\chunk()

```Hack
function chunk<Tk, Tv>(
  KeyedTraversable<Tk,Tv> $traversable,
  int $size,
): vec<dict<Tk,Tv>>
```

Returns a vec containing the original dict split into chunks of the given
size. If the original dict doesn't divide evenly, the final chunk will be
smaller.

## Dict\count_values()

```Hack
function count_values<Tv as arraykey>(Traversable<Tv> $values): dict<Tv,int>
```

Returns a new dict mapping each value to the number of times it appears
in the given Traversable.

## Dict\diff_by_key()

```Hack
function diff_by_key<Tk1, Tk2, Tv>(
  KeyedTraversable<Tk1,Tv> $first,
  KeyedTraversable<Tk2,mixed> $second,
  KeyedTraversable<Tk2,mixed> ...$rest
): dict<Tk1,Tv>
```

Returns a new dict containing only the entries of the first KeyedTraversable
whose keys do not appear in any of the other ones.

## Dict\equal()

```Hack
function equal<Tk, Tv>(dict<Tk,Tv> $dict1, dict<Tk,Tv> $dict2): bool
```

Returns whether the two given dicts have the same entries, using strict
equality. To guarantee equality of order as well as contents, use `===`.

## Dict\fill_keys()

```Hack
function fill_keys<Tk as arraykey, Tv>(
  Traversable<Tk> $keys,
  Tv $value,
): dict<Tk,Tv>
```

Returns a new dict where all the given keys map to the given value.

## Dict\filter()

```Hack
function filter<Tk, Tv>(
  KeyedTraversable<Tk,Tv> $traversable,
  ?(function(Tv):bool) $value_predicate = null,
): dict<Tk,Tv>
```

Returns a new dict containing only the values for which the given predicate
returns `true`. The default predicate is casting the value to boolean.

To remove null values in a typechecker-visible way, see Dict\filter_nulls.
To use an async predicate, see Dict\gen_filter.

## Dict\filter_keys()

```Hack
function filter_keys<Tk, Tv>(
  KeyedTraversable<Tk,Tv> $traversable,
  ?(function(Tk):bool) $key_predicate = null,
): dict<Tk,Tv>
```

Returns a new dict containing only the keys for which the given predicate
returns `true`. The default predicate is casting the key to boolean.

## Dict\filter_nulls()

```Hack
function filter_nulls<Tk, Tv>(
  KeyedTraversable<Tk,Tv> $traversable,
): dict<Tk,Tv>
```

Given a KeyedTraversable with nullable values, returns a new dict with
those mappings removed.

## Dict\filter_with_key()

```Hack
function filter_with_key<Tk, Tv>(
  KeyedTraversable<Tk,Tv> $traversable,
  (function(Tk,Tv):bool) $predicate,
): dict<Tk,Tv>
```

Just like filter, but your predicate can include the key as well as
the value.

To use an async predicate, see Dict\gen_filter_with_key.

## Dict\flip()

```Hack
function flip<Tk, Tv as arraykey>(
  KeyedTraversable<Tk,Tv> $traversable,
): dict<Tv,Tk>
```

Returns a new dict keyed by the values of the given KeyedTraversable
and vice-versa. In case of duplicate values, later keys overwrite the
previous ones.

## Dict\from_entries()

```Hack
function from_entries<Tk as arraykey, Tv>(
  Traversable<HH\Lib\Dict\tuple<Tk,Tv>> $entries,
): dict<Tk,Tv>
```

Returns a new dict where each mapping is defined by the given key/value
tuples. In the case of duplicate keys, later values will overwrite the
previous ones.

To create a dict from keys, see Dict\from_keys.
To create a dict from values, see Dict\from_values.

## Dict\from_keys()

```Hack
function from_keys<Tk as arraykey, Tv>(
  Traversable<Tk> $keys,
  (function(Tk):Tv) $value_func,
): dict<Tk,Tv>
```

Returns a new dict where each value is the result of calling the given
function on the corresponding key.

To use an async function, see Dict\gen_from_keys.
To create a dict from values, see Dict\from_values.
To create a dict from key/value pairs, see Dict\from_entries.

## Dict\from_values()

```Hack
function from_values<Tk as arraykey, Tv>(
  Traversable<Tv> $values,
  (function(Tv):Tk) $key_func,
): dict<Tk,Tv>
```

Returns a new dict keyed by the result of calling the given function on each
corresponding value. In the case of duplicate keys, later values will
overwrite the previous ones.

To create a dict from keys, see Dict\from_keys.
To create a dict from key/value pairs, see Dict\from_entries.

## Dict\gen()

```Hack
function gen<Tk, Tv>(
  KeyedTraversable<Tk,Awaitable<Tv>> $awaitables,
): Awaitable<dict<Tk,Tv>>
```


## Dict\gen_filter()

```Hack
function gen_filter<Tk, Tv>(
  KeyedContainer<Tk,Tv> $traversable,
  (function(Tv):Awaitable<bool>) $value_predicate,
): Awaitable<dict<Tk,Tv>>
```

Returns a new dict containing only the values for which the given async
predicate returns `true`.

For non-async predicates, see Dict\filter.

## Dict\gen_filter_with_key()

```Hack
function gen_filter_with_key<Tk, Tv>(
  KeyedContainer<Tk,Tv> $traversable,
  (function(Tk,Tv):Awaitable<bool>) $predicate,
): Awaitable<dict<Tk,Tv>>
```

Like gen_filter, but lets you utilize the keys of your dict too.

For non-async filters with key, see Dict\filter_with_key.

## Dict\gen_from_keys()

```Hack
function gen_from_keys<Tk as arraykey, Tv>(
  Traversable<Tk> $keys,
  (function(Tk):Awaitable<Tv>) $async_func,
): Awaitable<dict<Tk,Tv>>
```

Returns a new dict where each value is the result of calling the given
async function on the corresponding key.

For non-async functions, see Dict\from_keys.

## Dict\gen_map()

```Hack
function gen_map<Tk, Tv1, Tv2>(
  KeyedTraversable<Tk,Tv1> $traversable,
  (function(Tv1):Awaitable<Tv2>) $value_func,
): Awaitable<dict<Tk,Tv2>>
```

Returns a new dict where each value is the result of calling the given
async function on the original value.

For non-async functions, see Dict\map.

## Dict\group()

```Hack
function group<Tk as arraykey, Tv>(
  Traversable<Tv> $values,
  ?(function(Tv):?Tk) $key_func,
): dict<Tk,vec<Tv>>
```

Temporary alias. See `Dict\group_by`.

## Dict\group_by()

```Hack
function group_by<Tk as arraykey, Tv>(
  Traversable<Tv> $values,
  ?(function(Tv):?Tk) $key_func,
): dict<Tk,vec<Tv>>
```

Returns a new dict where
- keys are the results of the given function called on the given values.
- values are vecs of original values that all produced the same key.
If a value produces a null key, it's omitted from the result.

## Dict\map()

```Hack
function map<Tk, Tv1, Tv2>(
  KeyedTraversable<Tk,Tv1> $traversable,
  (function(Tv1):Tv2) $value_func,
): dict<Tk,Tv2>
```

Returns a new dict where each value is the result of calling the given
function on the original value.

To use an async function, see Dict\gen_map.

## Dict\map_keys()

```Hack
function map_keys<Tk1, Tk2 as arraykey, Tv>(
  KeyedTraversable<Tk1,Tv> $traversable,
  (function(Tk1):Tk2) $key_func,
): dict<Tk2,Tv>
```

Returns a new dict where each key is the result of calling the given
function on the original key. In the case of duplicate keys, later values
will overwrite the previous ones.

## Dict\map_with_key()

```Hack
function map_with_key<Tk, Tv1, Tv2>(
  KeyedTraversable<Tk,Tv1> $traversable,
  (function(Tk,Tv1):Tv2) $value_func,
): dict<Tk,Tv2>
```

Returns a new dict where each value is the result of calling the given
function on the original value and key.

## Dict\merge()

```Hack
function merge<Tk, Tv>(KeyedTraversable<Tk,Tv> ...$traversables): dict<Tk,Tv>
```

Merges multiple KeyedTraversables into a new dict. In the case of duplicate
keys, later values will overwrite the previous ones.

## Dict\partition()

```Hack
function partition<Tk, Tv>(
  KeyedTraversable<Tk,Tv> $traversable,
  (function(Tv):bool) $predicate,
): HH\Lib\Dict\tuple<dict<Tk,Tv>,dict<Tk,Tv>>
```

Returns a 2-tuple containing dicts for which the given predicate returned
`true` and `false`, respectively.

## Dict\partition_with_key()

```Hack
function partition_with_key<Tk, Tv>(
  KeyedTraversable<Tk,Tv> $traversable,
  (function(Tk,Tv):bool) $predicate,
): HH\Lib\Dict\tuple<dict<Tk,Tv>,dict<Tk,Tv>>
```

Returns a 2-tuple containing dicts for which the given keyed predicate
returned `true` and `false`, respectively.

## Dict\pull()

```Hack
function pull<Tk as arraykey, Tv1, Tv2>(
  Traversable<Tv1> $traversable,
  (function(Tv1):Tv2) $value_func,
  (function(Tv1):Tk) $key_func,
): dict<Tk,Tv2>
```

Returns a new dict where:
- values are the result of calling `$value_func` on the original value
- keys are the result of calling `$key_func` on the original value.
In the case of duplicate keys, later values will overwrite the previous ones.

## Dict\pull_with_key()

```Hack
function pull_with_key<Tk1, Tk2 as arraykey, Tv1, Tv2>(
  KeyedTraversable<Tk1,Tv1> $traversable,
  (function(Tk1,Tv1):Tv2) $value_func,
  (function(Tk1,Tv1):Tk2) $key_func,
): dict<Tk2,Tv2>
```

Returns a new dict where:
- values are the result of calling `$value_func` on the original value/key
- keys are the result of calling `$key_func` on the original value/key.
In the case of duplicate keys, later values will overwrite the previous ones.

## Dict\reverse()

```Hack
function reverse<Tk as arraykey, Tv>(
  KeyedTraversable<Tk,Tv> $traversable,
): dict<Tk,Tv>
```

Returns a new dict with the original key/value pairs in reversed iteration
order.

## Dict\select_keys()

```Hack
function select_keys<Tk as arraykey, Tv>(
  KeyedContainer<Tk,Tv> $container,
  Traversable<Tk> $keys,
): dict<Tk,Tv>
```

Returns a new dict containing only the keys found in both the input container
and the given Traversable. The dict will have the same ordering as the
`$keys` Traversable.

## Dict\slice()

```Hack
function slice<Tk, Tv>(
  KeyedTraversable<Tk,Tv> $traversable,
  int $offset,
  ?int $length = null,
): dict<Tk,Tv>
```


## Dict\sort()

```Hack
function sort<Tk, Tv>(
  KeyedTraversable<Tk,Tv> $traversable,
  ?(function(Tv,Tv):int) $value_comparator = null,
): dict<Tk,Tv>
```

Returns a new dict sorted by the values of the given KeyedTraversable. If the
optional comparator function isn't provided, the values will be sorted in
ascending order.

To sort by some computable property of each value, see sort_by().

## Dict\sort_by()

```Hack
function sort_by<Tk, Tv, Ts>(
  KeyedTraversable<Tk,Tv> $traversable,
  (function(Tv):Ts) $scalar_func,
  ?(function(Ts,Ts):int) $scalar_comparator = null,
): dict<Tk,Tv>
```

Returns a new dict sorted by some scalar property of each value of the given
KeyedTraversable, which is computed by the given function. If the optional
comparator function isn't provided, the values will be sorted in ascending
order of scalar key.

## Dict\sort_by_key()

```Hack
function sort_by_key<Tk, Tv>(
  KeyedTraversable<Tk,Tv> $traversable,
  ?(function(Tk,Tk):int) $key_comparator = null,
): dict<Tk,Tv>
```

Returns a new dict sorted by the keys of the given KeyedTraversable. If the
optional comparator function isn't provided, the keys will be sorted in
ascending order.

## Dict\unique()

```Hack
function unique<Tk as arraykey, Tv as arraykey>(
  KeyedTraversable<Tk,Tv> $traversable,
): dict<Tk,Tv>
```

Returns a new dict in which each value appears exactly once. In case of
duplicate values, later keys will overwrite the previous ones.

For non-arraykey values, see Dict\unique_by.

## Dict\unique_by()

```Hack
function unique_by<Tk as arraykey, Tv, Ts as arraykey>(
  KeyedContainer<Tk,Tv> $container,
  (function(Tv):Ts) $scalar_func,
): dict<Tk,Tv>
```

Returns a new dict in which each value appears exactly once, where the
value's uniqueness is determined by transforming it to a scalar via the
given function. In case of duplicate scalar values, later keys will overwrite
the previous ones.

For arraykey values, see Dict\unique.
