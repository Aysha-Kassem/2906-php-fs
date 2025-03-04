<style>
    .post {
        padding: 40px;
        border-bottom: 1px solid black;
    }

    .post_statuses {
        font-weight: bold;
        font-size: small;
        background-color:wheat;
        padding: 5px;
        border-radius: 50%;
    }

    .reaction {
        display: flex;
        justify-content: space-evenly;
        gap: 20px;
        padding: 50px 0px 0px 0px;
    }
    h2 {
        border-bottom: solid 1px black;
    }
</style>

<!-- card of post -->
<div class="post">
    <span class="post_statuses">
        <?php
        foreach ($post_statuses as $status) {
            if ($status['id'] == $post['post_status_id']) echo $status['type'];
        }
        ?>
    </span>
    <h2><?= $post['title']; ?></h2>
    <div><?= $post['body']; ?></div>
    <div>
        <h5>comments:</h5>
        <?php require 'comment_card.php'; ?>
    </div>
    <div class="reaction">
        <?php
        // dd($reaction_types);
        foreach ($reaction_types as $reaction_type) echo '<span>' . $reaction_type['type'] . '</span>';
        ?>
    </div>
</div>