<?php
## 9. Verify if a string is a valid hexadecimal color code (e.g., #ff5733).


$pattern = "/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/";

$colors = ['#ff5733', '#FFF', '#123ABC', 'red'];
// Valid - Valid - Valid - invalid

foreach ($colors as $color) {
  echo "$color ➜ " . (preg_match($pattern, $color) ? "Valid" : "Invalid") . "<br>";
}
