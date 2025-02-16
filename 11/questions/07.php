<?php
## 7. Check if a given string is a valid IPv4 address.

$pattern = "/^(\d{1,3}\.){3}\d{1,3}$/";

$ips = ['192.168.1.1', '999.999.999.999', '256.256.256.2560', '8.8.8'];
// Valid  - Valid  - invalid - invalid

foreach ($ips as $ip) {
  echo "$ip ➜ " . (preg_match($pattern, $ip) ? "Valid" : "Invalid") . "<br>";
}
