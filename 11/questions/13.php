<?php
## 13. Check if a given input is a valid URL.


$pattern = '/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/';  // Regular expression for URL validation

$urls = ['https://mwjb.net', 'https://mwjb.net/page/1', 'www.google.com', 'http://mwjb.net', 'invalid-url'];
//  valid - valid - valid - valid - invalid

foreach ($urls as $url) {
  echo "$url ➜ " . (preg_match($pattern, $url) ? "Valid" : "Invalid") . "<br>";
}
