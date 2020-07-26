<?php
  include('../config/DbFunction.php');
  include('../config/Constant.php');
  // get Instance Database connection
  $obj=new DbFunction();

  $chk_first_load = 0;
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
		  <img class="avatar" src="../images/avatar_hacker.jpg" alt="hacker face" media="header_icon">
		</div>
		<div class="header_group">
		  <div class="group_empty">
		    
		  </div>
		  <div class="group_search">
		    <form action="home.php" method="post">
		      <label class="search_label" for="search_input">Search:</label>
		      <input type="text" id="search_key" name="search_key">
		      <input type="submit" value="Submit" id="search_button">
		    </form>
		  </div>
		  <div class="group_category">
		    <?php while($res=$rsListNewsType->fetch_object()){?>  
		      <?php echo "<a href='home.php?news_type=$res->type_cd'>$res->type_name</a>"; ?>
		    <?php }?> 
		  </div>
		</div>
		<div class="header_account">
		  <div class="account_login">
		    <!-- <a href="login.php" class="login_link">ログイン</a> -->
		    <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button>
		    <div id="id01" class="modal">
	  
			<form class="modal-content animate" action="login.php" method="post">
				<div class="imgcontainer">
				  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
				  <img src="../images/logined.png" alt="Avatar" class="form_avatar">
				</div>

				<div class="container">
				  <label for="uname"><b>Username</b></label>
				  <input type="text" class="username" placeholder="Enter Username" name="uname" required>

				  <label for="psw"><b>Password</b></label>
				  <input type="password" class="password" placeholder="Enter Password" name="psw" required>
				    
				  <button type="submit">Login</button>
				  <label>
				    <input type="checkbox" checked="checked" name="remember"> Remember me
				  </label>
				</div>

				<div class="form_container" style="background-color:#f1f1f1">
				  <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
				  <span class="psw">Forgot <a href="#">password?</a></span>
				</div>
			</form>
			</div>
		  </div>
		</div>
	</div>