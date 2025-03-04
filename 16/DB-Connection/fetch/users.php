<?php
require_once '../load.php';


// Get all users 
$table = DB_PREFIX . 'users';
$qry = "SELECT * FROM $table;";
$result = $db->query($qry);
$users = $result->fetch_all(1);



require_once '../components/users/users.php';



