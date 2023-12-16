<?php
// Delete cookies which provide authorization
setcookie('auth', '', time()-7200);
setcookie('user', '', time()-7200);

// Redirect to the login page
header('Location: login.php');
?>