<?php
session_start();

require 'cleanup.php';

// Get filename
if(isset($_POST['filename'])) {
    $filename = $_POST['filename'];
} else {
    fail('Error: Bad input');
}

// Remove this filename from the system
$user = $_COOKIE['user'];
$delete_path = 'userfiles' . '/' . $user . '/' . $filename;

if(unlink($delete_path)) {}
else {
    fail('Error: Failed to delete the file.');
}

done();