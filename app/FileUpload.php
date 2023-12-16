<?php
session_start();

// Clean-up functions
function done() {
    header('Location: index.php');
    exit();
}
function fail($msg) {
    logwrite('Inside the fail() function.');
    $_SESSION['uploaderr'] = $msg;
    done();
}

// Disable HTML error reporting
error_reporting(0);
ini_set('display_errors', 0);

//DEBUG
include 'debug.php';

// Check for valid user folder
$user_dir = 'userfiles' . '/' . 'admin';
$makeNew = false;
if (file_exists($user_dir)) {
    logwrite("We found that the file exists.");
    if(is_dir($user_dir)) {
    } else {
        $makeNew = true;
    }
} else {
    $makeNew = true;
}

// Create the user's folder
if($makeNew == true) {
    if(mkdir($user_dir, 0777, true)) {}
    else {
        if(file_exists($user_dir)) {
            logwrite("We checked again and found that the file exists.");
            fail('Failed to create folder for admin - a conflicting filename exists.');
        }
        fail('Failed to create a folder for admin.');
    }
}

done();