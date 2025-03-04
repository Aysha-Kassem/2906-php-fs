<style>
    .replies{
        padding: 0px 20px 20px 20px; 
        display: grid;
        gap: 20px;
    }
</style>
<div class="replies">
    <?php
foreach($replies as $reply){
    // dd($reply);
    if($reply['comment_id'] == $comment['id']){
        require 'reply_box.php';
    }
}
?>
</div>
