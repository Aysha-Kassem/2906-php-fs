<?php
require_once 'load.php';
require_once 'fetch_all.php';
// $posts = Post::all();
// $count = Post::count();
// dd($posts);
?>

<style>
    .pages {
        display: flex;
        justify-content: space-evenly;
    }

    a {
        text-decoration: none;
        color: black;
        margin-right: 10px;
    }
</style>

<div class="posts">
    <?php
    foreach ($posts as $post) {        
        require 'components/templates/card.php';
    }
    ?>
</div>