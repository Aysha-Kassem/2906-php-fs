<?php
require_once 'load.php';

use App\Models\Post;

$id = $_GET['id'] ?? null;

if (!$id) {
  // redirect to posts page
  header('Location: posts.php');
  exit;
  }

// Object
$post = Post::show($id);

require_once 'components/posts/card.php';
