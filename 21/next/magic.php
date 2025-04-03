<?php
class Person {
    private string $name;

    public function __construct(string $name) {
        $this->name = $name;
    }

    public function __get($property) {
        return "Trying to access non-existing property: $property";
    }

    public function __set($property, $value) {
        echo "Cannot set '$property' to '$value'. Property does not exist.\n";
    }

    public function __toString() {
        return "Person: " . $this->name;
    }
}

$person = new Person("John");

// Using __get()
echo $person->age; // Output: Trying to access non-existing property: age

// Using __set()
$person->age = 25; // Output: Cannot set 'age' to '25'. Property does not exist.

// Using __toString()
echo $person; // Output: Person: John
?>
