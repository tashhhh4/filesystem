<?php
function checkAuth() {
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
}