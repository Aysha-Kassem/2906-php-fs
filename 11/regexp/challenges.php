<?php

function dd($k, $v)
{
  $v = is_string($v) ? $v : ($v ? 'true' : 'false');

  $v = htmlspecialchars($v);
  $k = htmlspecialchars($k);

  echo "<p>$k ➜ <small>$v</small></p>";
}
function title($title)
{
  echo "<h5>$title</h5>";
}

function note($note)
{
  echo "<h6>$note</h6>";
}

//  validation egypt phone number
$pattern = "/^01[0125]\d{8}$/";

$txt_1 = '01012501234';
$txt_2 = '0123456789';
$txt_3 = '0101250123';
$txt_4 = '01012512345';
$txt_5 = '010125-1234';
$txt_6 = '010125a1234';
$txt_7 = '040125a1234';


$res_1 = preg_match($pattern, $txt_1);
$res_2 = preg_match($pattern, $txt_2);
$res_3 = preg_match($pattern, $txt_3);
$res_4 = preg_match($pattern, $txt_4);
$res_5 = preg_match($pattern, $txt_5);
$res_6 = preg_match($pattern, $txt_6);
$res_7 = preg_match($pattern, $txt_7);

title($pattern);

note("Egyptian phone number format:");

dd($txt_1, $res_1);
dd($txt_2, $res_2);
dd($txt_3, $res_3);
dd($txt_4, $res_4);
dd($txt_5, $res_5);
dd($txt_6, $res_6);
dd($txt_7, $res_7);


