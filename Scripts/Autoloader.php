<?php

function my_autoloader($class) {
    $class = str_replace("_", "/", $class);
    include 'Classes/' . $class . '.php';
}

spl_autoload_register('my_autoloader');


