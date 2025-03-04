<?php
require_once 'load.php';


// Get all users 
$table = DB_PREFIX . 'users';
$qry = "SELECT * FROM $table;";
$result = $db->query($qry);
$users = $result->fetch_all(1);

// Get all posts
$table = DB_PREFIX . 'posts';
$qry = "SELECT * FROM $table;";
$result = $db->query($qry);
$posts = $result->fetch_all(1);

// Get all comments 
$table = DB_PREFIX . 'comments';
$qry = "SELECT * FROM $table;";
$result = $db->query($qry);
$comments = $result->fetch_all(1);


// Get all post_statuses 
$table = DB_PREFIX . 'post_statuses';
$qry = "SELECT * FROM $table;";
$result = $db->query($qry);
$post_statuses = $result->fetch_all(1);

// Get all reaction_types 
$table = DB_PREFIX . 'reaction_types';
$qry = "SELECT * FROM $table;";
$result = $db->query($qry);
$reaction_types = $result->fetch_all(1);

// Get all replies 
$table = DB_PREFIX . 'replies';
$qry = "SELECT * FROM $table;";
$result = $db->query($qry);
$replies = $result->fetch_all(1);



