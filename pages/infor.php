<?php $title = 'Detail'; include("../template/main.php"); ?>
<link rel="stylesheet" type="text/css" href="../css/infor.css"/>
<!-- import jquery -->
<script type="text/javascript" src="../js/infor.js"></script>
<?php include("../template/header.php");?>
<?php 
  echo "come there";
  if (assert($_GET['index'])) {
    echo "come there";
    $index = $_GET['index'];
    echo '<script type="text/javascript">',
     'myScrollView('.$index.');',
     '</script>';

  }
?>
  <br>
  <div class="container_content">
    <div class="main" id="privacy">
      <h2>Section 1</h2>
      <p>Click on the link to see the "smooth" scrolling effect.</p>
      <p>Click on the link to see the "smooth" scrolling effect.</p>
      <p>Click on the link to see the "smooth" scrolling effect.</p>
      <p>Click on the link to see the "smooth" scrolling effect.</p>
      <p>Click on the link to see the "smooth" scrolling effect.</p>
      <a href="#help">Click Me to Smooth Scroll to Section 2 Below</a>
      <p>Note: Remove the scroll-behavior property to remove smooth scrolling.</p>
    </div>

    <div class="main" id="help">
      <h2>Section 2</h2>
      <p>Click on the link to see the "smooth" scrolling effect.</p>
      <p>Click on the link to see the "smooth" scrolling effect.</p>
      <p>Click on the link to see the "smooth" scrolling effect.</p>
      <p>Click on the link to see the "smooth" scrolling effect.</p>
      <p>Click on the link to see the "smooth" scrolling effect.</p>
      <p>Click on the link to see the "smooth" scrolling effect.</p>
      <a href="#privacy">Click Me to Smooth Scroll to Section 1 Above</a>
    </div>
    <div class="main" id="ask">
      <h2>Section 2</h2>
      <p>Click on the link to see the "smooth" scrolling effect.</p>
      <p>Click on the link to see the "smooth" scrolling effect.</p>
      <p>Click on the link to see the "smooth" scrolling effect.</p>
      <p>Click on the link to see the "smooth" scrolling effect.</p>
      <p>Click on the link to see the "smooth" scrolling effect.</p>
      <p>Click on the link to see the "smooth" scrolling effect.</p>
      <a href="#privacy">Click Me to Smooth Scroll to Section 1 Above</a>
    </div>
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