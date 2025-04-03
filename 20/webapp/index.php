<?php

require_once 'load.php';

// use App\Models\Post;
// use App\Models\User;

// Group all classes in the same namespace in one use
use App\Models\{
  Post,
  User,
  Comment
  };

// Use class name aliases for namespace aliases
// use App\Controllers\Post as PostController;
// use App\Requests\Post as PostRequest;

use App\Controllers\PostController;
use App\Requests\PostRequest;

$posts = Post::all(5);

$posts_count = Post::count();

$users_count = User::count();

PostController::index();

PostRequest::index();

$comments = Comment::all(10);

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

<div>
  <h3>Comments</h3>
  <?php

  foreach ($comments as $comment) {
    echo '<p>' . $comment['id'] . ' - ' . $comment['comment'] . '</p>';
    }
  ?>
</div>
