<?php 
# PHP Functions Questions

### 1. Write a function `addNumbers` that takes two numbers as parameters and returns their sum.
function addNumbers($a, $b) {return $a + $b;}

### 2. Create a function `multiply` that multiplies three numbers and returns the result.
function multiply($a, $b, $c) {return $a * $b * $c;}

### 3. Implement a function `divide` that divides two numbers and returns the quotient.
function divide($a, $b) {return $a / $b;}

### 4. Write a function `calculateArea` to find the area of a rectangle given its width and height.
function calculateArea($width, $height) {return $width * $height;}

### 5. Create a function `square` that takes one number as input and returns its square.
function square($number) {return $number ** 2;}

### 6. Write a function `cube` to calculate the cube of a number.
function cube($number) {return $number ** 3;}

### 7. Implement a function `convertToMinutes` that converts hours to minutes.
function convertToMinutes($hours) {return $hours * 60;}

### 8. Write a function `convertToSeconds` that converts days to seconds.
function convertToSeconds($days) {return $days * 24 * 60 * 60;}

### 9. Create a function `calculatePerimeter` for the perimeter of a rectangle, given width and height.
function calculatePerimeter($width, $height) {return 2 * ($width + $height);}

### 10. Write a function `average` to calculate the average of three numbers.
function average($a, $b, $c) {return ($a + $b + $c) / 3;}

### 11. Create a function `convertTemperature` to convert Celsius to Fahrenheit.
function convertTemperature($celsius) {return ($celsius * 9 / 5) + 32;}

### 12. Implement a function `calculateSpeed` that calculates speed given distance and time.
function calculateSpeed($distance, $time) {return $distance / $time;}

### 13. Write a function `hypotenuse` that calculates the hypotenuse of a right triangle given its two sides.
function hypotenuse($sideA, $sideB) {return sqrt($sideA ** 2 + $sideB ** 2);}

### 14. Create a function `power` that raises a number to a given exponent.
function power($base, $exponent) {return $base ** $exponent;}

### 15. Write a function `modulus` to find the remainder when one number is divided by another.
function modulus($a, $b) {return $a % $b;}

### 16. Implement a function `calculateBMI` that calculates the Body Mass Index given weight and height.
function calculateBMI($weight, $height) {return $weight / ($height ** 2);}

### 17. Create a function `convertToKilometers` to convert meters to kilometers.
function convertToKilometers($meters) {return $meters / 1000;}

### 18. Write a function `calculateInterest` to calculate simple interest given principal, rate, and time.
function calculateInterest($principal, $rate, $time) {return $principal * $rate * $time / 100;}

### 19. Create a function `compoundInterest` that calculates compound interest given principal, rate, and time.
function compoundInterest($principal, $rate, $time) {return $principal * (pow((1 + $rate / 100), $time) - 1);}

### 20. Implement a function `findPercentage` that calculates the percentage of a given value out of a total.
function findPercentage($value, $total) {return ($value / $total) * 100;}

