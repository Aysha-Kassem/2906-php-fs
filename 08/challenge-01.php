<?php 

$status = 'Reviewed';


// for next cases, the color should be red => Cancelled, Refunded, Complain
// for next cases, the color should be blue => Pending, On Hold, Postpond
// for next cases, the color should be green => Delivered, Shipped, Reviewed
// handle not matched status

$color = match(strtolower($status)){
    'cancelled', 'refunded', 'complained' => 'red',
    'pending', 'on hold', 'postponed' => 'blue',
    'delivered','shipped','reviewed' => 'green',
    default => 'not matched status'
};

echo "<h2 style='color: $color;'>$status</h2>";
