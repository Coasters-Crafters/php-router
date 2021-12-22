<?php
error_reporting(E_ERROR | E_PARSE);

if (!isset($dir)) {
    $dir = "../";
}

require_once($dir."/_inc/config.inc.php");
require_once($dir."/_inc/pages.inc.php");

$pages = new Pages();

$db = mysqli_connect($config['sql_host'], $config['sql_username'], $config['sql_password'], $config['sql_database']);

$isRefer = strpos($_SERVER['HTTP_REFERER'], "domain.com");
$isPost = ($_SERVER['REQUEST_METHOD'] === 'POST');

if (mysqli_connect_error()) {
    die(mysqli_connect_error());
}
?>