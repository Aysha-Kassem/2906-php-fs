<?php

$db = new mysqli('localhost', 'root', '', '2906_posts_fs');

$qry = 'SELECT `p`.`id`,`title`,`body`,`p`.`created_at`, `type` FROM `flo_posts` AS `p` JOIN `flo_post_statuses` AS `ps` ON `ps`.`id` = `p`.`post_status_id`  WHERE `p`.`deleted_at` IS NULL;';

$res = $db->query($qry);

$posts = $res->fetch_all(MYSQLI_ASSOC);

// var_dump($posts);


// Tell the browser that the sent data is in JSON format
header('Content-Type: Application/json');

// Allow specific website to access this resource(DATA)
// header('Access-Control-Allow-Origin: http://127.0.0.1:5500');

// Allow any website to access this resource(DATA)
header('Access-Control-Allow-Origin: *');

// Convert the data to JSON string
$posts_json = json_encode($posts);


// Output the data
echo $posts_json;
