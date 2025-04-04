<?php
## 10. Check if a string contains only digits.

$pattern = "/^\d+$/";

$values = ['12345', '98765', 'abc123', '00123'];
// Valid - Valid - invalid - Valid

foreach ($values as $value) {
  echo "$value ➜ " . (preg_match($pattern, $value) ? "Valid" : "Invalid") . "<br>";
}
