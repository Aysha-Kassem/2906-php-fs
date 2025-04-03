<?php
class Replay{
    const REPLIES_TABLE = 'replies';

    static function all($c_id)
    {
        $replies_table = DB_PREFIX . static::REPLIES_TABLE;

        $qry = "SELECT * FROM $replies_table where comment_id ='$c_id'";
       
        global $db;
        $result = $db->query($qry);
        $replies = $result->fetch_all(MYSQLI_ASSOC);
        return $replies;
    }
}