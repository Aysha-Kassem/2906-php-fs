<?php $comment_replys = Reply::all(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>comments</title>
    <style>
        .comment {
            padding: 5px 10px;
            border-bottom: 0.5px solid #ccc;
        }

        .comment_user {
            font-size: 10px;
            display: flex;
            align-items: center;
            justify-content: space-between;

        }

        .reply_title {
            font-size: smaller;
            border-bottom: 0.5px solid black;
            display: inline-block;
            color: blue;
        }

        .replays {
            display: none;
            gap: 10px;
            padding-top: 20px;

        }

        .replays.visible {
            display: grid;
        }
    </style>
</head>

<body>
    <div class="comment">
        <div class="comment_user">
            <span>
                <?php
                foreach ($users as $user) {
                    if ($user['id'] == $comment['user_id']) echo $user['name'];
                }
                ?>
            </span>
            <span class="date">
                <?= $comment['created_at'] ?>
            </span>
        </div>
        <p><?= $comment['comment'] ?></p>
        <div class="reply_title" onclick="toggleReplays(this);">
            <?php
            $rep = 0;
            foreach ($comment_replys as $reply) {
                if ($reply['comment_id'] == $comment['id']) {
                    $rep++;
                }
            }
            echo $rep > 0 ? "$rep replies": "";
            ?>

        </div>
        <div class="replays">
            <?php
            foreach ($comment_replys as $reply) {
                if ($reply['comment_id'] == $comment['id']) {
                    require "components/reply.php";
                }
            }
            ?>
        </div>

    </div>

    <script defer>
        function toggleReplays(element) {
            const ReplaysSection = element.nextElementSibling;
            ReplaysSection.classList.toggle('visible');
        }
    </script>
</body>

</html>