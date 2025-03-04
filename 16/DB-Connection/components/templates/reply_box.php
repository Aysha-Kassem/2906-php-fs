<style>
    .auther {
        font-size: x-small;
        display: flex;
        justify-content: space-between;
        margin-top: 5px;
    }
    .reply{
        display: grid;
        gap: 10px;
    }
</style>

<div class="reply">
    <div class="auther">
        <span>
            <?php
            foreach ($users as $user) {
                if ($user['id'] == $reply['user_id']) {
                    echo $user['name'];
                }
            }
            ?>
        </span>
        <span><?php echo $reply['created_at']; ?></span>
    </div>
    <div><?= $reply['reply']; ?></div>

</div>



<!-- <?php dump($reply); ?> -->