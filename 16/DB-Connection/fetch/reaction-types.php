<?php

// Get all reaction_types 
$table = DB_PREFIX . 'reaction_types';
$qry = "SELECT * FROM $table;";
$result = $db->query($qry);
$reaction_types = $result->fetch_all(1);

