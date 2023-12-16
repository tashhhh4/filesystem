<?php
function getFiles($dir) {
    $contents = scandir($dir);
    $output = array();
    foreach ($contents as $item) {
        if($item === '.' || $item === '..') {}
        else {
            array_push($output, $item);
        }
    }
    return $output;
}