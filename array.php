<?php

$array = [1, 2, 3, 4, 5];


array_push($array, 6, 7);
echo "بعد استخدام array_push: ";
print_r($array);


$lastElement = array_pop($array);
echo "بعد استخدام array_pop: ";
print_r($array);
echo "العنصر المحذوف: $lastElement\n";


$firstElement = array_shift($array);
echo "بعد استخدام array_shift: ";
print_r($array);
echo "العنصر المحذوف: $firstElement\n";


array_unshift($array, 0);
echo "بعد استخدام array_unshift: ";
print_r($array);


$slice = array_slice($array, 1, 3);
echo "مصفوفة بعد استخدام array_slice: ";
print_r($slice);


$array2 = [8, 9, 10];
$merged = array_merge($array, $array2);
echo "بعد استخدام array_merge: ";
print_r($merged);


$squared = array_map(function($num) {
    return $num * $num;
}, $merged);
echo "مصفوفة بعد استخدام array_map: ";
print_r($squared);


$even = array_filter($squared, function($num) {
    return $num % 2 === 0;
});
echo "مصفوفة بعد استخدام array_filter: ";
print_r($even);


$assocArray = ['a' => 1, 'b' => 2, 'c' => 3];
$keys = array_keys($assocArray);
echo "مفاتيح المصفوفة: ";
print_r($keys);


$values = array_values($assocArray);
echo "قيم المصفوفة: ";
print_r($values);
?>