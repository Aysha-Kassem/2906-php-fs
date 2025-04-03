<?php
require_once 'load.php';
use App\Models\Post;

$posts = Post::all();

foreach ($posts as $post) {
  require 'components/posts/card.php';
  }
