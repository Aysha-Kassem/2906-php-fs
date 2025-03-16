<?php
class Post extends Model
  {

  const TABLE = 'posts';

  public static function show_latest()
    {
    $table = DB_PREFIX . static::TABLE;

    $qry = "SELECT * FROM `$table` ORDER BY `id` DESC LIMIT 10;";

    $posts = self::all_assoc($qry);

    return $posts;
    }



  }
