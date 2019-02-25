<?php
session_start();
require_once "functions.php";
$APP_ROOT = "/E-commerce-new/Admin/";
$FILES_ROOT = '/E-commerce-new/files/';
$ASSET_URL = $APP_ROOT . 'assets/';
$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
define("DEFAULT_LANGUAGE", "en");
if (isset($_GET['lang']) || !empty($_GET['lang'])) {
    $_SESSION['lang'] = $_GET['lang'];
}
if (!isset($_SESSION['lang']) || empty($_SESSION['lang'])) {
    $_SESSION['lang'] = DEFAULT_LANGUAGE;

}
setcookie('language', DEFAULT_LANGUAGE);
$current_lang = $_SESSION['lang'];
require_once "page_names.php";
require_once "enum.php";
if ($current_lang == 'en')
    require_once "lang/en.php";
else
    require_once "lang/ar.php";
require_once "authorization.php";
require_once "pages_includes.php";








