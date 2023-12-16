<?php

// Set up error message
$errorMsg = '';

// Get Filename
$filename = '';
if(isset($_POST['filename'])) {
    $filename = $_POST['filename'];
} else {
    $errorMsg = 'Error: Bad input';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/files.css">
  <title>File Browser - Confirm Delete</title>
</head>
<body class="delete-page">
<h1>Confirm Delete</h1>
<?php
if($errorMsg) {
    echo '<p class="error-black">'.$errorMsg.'</p>';
} else {
    include 'confirm-delete-form.php';
}
?>

</body>
</html>