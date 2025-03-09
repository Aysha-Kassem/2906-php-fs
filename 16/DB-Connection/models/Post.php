<?php
class Post {
    const TABLE = 'posts';

    static function all (int $limit = 0) {
        $table = DB_PREFIX . static::TABLE;

        global $db;
        $sql = "SELECT * FROM $table";
        if ($limit > 0) {
            $sql .= " LIMIT $limit";
        }
        $result = $db->query($sql);
        return $result->fetch_all(1);
    }

    static function show(int $id){
        $table = DB_PREFIX . static::TABLE;

        global $db;
        $sql = "SELECT * FROM $table". " WHERE id = $id";
        $result = $db->query($sql);
        return $result->fetch_assoc();
    }
    
    static function count(){
        $table = DB_PREFIX . static::TABLE;
        
        global $db;
        $sql = "SELECT COUNT(*) as total FROM $table";
        $result = $db->query($sql);
        $row = $result->fetch_assoc();
        return $row['total'];

    }
}