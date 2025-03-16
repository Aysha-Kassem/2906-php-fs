<?php
class Model
  {
  public const TABLE = '';

  private static $db;

  public static function connect()
    {
    self::$db = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    }

  public static function all(int $limit = 0)
    {
    // Get all posts
    $table = DB_PREFIX . static::TABLE;

    // Define the query
    $qry = "SELECT * FROM $table ORDER BY `id` DESC";

    if ($limit > 0)
      $qry .= " LIMIT $limit";

    // Execute the query and get the result set

    $result = self::$db->query($qry);

    // Fetch data from the result set

    $posts = $result->fetch_all(MYSQLI_ASSOC);


    return $posts;
    }

  public static function show(int $id)
    {
    // Get all posts
    $table = DB_PREFIX . static::TABLE;

    // Define the query
    $qry = "SELECT * FROM $table WHERE `id` = '$id';";


    // Execute the query and get the result set
    $post = self::assoc($qry);

    return $post;
    }

  protected static function all_assoc($qry)
    {
    $result = self::$db->query($qry);
    $data = $result->fetch_all(MYSQLI_ASSOC);

    return $data;
    }

  protected static function assoc($qry)
    {
    $result = self::$db->query($qry);
    $data = $result->fetch_assoc();

    return $data;
    }

  public static function count()
    {
    $table = DB_PREFIX . static::TABLE;


    $qry = "SELECT COUNT(*) as total FROM $table";
    $result = self::$db->query($qry);
    $row = $result->fetch_assoc();
    return $row['total'];
    }
  }
