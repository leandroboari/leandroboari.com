<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include "./config.inc.php";
$routeName = isset($_GET["route"]) ? $_GET["route"] : "home";
$routePath = "./routes/$routeName.php";
$route = in_array($routeName, ["", "home", "portfolio", "contato"]) ? $routePath : "./routes/404.php";
include $route;