<?php

// DEBUG
include 'debug.php';

logwrite('At top of login page.');

// Define error messages
$loginError = '';

$valid_user = 'user1';
$valid_password = 'password1';

// Check form
if(isset($_POST['username'])) { $username = $_POST['username']; logwrite('Username was set to ' . $username);}
if(isset($_POST['password'])) { $password = $_POST['password']; }

if(isset($username) AND isset($password)) {
    if ($username === $valid_user AND $password === $valid_password) {    
        // Login User
        setcookie('auth', 'authorized!', time()+7200, '/');
        setcookie('user', $username, time()+7200, '/');
        logwrite('User was successfully logged in.');
        header('Location: index.php');

    } else {
        // Report bad login
        $loginError = 'Username or password provided was incorrect. Please try again.';
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
    <p class="login-error"><?php echo $loginError; ?></p>
    <p class="login-prompt">Please log in to access the file system.</p>
    <label for="username_input">Username:</label>
    <input id="username_input" name="username" type="text" required>
    <label for="password_input">Password:</label>
    <input id="password_input" name="password" type="password" required>
    <input type="submit" value="Login">
  </form>
</body>
</html>