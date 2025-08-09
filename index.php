<?php
$fruits = ['apple', 'banana', 'cherry', 'date', 'elderberry'];
echo $fruits[1]."\n";

$person = [
    "name" => "Shadman",
    "age" => 25,
    "city" => "Dhaka"
];
echo $person["name"]."\n";
echo $person["age"]."\n";

echo count($fruits)."\n";

ARRAY_PUSH($fruits, "fig");
echo count($fruits)."\n";

array_pop($fruits);
echo count($fruits)."\n";

if(in_array("banana", $fruits)) {
    echo "Banana is in the array."."\n";
} else {
    echo "Banana is not in the array.";
}

print_r(array_keys($person));
print_r(array_values($person));
?>