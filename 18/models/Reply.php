<?php

class Reply extends Model
  {
    const TABLE = 'replies';
    static function count()
    {
      $table = DB_PREFIX . static::TABLE;
  
      global $db;
      $qry = "SELECT COUNT(*) as total FROM $table";
      $result = $db->query($qry);
      $row = $result->fetch_assoc();
      return $row['total'];
    }
  
  }