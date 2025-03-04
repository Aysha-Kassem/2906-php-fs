<style>
    .auther {
        font-size: x-small;
        display: flex;
        justify-content: space-between;
        margin-top: 5px;
    }
    .comment{
        border-bottom: 0.5px solid black;
        padding: 10px;
    }
    h5{
        border-bottom: 0.5px solid black;
        display: inline-block;
    }
</style>


<div class="comment">
    <div class="auther">
        <span>
            <?php
            foreach ($users as $user) {
                if ($user['id'] == $comment['user_id']) {
                    echo $user['name'];
                }
            }
            ?>
        </span>
        <span><?php echo $comment['created_at']; ?></span>
    </div>
    <p><?php echo $comment['comment']; ?></p>
    <div>
        <h5>Reply:</h5>
        <?php require 'replies.php'; ?>
    </div>

</div>