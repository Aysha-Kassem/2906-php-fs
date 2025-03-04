<?php
require_once '../load.php';


// Get all comments 
$table = DB_PREFIX . 'comments';
$qry = "SELECT * FROM $table;";
$result = $db->query($qry);
$comments = $result->fetch_all(1);


require '../components/comments/comments.php';



