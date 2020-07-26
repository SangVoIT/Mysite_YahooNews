<?php 
if(isset($_POST['submit'])){
  echo "login";
  include('../config/DbFunction.php');
  $obj=new DbFunction();
  $_SESSION['login']=$_POST['id'];
  $obj->login($_POST['id'],$_POST['password']);
}
?>
<?php $title = 'Deatail'; include("../template/main.php");?>
<link rel="stylesheet" type="text/css" href="../css/home.css"/>
<link rel="stylesheet" type="text/css" href="../css/login.css"/>
<?php include("../template/header.php");?>
<br>
<div class="container_content">
  <h3 class="content_title">ログイン</h3>
  <div class="content_main">
    <form action="login.php" method="post">
      <div class="main_login">
        <label>Username: </label>
        <input type="text" class="username" placeholder="Enter Username" name="uname" required>
      </div>
      <div class="main_password">
        <label>Password: </label>
        <input type="password" class="password" placeholder="Enter Password" name="psw" required>
      </div>
      <div class="main_submit">
        <input type="submit" value="ログイン" id="login_btn">
        <label>
          <input type="checkbox" checked="checked" name="remember"> Remember me
        </label>
      </div>
    </form>
  </div>
</div>
<?php include("../template/footer.php");?>
<!--
container_content
content_title
content_main
main_login
main_password
main_submit
-->