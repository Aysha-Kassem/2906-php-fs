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

<div>
  <div class="pages">
    <a href="/">Back Home</a>
  </div>
  <h1 style="text-align: center;">Posts</h1>
  <div style="display: flex; flex-wrap: wrap;">
    <?php
    foreach ($posts as $post) {
      require 'card.php';
    }
    ?>
  </div>
</div>