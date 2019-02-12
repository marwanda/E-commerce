<?php

$standalone_pages = array(
    $pages['404'],
    $pages['index'],

);

$User_pages = array_merge(
    $standalone_pages,
    array(
        $pages['home'],
        $pages['profile'],
        $pages['companies'],
        $pages['about'],
        $pages['orders'],
        $pages['verification'],
        $pages['register'],
        $pages['cart'],
        $pages['news-details'],
        $pages['news-list'],
        $pages['offers-form'],
        $pages['order-details'],
        $pages['product-details'],
        $pages['products-list'],
        $pages['project-form'],
    )

);

$Guest_User_pages = array_merge(
    $standalone_pages,
    array(
        $pages['home'],
        $pages['companies'],
        $pages['about'],
        $pages['verification'],
        $pages['register'],
        $pages['news-details'],
        $pages['news-list'],
        $pages['offers-form'],
        $pages['product-details'],
        $pages['products-list'],
        $pages['project-form'],
    )

);

if (isset($_SESSION['role']) && $_SESSION['role'] == 'user') {

    $current_role_pages = $User_pages;
}

//$current_role_pages = $admin_pages;

$page = isset($_GET['page']) ? $_GET['page'] : null;

//$page = empty($page) ? 'home' : make_safe($page);

$page = empty($page) ? 'home' : $page;

//$page = in_array($page, $current_role_pages) ? $page : $pages['404'];

//$page_name=basename($_SERVER['PHP_SELF']);
//$page = isset($page_name) ? $page_name : null;

$page = in_array($page, $current_role_pages) ? $page : $pages['404'];
