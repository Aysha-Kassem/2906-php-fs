<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        .reply {
            padding: 5px 20px;
            border-bottom: 0.5px solid #ccc;
        }



        .reply_user {
            font-size: 10px;
            display: flex;
            align-items: center;
            justify-content: space-between;

        }
    </style>
</head>

<body>
    <div class="reply">

        <div class="reply_user">
            <span>
                <?php
                foreach ($users as $user) {
                    if ($user['id'] == $reply['user_id']) echo $user['name'];
                }
                ?>
            </span>
            <span class="date">
                <?= $reply['created_at'] ?>
            </span>
        </div>
        <p><?= $reply['reply'] ?></p>
    </div>

</body>

</html>