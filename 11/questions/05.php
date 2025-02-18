<?php
## 5. Validate an email address format.

$pattern = '/^[a-z\d._-]+@[a-z]+\.[a-z]{2,}$/i';

$emails = ['test@example.com', 'user@domain', 'valid.email@site.net', 'wrong@com'];
// Valid  -  invalid - Valid  - invalid

foreach ($emails as $email) {
  echo "$email ➜ " . (preg_match($pattern, $email) ? "Valid" : "Invalid") . "<br>";
}
