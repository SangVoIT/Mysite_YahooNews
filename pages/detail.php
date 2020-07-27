<?php $title = 'Detail'; include("../template/main.php");?>
<link rel="stylesheet" type="text/css" href="../css/detail.css"/>
<?php include("../template/header.php");?>
  <br>
  <div class="container_content">
    <!-- inner content -->
    <div class="content_left">
      <div class="left_content">
        <?php while($res=$rsListnews->fetch_object()){?>  
        <div class="content_title">
          <?php echo "$res->title"; ?>
        </div>
        <div class="content_infor">
          <div class="infor_date">
            <?php if($res->update_date != NULL) {
              echo "$res->update_date"; 
            } else {
              echo "$res->create_date"; 
            } ?>
          </div>
          <div class="infor_viewcomment">
            <?php echo "$res->view_number"; ?></div>
          <div class="infor_source">
          <?php echo "<a href='home.php?news_type=$res->type_cd'>$res->type_name</a>"; ?>
          </div>
        </div>
        <div class="content_main">
          <div class="main_image">
            <img class="avatar" src="../images/avatar_hacker.jpg" alt="hacker face" media="header_icon">
          </div>
          <p class="main_content"><?php echo "    $res->cotent"; ?></p>
        </div>
        <?php 
          $type_cd = $res->type_cd;
          $source_cd = $res->source_cd;
          echo "$type_cd";
          echo "$source_cd";
        ?>
        <?php }?> 
      </div>
      <br>
      <div class="left_suggest">
        <?php 
          // get list of newest news
          $rsListOfRelatedNews = $obj->getRelatedNews($type_cd, $source_cd, CN_related_news_code);
        ?>
        <?php 
        $image_path = "";
        while($res=$rsListOfRelatedNews->fetch_object()){?>  
        <div class="suggest_block">
          <div class="block_image">
             <?php 
             $image_path = CN_IMAGE_PATH.$res->image;
             echo "<img class='news_image' src='$image_path' alt='News_image' media='infor_avatar'>"; ?>
          </div>
          <div class="block_title">
            <?php echo "<a href='detail.php?news_id=$res->id'>$res->title</a>"; ?>
          </div>
          <div class="block_source">
            <?php echo "<a href='home.php?news_type=$res->type_cd'>$res->type_name</a>"; ?>
          </div>
          <div class="block_date">
            <?php if($res->update_date != NULL) {
              echo "$res->update_date"; 
            } else {
              echo "$res->create_date"; 
            } ?>
          </div>
        </div>
        <?php }?> 
      </div>
      <br>
      <div class="left_coment">
        <div class="comment_count">view_number
        <!--<?php echo "$res->view_number"; ?>-->
        </div>
        <div class="comment_list">comment_list</div>
      </div>
    </div>
    <?php include("../template/right_content.php");?>
  </div>
  <?php include("../template/footer.php");?>

<!-- 
content_left
left_content
  content_title
  content_infor
    infor_date
    infor_viewcomment
    infor_source
  content_main
    main_image
    main_content
  content_comment
    comment_count
    comment_list
left_suggest
  suggest_block
  block_image
  block_title
  block_source
  block_date
-->