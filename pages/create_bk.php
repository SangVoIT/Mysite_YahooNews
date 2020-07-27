<?php $title = 'Deatail'; include("../template/main.php");?>
<link rel="stylesheet" type="text/css" href="../css/create.css"/>
<?php include("../template/header.php");?>
<?php 
if (!isset($_SESSION['login_id'])) {
  // If didn't login, location to login form
  header('location:login.php');
} else {
  // get Instance Database connection
  $obj=new DbFunction();
  // Get account infor
  $rsAccountInfor = $obj->getAccountInfor($_SESSION['login_id']);
  $objAccount = $rsAccountInfor->fetch_object();

  // get list of news type
  $rsListNewsType = $obj->getNewsType(NULL);

  // get list of news source
  $rsListNewsSource = $obj->getNewsSource(NULL);

  // 
  if(isset($_POST['create_btn'])){
    echo "query";
    $obj->createNewsInfor(
      $_POST['news_title'],
      $_POST['news_tile'],
      $_POST['news_source'],
      $_POST['news_content'],
      $objAccount->login_id);
    echo "query";
  }
}
?>
<br>
<div class="container_content">
  <!-- inner content -->
  <div class="content_left">
    <h3 class="left_title">
      ニュース投稿
    </h3>
    <div class="left_create">
      <form action="create.php" method="post">
        <div class="create_title">
          <label class="label_text">タイトル: </label>
          <input type="text" name="news_title">
        </div>
        <div class="create_type">
          <label class="label_text">タイプ: </label>
          <select name="news_tile">
            <?php while($res=$rsListNewsType->fetch_object()){?>  
              <?php echo "<option value='$res->type_cd'>$res->type_name</option>"; ?>
            <?php }?> 
          </select>
        </div>
        <div class="create_source">
          <label class="label_text">ソース: </label>
          <select name="news_source">
            <?php while($res=$rsListNewsSource->fetch_object()){?>  
              <?php echo "<option value='$res->source_cd'>$res->source_name</option>"; ?>
            <?php }?> 
          </select>
        </div>
        <div class="create_content">
          <label class="label_text">内容: </label>
          <textarea type="text" name="news_content"></textarea>
        </div>
        <input type="submit" value="投稿" name="create_btn">
      </form>
    </div>
  </div>
  <?php include("../template/right_content.php");?>
</div>
<?php include("../template/footer.php");?>

<!-- 
content_left
  left_title
  left_create
  create_title
  create_type
  create_source
  create_content
-->