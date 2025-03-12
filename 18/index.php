<?php
require_once 'load.php';

$posts = Post::all();

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

  <style>
    .posts {
      padding: 20px;
    }
  </style>
</head>

<body>
  <div class="posts">
    <?php
    foreach ($posts as $post) {
      require 'components/card.php';
    }
    ?>
  </div>
</body>

</html>