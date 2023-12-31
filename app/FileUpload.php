<?php
session_start();

// Login Required
require 'auth.php';
checkAuth();

// Script Ending Utility
require 'cleanup.php';

// Disable HTML error reporting
error_reporting(0);
ini_set('display_errors', 0);

//DEBUG
include 'debug.php';

// Check for valid user folder
$user = $_COOKIE['user'];
$user_dir = 'userfiles' . '/' . $user;
$makeNew = false;
if (file_exists($user_dir)) {
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
            fail('Failed to create folder for ' .$user .' - a conflicting filename exists.');
        }
        fail('Failed to create a folder for ' . $user . '.');
    }
}


// Upload the file!
if(isset($_FILES['file'])) {
    $file = $_FILES['file'];
    $filename = basename($_FILES['file']['name']);
    $upload_path = $user_dir . '/' . $filename;
    if(move_uploaded_file($_FILES['file']['tmp_name'], $upload_path)) {}
    else {
        fail('Error: failed to upload the file.');
    }
} else {
    fail('Error: bad input.');
}

done();