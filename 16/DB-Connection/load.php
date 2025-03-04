<?php
session_start();

// Load configurations
require_once 'config/database.php';

require_once 'config/app.php';

// load helpers

require_once 'helpers/functions.php';

//  Define the database connection
$db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT, DB_SOCKET);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}