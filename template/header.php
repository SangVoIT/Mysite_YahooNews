<?php
  // get Instance Database connection
  $obj=new DbFunction();
  $chk_first_load = 0;
  $chk_login = false;
  $rsAccountInfor = null;
  // ------------------- GET DATA BY NEWS_ID------------------- 
  // Check path parameter in URL
  if (isset($_GET['news_id'])){
    $chk_first_load = 1;
    // get list of news 
    $rsListnews = $obj->getNewsInfor( $_GET['news_id'], NULL, NULL, NULL);
  } 
  // ------------------- GET DATA BY NEWS_TYPE ------------------- 
  // Check path parameter in URL
  if (isset($_GET['news_type'])){
    $chk_first_load = 1;
    // get list of news 
    $rsListnews = $obj->getNewsInfor(NULL, $_GET['news_type'], NULL, NULL);
  } 

  // ------------------- GET DATA BY NEWS_SOURCE ------------------- 
  // Check path parameter in URL
  if (isset($_GET['news_source'])){
    $chk_first_load = 1;
    // get list of news 
    $rsListnews = $obj->getNewsInfor(NULL, NULL, $_GET['news_source'], NULL);
  } 
  
  // ------------------- GET DATA BY SEARCH_KEY ------------------- 
  // Check path parameter in URL
  if (isset($_POST['search_key'])){
    $chk_first_load = 1;
    // get list of news 
    $rsListnews = $obj->getNewsInfor(NULL, NULL, NULL, $_POST['search_key']);
  }

  session_start ();
  if (isset($_SESSION['login_id'])) {
    $chk_login = true;
    // Get account infor
    $rsAccountInfor = $obj->getAccountInfor($_SESSION['login_id']);
    $display_name = $rsAccountInfor->fetch_object()->display_name;
  }

  // ------------------- GET COMMON DATA ------------------- 
  if ($chk_first_load == 0) {
    // get list of news 
    $rsListnews = $obj->getNewsInfor(NULL, NULL, NULL, NULL);
  }

  // get list of newest news
  $rsListOfNewestNews = $obj->getNewsTitle(NULL, CN_newest_news_code, CN_ranking_news_code);

  // get list of most reading news
  $rsListOfReadingNews = $obj->getNewsTitle(NULL, CN_comment_news_code,CN_ranking_news_code);
  
  // get list of news type
  $rsListNewsType = $obj->getNewsType(NULL);
  
?>
</head>
<body>
<div class="container">
	<div class="container_header">
		<div class="header_icon">
      <div class="icon_image">
        <a href="home.php"><img class="page_image" src="../images/avatar_hacker.jpg" alt="hacker face" media="header_icon"></a>
      </div>
		</div>
		<div class="header_group">
		  <div class="group_empty">
		    
		  </div>
		  <div class="group_search">
		    <form action="home.php" method="post">
		      <label class="search_label" for="search_input">Search:</label>
		      <input type="text" id="search_key" name="search_key" placeholder="検索キーエントリ">
		      <input type="submit" value="検索" id="search_button">
		    </form>
		  </div>
		  <div class="group_category">
		    <?php while($res=$rsListNewsType->fetch_object()){?>  
		      <?php echo "<a href='home.php?news_type=$res->type_cd'>$res->type_name</a>"; ?>
		    <?php }?> 
		  </div>
		</div>
		<div class="header_account">
      <?php 
        if ($chk_login) {
          echo "<img class='login_avatar' src='../images/logined.png'>
                <a href='account/detail.php' class='login_link'>$display_name</a>";
        } else {
          echo "<img class='login_avatar' src='../images/nologin.jpg'>
            <a href='login.php' class='login_link'>ログイン</a>";
        }
      ?>
		</div>
	</div>