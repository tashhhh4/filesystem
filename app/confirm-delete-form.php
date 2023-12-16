<p>Are you sure you want to delete <b><?php echo $filename; ?></b>?</p>
<form action="FileDelete.php" method="post">
  <input type="hidden" name="filename" value="<?php echo $filename; ?>">
  <input type="submit" value="Confirm">
</form>