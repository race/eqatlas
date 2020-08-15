<?php


function debug($object) {
  var_dump($object);
}

// might work in PHP7... but not PHP5 (next always returns the following and loops back to first at the end)
function has_next_php5($array) {
  if (is_array($array)) {
    // since we do not pass array by reference, this only
    // increases the iterator within the scope of the function
    return (next($array) !== false);
  } else {
    return false;
  }
}

/**
 * Returns true if the given array has another element after the current iterator
 *
 * @param mixed $array
 * @param string $iterator
 * @return boolean True if there's another element after the defined iterator, otherwise false
 */
function has_next($array, $iterator) {
  if (!is_array($array)) {
    $array = array($array);
  }
  $keys = array_keys($array);
  $count = count($keys);
  return (array_search($iterator, $keys)+1 < $count);
}
?>
