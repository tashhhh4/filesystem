<?php 
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
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/files.css">
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
    <h1>Add Files</h1>
    <section class="white-block add-files">
      stuff
    </section>

    <h1>My Files</h1>
    <section class="white-block my-files">
      <ul>
        <li>stuff</li>
        <li>stuff</li>
      </ul>
    </section>
  </div>
</body>
</html>