<?php
require_once 'load.php';

$posts = Models\Post::all(5);

$posts_count = Models\Post::count();

$users_count = Models\User::count();
?>

<h2>Statistics</h2>
<div>
  <span>POSTS</span>
  <span><?= $posts_count; ?></span>
</div>

<div>
  <span>USRES</span>
  <span><?= $users_count; ?></span>
</div>


<div>
  <h3>Posts</h3>
  <?php


  foreach ($posts as $post) {
    require 'components/posts/title.php';
    }
  ?>
</div>