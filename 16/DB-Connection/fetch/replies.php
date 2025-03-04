<?php
// Get all replies 
$table = DB_PREFIX . 'replies';
$qry = "SELECT * FROM $table;";
$result = $db->query($qry);
$replies = $result->fetch_all(1);

