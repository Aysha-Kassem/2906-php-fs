<style>
    .card {
        border: solid 1px black;
        border-radius: 20px;
        padding: 20px;
        display: grid;
        gap: 20px;
    }
</style>

<div class="card">
    <?php
    foreach ($comments as $comment):
        if ($comment['post_id'] == $post['id']) {
            require 'comment_box.php';
        }
    endforeach;

    ?>
</div>