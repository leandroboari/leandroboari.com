<?php
$routeName = isset($_GET["route"]) ? $_GET["route"] : "home";
$routePath = "./routes/$routeName.php";
$route = file_exists($routePath) ? $routePath : "./routes/404.php";
include $route;