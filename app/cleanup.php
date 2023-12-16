<?php
// Clean-up functions
function done() {
    header('Location: index.php');
    exit();
}
function fail($msg) {
    $_SESSION['uploaderr'] = $msg;
    done();
}