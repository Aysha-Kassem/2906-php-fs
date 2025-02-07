<?php
# Create the following loops

## Print Numbers from 1 to 10
// - Write a for loop that prints numbers from 1 to 10. (while)
echo 'Print Numbers from 1 to 10 <br />';
$i = 1;
while ($i <= 10) {
    echo "$i <br />";
    $i ++;
}
echo '<hr />';


## Reverse Countdown
// - print numbers from 10 down to 1. (do-while)
echo 'Reverse Countdown from 10 to 1 <br />';
$i = 10;
do {
    echo "$i <br />";
    $i --;
} while ($i >= 1);
echo '<hr />';


## Print Even Numbers up to 20
// -  Prints all even numbers from 1 to 20 starting the count from 1. (for)
echo 'Print Even Numbers from 1 to 20 starting the count <br />';
for ($i = 1; $i <= 20; $i++) {
    if ($i % 2 === 0) {
        echo "$i <br />";
    }
}
echo '<hr />';


## Multiplication Table of 5
// - Write a for loop that prints the multiplication table of 5 up to 5 × 10. (for)
echo 'Multiplication Table of 5 <br />';
for ($i = 1; $i <= 10; $i++) {
    echo "5 x $i = ".(5 * $i)."<br />";
}
echo '<hr />';


## Print Fibonacci Sequence up to 10
echo 'Print Fibonacci Sequence up to 10 <br />';
$sequence = [0, 1];
for ($i = 2; $i < 10; $i++) {
    $sequence[] = $sequence[$i - 1] + $sequence[$i - 2];
    echo $sequence[$i].'<br />';
}
echo '<hr />';



## Print Square of Numbers from 1 to 5
// - print the square of numbers from 1 to 5. (while)
echo 'Print Square of Numbers from 1 to 5 <br />';
$i = 1;
while ($i <= 5) {
    echo "$i^2 = ".($i * $i)."<br />";
    $i ++;
}
echo '<hr />';


## create the timetable 1 - 12
// - Print the math timetable from 1 to 12 (optional)
echo 'Multiplication Table from 1 to 12 <br />';
for ($i = 1; $i <= 12; $i++) {
    echo "Multiplication table of $i:<br />";
    for ($j = 1; $j <= 12; $j++) {
        echo "$i x $j = ".($i * $j)."<br />";
    }
    echo '<br />';
}