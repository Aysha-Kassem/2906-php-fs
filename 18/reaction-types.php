<?php
require_once 'load.php';
?>

<h1>All Reaction Types</h1>

<?php
$reaction_types = ReactionType::all();

dd($reaction_types);
