<div class="content_right">
  <div class="right_recent_news">
    <a href="access">アクセスランキング</a>
    <ul>
      <?php while($res=$rsListOfNewestNews->fetch_object()){?>   
        <?php echo "<li> <a href='detail.php?news_id=$res->id'>$res->title</a></li>"; ?>
      <?php }?> 
    </ul>
  </div>
  <div class="right_ranked_news">
    
    <a href="comment">コメントランキング</a>
    <ul>
      <?php while($res=$rsListOfReadingNews->fetch_object()){?>   
        <?php echo "<li> <a href='detail.php?news_id=$res->id'>$res->title</a></li>"; ?>
      <?php }?> 
    </ul>
  </div>
</div>