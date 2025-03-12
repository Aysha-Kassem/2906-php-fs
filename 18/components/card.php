<?php


$users = User::all();
$postStatus = PostStatus::all();
$comments = Comment::all();
$reactionType = ReactionType::all();
$reactions = Reaction::all();
// dd($reaction);
// dd($reactionType);


?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Post</title>

  <style>
    .post {
      padding: 20px;
      margin-bottom: 20px;
      border-bottom: 1px solid black;
    }

    .user_status {
      display: flex;
      align-items: center;
      justify-content: space-between;
      font-size: 10px;
      margin-bottom: 10px;
    }

    .user {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .title {
      font-size: 18px;
      margin-bottom: 10px;
    }

    .body {
      font-size: 14px;
      line-height: 1.5;
    }

    .status {
      font-weight: bold;
    }

    .comments_title {
      font-size: smaller;
      border-bottom: 0.5px solid black;
      display: inline-block;
      color: blue;
    }

    .comments {
      display: none;
      gap: 20px;
      padding-top: 20px;

    }

    .comments.visible {
      display: grid;
    }

    .reaction {
      font-size: 12px;
      padding: 10px;
      display: flex;
      justify-content: space-evenly;
      margin-top: 10px;
      background-color: #ccc;
    }
  </style>
</head>

<body>
  <div class="post">

    <div class="user_status">
      <div class="user">
        <span>
          <?php
          foreach ($users as $user) {
            if ($user['id'] == $post['user_id']) echo $user['name'];
          }
          ?>
        </span>
        <span class="date">
          <?= $post['created_at'] ?>
        </span>
      </div>
      <span class="status">
        <?php
        foreach ($postStatus as $status) {
          if ($status['id'] == $post['post_status_id']) echo $status['type'];
        }
        ?>
      </span>
    </div>
    <h2 class="title"><?= $post['title'] ?></h2>
    <p class="body"><?= $post['body'] ?></p>
    <div class="comments_title" onclick="toggleComments(this)">
      <?php
      $i = 0;
      foreach ($comments as $comment) {
        if ($comment['post_id'] == $post['id']) {
          $i++;
        }
      }
      if ($i > 0) {
        echo "$i comments";
      }
      ?>
    </div>
    <div class="comments">
      <?php
      foreach ($comments as $comment) {
        if ($comment['post_id'] == $post['id']) {
          require 'components/comments.php';
        }
      }
      ?>
    </div>
    <div class="reaction">
      <div class="icon">
        <?php
        $Laugh = 0;
        foreach ($reactions as $reaction) {
          if ($reaction['post_id'] == $post['id'] && $reaction['reaction_type_id'] == 6) {
            $Laugh++;
          }
        }
        echo $Laugh;
        ?>
        <i class="fa-solid fa-face-grin-tears"></i>
      </div>
      <div class="icon">
        <?php
        $Sad = 0;
        foreach ($reactions as $reaction) {
          if ($reaction['post_id'] == $post['id'] && $reaction['reaction_type_id'] == 5) {
            $Sad++;
          }
        }
        echo $Sad;
        ?>
        <i class="fa-solid fa-face-sad-cry"></i>
      </div>
      <div class="icon">
        <?php
        $Happy = 0;
        foreach ($reactions as $reaction) {
          if ($reaction['post_id'] == $post['id'] && $reaction['reaction_type_id'] == 4) {
            $Happy++;
          }
        }
        echo $Happy;
        ?>
        <i class="fa-solid fa-face-laugh-beam"></i>
      </div>
      <div class="icon">
        <?php
        $Care = 0;
        foreach ($reactions as $reaction) {
          if ($reaction['post_id'] == $post['id'] && $reaction['reaction_type_id'] == 3) {
            $Care++;
          }
        }
        echo $Care;
        ?>
        <i class="fa-solid fa-face-kiss-wink-heart"></i>
      </div>
      <div class="icon" >
        <?php
        $Heart = 0;
        foreach ($reactions as $reaction) {
          if ($reaction['post_id'] == $post['id'] && $reaction['reaction_type_id'] == 2) {
            $Heart++;
          }
        }
        echo $Heart;
        ?>
        <i class="fa-solid fa-heart"></i>
      </div>
      <div class="icon" >
        <?php
        $Like = 0;
        foreach ($reactions as $reaction) {
          if ($reaction['post_id'] == $post['id'] && $reaction['reaction_type_id'] == 1) {
            $Like++;
          }
        }
        echo $Like;
        ?>
        <i class="fa-solid fa-thumbs-up"></i>
      </div>
    </div>


  </div>

  <script defer>
    function toggleComments(element) {
      const commentsSection = element.nextElementSibling;
      commentsSection.classList.toggle('visible');
    }
  </script>

</body>

</html>