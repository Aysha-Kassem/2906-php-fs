<?php
class Product {
    public readonly string $name;
    public readonly float $price;

    public function __construct(string $name, float $price) {
        $this->name = $name;
        $this->price = $price;
    }
}

$product = new Product("Laptop", 1500.00);
echo $product->name; // Output: Laptop

// Uncommenting the line below will cause an error
// $product->name = "Tablet"; // Fatal Error: Cannot modify readonly property
?>
