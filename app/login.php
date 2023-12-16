<?php

include 'debug.php';

logwrite("Test message");
logerror("Test Error message!");

$valid_user = 'user1';
$valid_password = 'password1';

// Login User
if(isset($_POST['username'])) { $username = $_POST['username']; }
if(isset($_POST['password'])) { $password = $_POST['password']; }
if(isset($username) AND isset($password)) {
    if ($username === $valid_user AND $password === $valid_password) {
        setcookie('auth', 'authorized!', time()+7200, '/');
        setcookie('user', $username, time()+7200, '/');
        echo ('user was successfully logged in.');
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File System - Please Log In</title>
</head>
<body>
  <form class="login-form" action="login.php" method="post">
    <p>Please log in to access the file system.</p>
    <label for="username_input">Username:</label>
    <input id="username_input" type="text" required>
    <label for="password_input">Password:</label>
    <input id="username_input" type="password" required>
    <input type="submit" value="Login">
  </form>
</body>
</html>