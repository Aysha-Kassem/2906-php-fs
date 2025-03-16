<?php
session_start();

require_once 'vendor/autoload.php';

// Load configurations
require_once 'config/database.php';

require_once 'config/app.php';

// load helpers

require_once 'helpers/functions.php';

// Call the Model::connect
Model::connect();
