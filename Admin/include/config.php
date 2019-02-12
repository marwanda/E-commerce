<?php
session_start();
require_once "functions.php";
$APP_ROOT = "E-commerce/Admin";
$FILES_ROOT = $APP_ROOT.'E-commerce/files/';
$ASSET_URL = $APP_ROOT.'E-commerce/Admin/assets/';
$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
define("DEFAULT_LANGUAGE", "en");
$_SESSION['lang'] = DEFAULT_LANGUAGE;
setcookie('language', DEFAULT_LANGUAGE);
$current_lang = $_SESSION['lang'];


require_once "page_names.php";
require_once "enum.php";
require_once "lang/en.php";
require_once "lang/ar.php";
require_once "authorization.php";









