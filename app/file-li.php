<li>
  <span class="file"><?php echo $file; ?></span>

  <span class="download">
    <form action="download.php" method="post">
      <input type="hidden" name="filename" value="<?php echo $file; ?>">
      <span class="i-wrapper"><i class="icon-download"></i>
      <input type="submit" value="S">
    </span>
    </form>
  </span>

  <span class="delete">
    <form action="delete.php" method="post">
      <input type="hidden" name="filename" value="<?php echo $file; ?>">
      <span class="i-wrapper"><i class="icon-bin"></i>
      <input type="submit" value="S"></span>
    
    </form>
  </span>

</li>