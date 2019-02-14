<?php

$standalone_pages = array(
    $pages['404'],
    $pages['login'] ,
    $pages['index'] ,

);

$Admin_pages = array_merge(
    $standalone_pages,

    array(
        $pages['resolved-orders'],
        $pages['products-list'],
        $pages['orders-list'],
        $pages['product-form'],
        $pages['admin-profile'],
        $pages['news-form'],
        $pages['news-list'],
    )

);

$Super_Admin_pages = array_merge(
    $Admin_pages,

    array(
        $pages['about-form'],
        $pages['admin-form'],
        $pages['admins-list'],
        $pages['categories'],
        $pages['leading-companies'],
        $pages['projects-list'],
        $pages['register'],
        $pages['users-list'],
        $pages['offers-list'],
        $pages['change-password-admin'],
        $pages['our-team'],
    )

);

if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
    $current_role_pages = $Admin_pages;
}
elseif (isset($_SESSION['role']) && $_SESSION['role'] == 'super-admin') {
    $current_role_pages = $Super_Admin_pages;
}

$page = isset($_GET['page']) ? $_GET['page'] : null;

$page = empty($page) ? 'orders-list' : make_safe($page);

$page = in_array($page, $current_role_pages) ? $page : $pages['404'];


