<?php

spl_autoload_register(function($className) {

    $className = str_replace("\\", "/", $className);
    // var_dump($className);
    require_once("libraries/$className.php");

});