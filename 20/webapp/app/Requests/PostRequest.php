<?php
namespace App\Requests;

class PostRequest extends GeneralRequest{

  public static function index () {
    echo '<h3>App -> Requests -> Post -> Index</h3>';
  }
}