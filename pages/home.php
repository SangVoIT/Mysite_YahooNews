<?php $title = 'HOME'; include("../template/main.php");?>
<link rel="stylesheet" type="text/css" href="../css/home.css"/>
<?php include("../template/header.php");?>
  <br>
  <div class="container_content">
    <!-- inner content -->
    <div class="content_left">
      <div class="content_createpost">
        <form action="create.php" method="post">
          <input type="submit" class="createpost_btn" name="今すぐ投稿" value="insert" />
        </form>
      </div>
      <div class="content_grid">
        <?php 
        $image_path = "";
        while($res=$rsListnews->fetch_object()){?>
        <div class="grid_detail">
          <div class="detail_infor">
            <div class="infor_avatar">
             <?php 
             $image_path = CN_IMAGE_PATH.$res->image;
             echo "<img class='news_image' src='$image_path' alt='News_image' media='infor_avatar'>"; ?>
            </div>
          </div>
          <div class="detail_news">
            <div class="news_title">
              <?php echo "<a href='detail.php?news_id=$res->id'>$res->title</a>"; ?>
            </div>
            <div class="news_source">
              <?php echo "<a href='home.php?news_source=$res->source_cd'>$res->source_name</a>"; ?>
            </div>
            <div class="infor_name">
              <?php echo htmlentities($res->type_name);?>
            </div>
          </div>
          <!-- <div class="detail_vote">
            <div class="vote_up">
              up
            </div>
            <div class="vote_rank">
              <?php echo htmlentities($res->view_number);?>
            </div>
            <div class="vote_down">
              down
            </div>
          </div> -->
        </div>
        <?php }?> 
      </div>

      <!-- <div class="left_paging">
        [1][<][>][>>]
      </div>-->
    </div>
    <?php include("../template/right_content.php");?>
  </div>
  <?php include("../template/footer.php");?>

<!-- File structure
container
  container_header 
    header_icon
    header_group
      group_empty
      group_search
        search_label
        search_input
        search_button
      group_category
    header_account
      account_login
        login_link
  container_content
    content_left
      content_createpost
        createpost_btn
      content_grid
        grid_detail
          detail_infor
            infor_avatar
          detail_news
            news_title
            news_source
            infor_name
          /* detail_vote
          /*   vote_up
          /*   vote_rank
          /*   vote_down
      left_paging
    content_right
      right_recent_news
      right_ranked_news
  container_footer
    footer_address
    footer_copyright
-->