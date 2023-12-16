<?php
function logwrite($msg) {
    $STDOUT = fopen('php://stdout', 'w');
    fwrite($STDOUT, $msg . "\n");
}
function logerror($msg) {
    $STDERR = fopen('php://stderr', 'w');
    fwrite($STDERR, $msg . "\n");
}