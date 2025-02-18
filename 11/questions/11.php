<?php
## 11. Validate a username: starts with a letter and contains only letters, digits, and underscores (3-15 characters).



$pattern = "/^[a-z][a-z\d_]{2,14}$/i";

$usernames = ['user_123', '9username', '_invalidUser', 'validUser1'];
// valid  - invalid  - invalid - valid

foreach ($usernames as $username) {
  echo "$username ➜ " . (preg_match($pattern, $username) ? "Valid" : "Invalid") . "<br>";
}
