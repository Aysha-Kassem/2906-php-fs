<?php
class Reaction
{
    const REACTIONS_TABLE = 'reactions';
    const REACTION_TYPES_TABLE='reaction_types';
    static function all($post_id)
    {
        $reactions_table = DB_PREFIX . static::REACTIONS_TABLE;
        $reaction_types_table = DB_PREFIX . static::REACTION_TYPES_TABLE;
        $qry = "SELECT count(reaction_type_id)as reaction_count,type FROM  $reactions_table left outer join  $reaction_types_table on  $reaction_types_table.id= $reactions_table.reaction_type_id where post_id=$post_id";
        global $db;
        $result = $db->query($qry);
        $reactions = $result->fetch_assoc();
        return $reactions;
    }

}