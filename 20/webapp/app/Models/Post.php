<?php
namespace App\Models;
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


    public static function all(int $limit = 0)
    {
    // Get all posts
    $table = DB_PREFIX . static::TABLE;

    // Define the query
    $qry = "SELECT * FROM $table ORDER BY `created_at` ASC";

    if ($limit > 0)
      $qry .= " LIMIT $limit";

    // Execute the query and get the result set

    $result = self::$db->query($qry);

    // Fetch data from the result set

    $posts = $result->fetch_all(MYSQLI_BOTH);


    return $posts;
    }

    public function update()
    {
    //
    }

  public function delete()
    {
    //
    }
  }
