<?php
require_once 'User.php';

class Finance extends User
  {
  public static function new_employee($name, $title, $salary)
    {
    self::update_name($name);
    }
  }