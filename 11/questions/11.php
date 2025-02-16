<?php
## 11. Validate a username: starts with a letter and contains only letters, digits, and underscores (3-15 characters).



$pattern = "/^[a-zA-Z][a-zA-Z0-9_]{2,14}$/";

$usernames = ['user_123', '9username', '_invalidUser', 'validUser1'];
// valid  - invalid  - invalid - valid

foreach ($usernames as $username) {
  echo "$username ➜ " . (preg_match($pattern, $username) ? "Valid" : "Invalid") . "<br>";
}
