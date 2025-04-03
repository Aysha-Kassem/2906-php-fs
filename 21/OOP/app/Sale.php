<?php
namespace App;

require_once 'Employee.php';
require_once 'Personal.php';
require_once 'Salary.php';
require_once 'Str.php';

// use App\Salary;
// use App\Str;

class Sale extends Personal implements Employee
{

  use Salary, Str;

  static function calc_time()
  {
  }
  static function team_work()
  {
  }
  static function work_method()
  {
  }
  static function reporting($string)
  {
    $upper = self::upper($string);

    echo "This is the name ($string) converted to ($upper)";
  }
}