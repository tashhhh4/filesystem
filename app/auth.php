<?php
function checkAuth() {
    $auth = false;
    if(isset($_COOKIE['auth'])) {
        $auth = ($_COOKIE['auth'] === 'authorized!');
    }
    if ($auth === false) {
        // Redirect to login page
        header('Location: login.php');
    }
}
function getUser() {
    return $_COOKIE['user'];
}