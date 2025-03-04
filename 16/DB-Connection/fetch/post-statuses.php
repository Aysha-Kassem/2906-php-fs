<?php
// Get all post_statuses 
$table = DB_PREFIX . 'post_statuses';
$qry = "SELECT * FROM $table;";
$result = $db->query($qry);
$post_statuses = $result->fetch_all(1);
