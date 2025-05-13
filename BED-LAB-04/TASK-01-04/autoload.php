<?php

function autoload($class_name) {
    $file = __DIR__ . '/' . str_replace('\\', '/', $class_name) . '.php';
    if (file_exists($file)) {
        include $file;
    }
}

spl_autoload_register('autoload');
?>
