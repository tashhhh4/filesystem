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

Hello this is the Index Page

You need to be logged in to see this stuff.