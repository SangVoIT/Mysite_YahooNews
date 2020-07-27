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

  // get list of news type
  $rsListNewsType = $obj->getNewsType(NULL);

  // get list of news source
  $rsListNewsSource = $obj->getNewsSource(NULL);

  // 
  if(isset($_POST['create_btn'])){
    $obj->createNewsInfor(
      $_POST['news_title'],
      $_POST['news_type'],
      $_POST['news_source'],
      $_POST['news_content'],
      $_SESSION['login_id']);
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
        <table style="width:100%">
          <tr class="create_title">
            <td>タイトル: </td>
            <td><input type="text" name="news_title"></td>
          </tr>
          <tr class="create_type">
            <td>タイプ:</td>
            <td>
              <select name="news_type">
                <?php while($res=$rsListNewsType->fetch_object()){?>  
                  <?php echo "<option value='$res->type_cd'>$res->type_name</option>"; ?>
                <?php }?> 
              </select>
            </td>
          </tr>
          <tr class="create_source">
            <td>ソース: </td>
            <td>
              <select name="news_source">
                <?php while($res=$rsListNewsSource->fetch_object()){?>  
                  <?php echo "<option value='$res->source_cd'>$res->source_name</option>"; ?>
                <?php }?> 
              </select>
            </td>
          </tr>
          <tr>
            <td>内容: </td>
            <td>
              <textarea type="text" name="news_content"></textarea>
            </td>
          </tr>
        </table>
        <div class="submit_btn">
          <input type="submit" value="投稿" name="create_btn">
        </div>
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