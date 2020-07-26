<?php 
if(isset($_POST['submit'])){
  include('../config/DbFunction.php');
  $obj=new DbFunction();
  // $obj->login($_POST['login_id'],$_POST['password']);
  // $obj->login($_POST['login_id'],$_POST['password']);
}
?>
<?php $title = 'Deatail'; include("../template/main.php");?>
<link rel="stylesheet" type="text/css" href="../css/create.css"/>
<?php include("../template/header.php");?>
  <br>
  <div class="container_content">
    <!-- inner content -->
    <div class="content_left">
      <div class="left_title">
        ニュース投稿
      </div>
      <div class="left_create">
        <form action="create.php" method="post">
          <div class="create_title">
            <label>タイトル</label>
            <input type="text" name="">
          </div>
          <div class="create_type">
            <label>タイプ</label>
            <select name="type_cd">
              <option value="volvo">Volvo</option>
              <option value="saab">Saab</option>
              <option value="vw">VW</option>
              <option value="audi" selected>Audi</option>
            </select>
          </div>
          <div class="create_source">
            <label>ソース</label>
            <select name="source_cd">
              <option value="volvo">Volvo</option>
              <option value="saab">Saab</option>
              <option value="vw">VW</option>
              <option value="audi" selected>Audi</option>
            </select>
          </div>
          <div class="create_content">
            <label>内容</label>
            <input type="text" name="content">
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
  create_date
  create_type
  create_source
  create_content
-->