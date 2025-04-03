<h3><?= $post['title']; ?></h3>
<p><?= $post['body']; ?></p>
<h6><?= date('Y-m-d', strtotime($post['created_at'])); ?></h6>
<hr>