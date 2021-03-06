<?hh // strict
/*
 *  Copyright (c) 2004-present, Facebook, Inc.
 *  All rights reserved.
 *
 *  This source code is licensed under the BSD-style license found in the
 *  LICENSE file in the root directory of this source tree. An additional grant
 *  of patent rights can be found in the PATENTS file in the same directory.
 *
 */

namespace HH\Lib\Vec;

/**
 * Returns a 2-tuple containing vecs for which the given predicate returned
 * `true` and `false`, respectively.
 */
function partition<Tv>(
  Traversable<Tv> $traversable,
  (function(Tv): bool) $predicate,
): (vec<Tv>, vec<Tv>) {
  $success = vec[];
  $failure = vec[];
  foreach ($traversable as $value) {
    if ($predicate($value)) {
      $success[] = $value;
    } else {
      $failure[] = $value;
    }
  }
  return tuple($success, $failure);
}
