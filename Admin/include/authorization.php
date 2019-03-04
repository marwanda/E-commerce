<?php
$standalone_pages = array(
    $pages['404'],
    $pages['login'],
    $pages['index'],

);
$Admin_pages = array_merge(
    $standalone_pages,

    array(
        $pages['resolved-orders'],
        $pages['products-list'],
        $pages['orders-list'],
        $pages['product-form'],
        $pages['admin-profile'],
        $pages['change-password-admin'],
    )

);
$Super_Admin_pages = array_merge(
    $Admin_pages,

    array(
        $pages['about-form'],
        $pages['admin-form'],
        $pages['admins-list'],
        $pages['categories'],
        $pages['subcategories'],
//        $pages['leading-companies'],
        $pages['projects-list'],
        $pages['register'],
        $pages['users-list'],
        $pages['offers-list'],
        $pages['change-password-admin'],
//        $pages['our-team'],
    )

);

if (isset($_SESSION['ad_role']) && $_SESSION['ad_role'] == 5) {
    $current_role_pages = $Admin_pages;
}
elseif (isset($_SESSION['ad_role']) && $_SESSION['ad_role'] == 6) {
    $current_role_pages = $Super_Admin_pages;
}

if(!isset($_SESSION['ad_role']) && empty($_SESSION['ad_role']))
{
    $page='login';

}
else
{
    $page = isset($_GET['page']) ? $_GET['page'] : null;
    $page = empty($page) ? 'orders-list' : make_safe($page);
    $page = in_array($page, $current_role_pages) ? $page : $pages['404'];
}