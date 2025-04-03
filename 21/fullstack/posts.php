<?php

$db = new mysqli('localhost', 'root', '', '2906_posts_fs');

$qry = 'SELECT `p`.`id`,`title`,`body`,`p`.`created_at`, `type` FROM `flo_posts` AS `p` JOIN `flo_post_statuses` AS `ps` ON `ps`.`id` = `p`.`post_status_id`  WHERE `p`.`deleted_at` IS NULL;';

$res = $db->query($qry);

$posts = $res->fetch_all(MYSQLI_ASSOC);


foreach ($posts as $post) {
    require 'components/post.php';
}

// Output the data
// var_dump($posts);
