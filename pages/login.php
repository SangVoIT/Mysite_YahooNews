<?php $title = 'Login'; include("../template/main.php");?>
<link rel="stylesheet" type="text/css" href="../css/home.css"/>
<link rel="stylesheet" type="text/css" href="../css/login.css"/>
<?php include("../template/header.php");?>
<?php 
if(isset($_POST['login_id'])){
  session_start ();
  $obj=new DbFunction();
  $_SESSION['login_id']=$_POST['login_id'];
  $obj->checkLogin($_POST['login_id'],$_POST['password']);
}
?>
<br>
<div class="container_content">
  <h3 class="content_title">ログイン</h3>
  <div class="content_main">
    <form action="login.php" method="post">
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tbody class="main_table">
        <tr>
          <td class="td_label">
            <label for="login_id">メールアドレス:</label>
          </td>
          <td class="td_input">
            <input type="text" name="login_id" required>
          </td>
        </tr>
        <tr>
          <td class="td_label">
            <label for="password">パスワード:</label>
          </td>
          <td class="td_input">
            <input type="password" name="password" required>
          </td>
        </tr>
      </tbody>
    </table>
    <div>
      <a href="reminder.php">パスワードをお忘れの方</a>
      <input type="submit" value="ログイン">
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