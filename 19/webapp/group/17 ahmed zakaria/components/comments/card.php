<div class="comments-container">

  <ul id="comments-list" class="comments-list">
    <li>
      <div class="comment-main-level">

        <div class="comment-box">
          <div class="comment-head">
            <h6 class="comment-name by-author"><a href="#"><?= $comments['name']; ?></a></h6>
            <span>20 minutes ago</span>
            <i class="fa fa-reply"></i>
            <i class="fa fa-heart"></i>
          </div>
          <div class="comment-content">
            <?= $comments['comment']; ?>
          </div>
        </div>
      </div>
      <!-- replies -->
      <!-- <ul class="comments-list reply-list">
                    <li>



                        <div class="comment-box">
                            <div class="comment-head">
                                <h6 class="comment-name"><a href="#">Lorena Rojero</a></h6>
                                <span>10 minutes ago</span>
                                <i class="fa fa-reply"></i>
                                <i class="fa fa-heart"></i>
                            </div>
                            <div class="comment-content">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit omnis animi et iure
                                laudantium vitae, praesentium optio, sapiente distinctio illo?
                            </div>
                        </div>
                    </li>


                </ul> -->
    </li>


  </ul>
</div>
