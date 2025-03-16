<?php
require_once 'load.php';

$posts = Post::show_latest();

Model::connect();


dd($posts);

