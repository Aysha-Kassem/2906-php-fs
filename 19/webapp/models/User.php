<?php

namespace Models;

class User extends Model
{
  const TABLE = 'users';
  // count users using count() function on all models
  public static function countUsers(){
    return static::count();
  }
}
