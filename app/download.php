<?php
// Login Required
require 'auth.php';
checkAuth();

// Get filename
$filename = '';
if(isset($_POST['filename'])) {
    $filename = $_POST['filename'];
} else {
    $errorMsg = 'Error: Bad input';
}

// Build the file path
$user = $_COOKIE['user'];
$dl_path = 'userfiles/' . $user . '/' . $filename;

// Process download
if (file_exists($dl_path)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . $filename . '"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($dl_path));
    flush();
    readfile($dl_path);
    die();
} else {
    die();
}