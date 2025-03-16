<?php

class User
  {
  private static $name = 'NA';

  protected static function update_name($new_name)
    {

    // Validate the name

    $pattern = '/^[A-Z][a-z]{2,14}$/';
    if (preg_match($pattern, $new_name))
      self::$name = $new_name;
    }

  public static function show_name()
    {
    echo self::$name;
    echo '<hr />';
    }

  }