<?php
class Animal {
    public function makeSound() {
        return "Some generic animal sound";
    }
}

class Dog extends Animal {
    public function makeSound() {
        return parent::makeSound() . " - but I bark!";
    }
}

$dog = new Dog();
echo $dog->makeSound(); // Output: Some generic animal sound - but I bark!
?>
