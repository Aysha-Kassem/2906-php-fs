<?php
namespace App;

interface Employee {

  static function calc_time ();
  static function team_work ();
  static function work_method ();

  // Next method will generate error
  // static function test (){}

}