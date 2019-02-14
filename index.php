<?php
//$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
////header('Location: include/pages/home.php');
//var_dump($actual_link);
//var_dump($_GET['page']);
//?>

<?php
require_once "include/config.php";
require_once "include/layout/header.php";
require_once "include/pages/{$page}.php";
require_once "include/layout/footer.php";
//test
//hi man
?>













