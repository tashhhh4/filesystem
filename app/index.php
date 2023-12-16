<?php
session_start();

// Check Auth
$auth = false;
if(isset($_COOKIE['auth'])) {
    $auth = ($_COOKIE['auth'] === 'authorized!');
}
if ($auth) {
    $user = $_COOKIE['user'];       
} else {
    // Redirect to login page
    header('Location: login.php');
}

// Check session messages
$errorStart = '<div class="message error">';
$errorEnd = '</div>';
$uploadMsg = '';
$filesMsg = '';

if(isset($_SESSION['uploaderr'])) {
    $uploadMsg = $errorStart . $_SESSION['uploaderr'] . $errorEnd;
    unset($_SESSION['uploaderr']);
}

// Get Files
require 'FileFunctions.php';
$files = getFiles('userfiles/'.$user);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/files.css">
  <link rel="stylesheet" href="css/icomoon/style.css">
  <title>File Browser - My Files: <?php echo $user; ?></title>
</head>
<body>
  <div class="top-bar">
    <div></div>
    <form class="logout-form" action="LogoutUser.php">
      <span class="logout-label">Logged in as:</span> <span class="logout-username"><?php echo $user; ?></span><input type="submit" value="Logout">
    </form>
  </div>

  <div class="width">
    <div class="h1-feedback-block">
      <h1>Add Files</h1>
      <span class="feedback"><?php echo $uploadMsg; ?></span>
    </div>
    <section class="white-block add-files">
      <form enctype="multipart/form-data" action="FileUpload.php" method="post">
        <input name="file" type="file" required>
        <input id="upload_button" type="submit" value="Upload">
      </form>
    </section>

    <h1>My Files</h1>
    <section class="white-block my-files">
      <ul>
        <?php
        $i = 0;
        foreach ($files as $file) {
          include 'file-li.php';
          $i++;
        }
        ?>
      </ul>
    </section>
  </div>
</body>
</html>