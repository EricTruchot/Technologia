<?php


if (!isset($_SESSION)) {
    session_start();
}

require_once('libraries/autoload.php');


\Application::process(); //

// $controller = new \Controllers\Articles();
// $controller->index();