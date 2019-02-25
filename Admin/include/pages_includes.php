<?php
//exploding css arrays in the header
//exploding js arrays in the footer
$id = isset($_GET['id']) ? make_safe($_GET['id']) : null;
$rtl = isset($_SESSION['lang']) && $_SESSION['lang'] == 'ar' ? $ASSET_URL.'css/rtl.css' : null;
$rtl_js = isset($_SESSION['lang']) && $_SESSION['lang'] == 'ar' ? $ASSET_URL.'js/lang/ar.js' : $ASSET_URL.'js/lang/en.js';
//$rtl_js1 = isset($_SESSION['lang']) && $_SESSION['lang'] == 'ar' ? 'assets/site/js/lang/ar.js' : 'assets/site/js/lang/en.js';
$page_title = $lang['site_name'];



$shared_css = array(
    "https://fonts.googleapis.com/css?family=Roboto+Condensed",
    $ASSET_URL."css/bootstrap.min.css",
    "https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css",
    $ASSET_URL."font-awesome-4.7.0/css/font-awesome.min.css",
    $ASSET_URL."css/font-icon-style.css",
    $ASSET_URL."css/style.default.css",
    $ASSET_URL."css/ui-elements/card.css",
    $ASSET_URL."css/ui-elements/buttons.css",
    $ASSET_URL."css/pages/login.css",
    $ASSET_URL."css/pages/404.css",
    $ASSET_URL."css/style.css",
    $rtl
    );


$shared_js = array(
    $ASSET_URL."js/jquery.min.js",
    "https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js",
    "https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js",
    $ASSET_URL."js/popper/popper.min.js",
    $ASSET_URL."js/tether.min.js",
    $ASSET_URL."js/bootstrap.min.js",
    $ASSET_URL."js/jquery.cookie.js",
    $ASSET_URL."js/jquery.validate.min.js",
    $ASSET_URL."js/chart.min.js",
    $ASSET_URL."js/front.js",
    $ASSET_URL."js/custom.js",
    $rtl_js,
//    $rtl_js1
    );


$page_css = array(


    );
$page_js = array(

    );

//$page_title = $lang['site_name'];
//$page_header_title = '';
////$page_title = $lang['site_name'] . ' | ' .  $lang[$page];
////$page_header_title = $lang[$page];
//if (!(in_array($page, $pages))) {
//
//    if ($page === $pages['404']) {
//        $page_title = "404" . ' - ' . $lang['site_name'];
//        $page_js = array(
//            "assets/js/pages/404.js",
//            );
//    } elseif ($page === $pages['login']) {
//        $page_title = $lang['login'] . ' - ' . $lang['site_name'];
//    } elseif ($page === $pages['dashboard']) {
//        $page_title = $lang['dashboard'] . ' - ' . $lang['site_name'];
//    } elseif ($page === $pages['user-list']) {
//        $page_title = $lang['user-list'] . ' - ' . $lang['site_name'];
//        $page_header_title = $lang['user-list'];
//    } elseif ($page === $pages['add-user']) {
//        $page_title = $lang['add-user'] . ' - ' . $lang['site_name'];
//        $page_header_title = $lang['add-user'];
//        $page_breadcrumbs = array(
//            array(
//                'title' => $lang['user-list'],
//                'link' => $pages['user-list']
//                ),
//            );
//    } elseif ($page === $pages['edit-user/{id}']) {
//        $page_title = $lang['edit-user/{id}'] . ' - ' . $lang['site_name'];
//        $page_header_title = $lang['edit-user/{id}'];
//        $page_breadcrumbs = array(
//            array(
//                'title' => $lang['user-list'],
//                'link' => $pages['user-list']
//                ),
//            );
//    } elseif ($page === $pages['services-list']) {
//        $page_title = $lang['services-list'] . ' - ' . $lang['site_name'];
//        $page_header_title = $lang['services-list'];
//    }
//
//
//    elseif ($page === $pages['newsletter-list']) {
//        $page_title = $lang['newsletter-list'] . ' - ' . $lang['site_name'];
//        $page_header_title = $lang['newsletter-list'];
//        $page_js = array(
//            "assets/js/table-datatables-buttons.js",
//            "assets/js/table-datatables-buttons.min.js",
//            );
//
//
//
//    }
//
//
//
//
//    elseif ($page === $pages['add-services']) {
//        $page_title = $lang['add-services'] . ' - ' . $lang['site_name'];
//        $page_header_title = $lang['add-services'];
//        $page_breadcrumbs = array(
//            array(
//                'title' => $lang['services-list'],
//                'link' => $pages['services-list']
//                ),
//            );
//    } elseif ($page === $pages['edit-services/{id}']) {
//        $page_title = $lang['edit-services/{id}'] . ' - ' . $lang['site_name'];
//        $page_header_title = $lang['edit-services/{id}'];
//        $page_breadcrumbs = array(
//            array(
//                'title' => $lang['services-list'],
//                'link' => $pages['services-list']
//                ),
//            );
//    }  elseif ($page === $pages['ads-list']) {
//        $page_title = $lang['ads-list'] . ' - ' . $lang['site_name'];
//        $page_header_title = $lang['ads-list'];
//    } elseif ($page === $pages['add-ads']) {
//        $page_title = $lang['add-ads'] . ' - ' . $lang['site_name'];
//        $page_header_title = $lang['add-ads'];
//        $page_breadcrumbs = array(
//            array(
//                'title' => $lang['ads-list'],
//                'link' => $pages['ads-list']
//                ),
//            );
//    } elseif ($page === $pages['edit-ads/{id}']) {
//        $page_title = $lang['edit-ads/{id}'] . ' - ' . $lang['site_name'];
//        $page_header_title = $lang['edit-ads/{id}'];
//        $page_breadcrumbs = array(
//            array(
//                'title' => $lang['ads-list'],
//                'link' => $pages['ads-list']
//                ),
//            );
//    } elseif ($page === $pages['settings']) {
//        $page_title = $lang['settings'] . ' - ' . $lang['site_name'];
//        $page_header_title = $lang['settings'];
//    }
//
//    elseif ($page === $pages['achievements-list']) {
//        $page_title = $lang['achievements-list'] . ' - ' . $lang['site_name'];
//        $page_header_title = $lang['achievements-list'];
//    } elseif ($page === $pages['add-achievement']) {
//        $page_title = $lang['add-achievement'] . ' - ' . $lang['site_name'];
//        $page_header_title = $lang['add-achievement'];
//        $page_breadcrumbs = array(
//            array(
//                'title' => $lang['achievements-list'],
//                'link' => $pages['achievements-list']
//                ),
//            );
//    } elseif ($page === $pages['edit-achievement/{id}']) {
//        $page_title = $lang['edit-achievement'] . ' - ' . $lang['site_name'];
//        $page_header_title = $lang['edit-achievement'];
//        $page_breadcrumbs = array(
//            array(
//                'title' => $lang['achievements-list'],
//                'link' => $pages['achievements-list']
//                ),
//            );
//    } elseif ($page === $pages['blogs']) {
//        $page_title = $lang['blogs'] . ' - ' . $lang['site_name'];
//        $page_header_title = $lang['blogs'];
//    } elseif ($page === $pages['add-blog']) {
//        $page_title = $lang['add-blog'] . ' - ' . $lang['site_name'];
//        $page_header_title = $lang['add-blog'];
//        $page_breadcrumbs = array(
//            array(
//                'title' => $lang['blogs'],
//                'link' => $pages['blogs']
//                ),
//            );
//    } elseif ($page === $pages['edit-blog/{id}']) {
//        $page_title = $lang['edit-blog'] . ' - ' . $lang['site_name'];
//        $page_header_title = $lang['edit-blog'];
//        $page_breadcrumbs = array(
//            array(
//                'title' => $lang['blogs'],
//                'link' => $pages['blogs']
//                ),
//            );
//    }
//
//
//    elseif ($page === $pages['add-tags']) {
//        $page_title = $lang['add-tags'] . ' - ' . $lang['site_name'];
//        $page_header_title = $lang['add-tags'];
//        $page_breadcrumbs = array(
//            array(
//                'title' => $lang['blogs'],
//                'link' => $pages['blogs']
//                ),
//            );
//    }
//
//
//    elseif ($page === $pages['add-category']) {
//        $page_title = $lang['add-category'] . ' - ' . $lang['site_name'];
//        $page_header_title = $lang['add-category'];
//        $page_breadcrumbs = array(
//            array(
//                'title' => $lang['blogs'],
//                'link' => $pages['blogs']
//                ),
//            );
//    }
//
//
//
//  // user pages start
//
//
//    elseif ($page === $pages_users['about']) {
//     $page_title = $lang['about'] . ' - ' . $lang['site_name'];
//     $page_header_title = $lang['about'];
//     $page_breadcrumbs = array(
//        array(
//            'title' => $lang['about'],
//            'link' => $pages_users['about']
//            ),
//        );
// }
//
// elseif ($page === $pages_users['services']) {
//    $page_title = $lang['services'] . ' - ' . $lang['site_name'];
//    $page_header_title = $lang['services'];
//    $page_breadcrumbs = array(
//        array(
//            'title' => $lang['services'],
//            'link' => $pages_users['services']
//            ),
//        );
//}
//
//
//
//elseif ($page === $pages_users['service-details']) {
//    $page_title = $lang['service-details'] . ' - ' . $lang['site_name'];
//    $page_header_title = $lang['service-details'];
//    $page_breadcrumbs = array(
//        array(
//            'title' => $lang['service-details'],
//            'link' => $pages_users['service-details']
//            ),
//        );
//}
//elseif ($page === $pages_users['projects']) {
//    $page_title = $lang['projects'] . ' - ' . $lang['site_name'];
//    $page_header_title = $lang['projects'];
//    $page_breadcrumbs = array(
//        array(
//            'title' => $lang['projects'],
//            'link' => $pages_users['projects']
//            ),
//        );
//}
//
//elseif ($page === $pages_users['blogs-list']) {
//    $page_title = $lang['blogs'] . ' - ' . $lang['site_name'];
//    $page_header_title = $lang['blogs'];
//    $page_breadcrumbs = array(
//        array(
//            'title' => $lang['blogs'],
//            'link' => $pages_users['blogs-list']
//            ),
//        );
//}
//
//
//
//elseif ($page === $pages_users['blog-details']) {
//    $page_title = $lang['blog-details'] . ' - ' . $lang['site_name'];
//    $page_header_title = $lang['blog-details'];
//    $page_breadcrumbs = array(
//        array(
//            'title' => $lang['blog-details'],
//            'link' => $pages_users['blog-details']
//            ),
//        );
//}
//
//
//
//
//
//elseif ($page === $pages_users['project-details']) {
//    $page_title = $lang['project-details'] . ' - ' . $lang['site_name'];
//    $page_header_title = $lang['project-details'];
//    $page_breadcrumbs = array(
//        array(
//            'title' => $lang['project-details'],
//            'link' => $pages_users['project-details']
//            ),
//        );
//}
//
//elseif ($page === $pages['elements']) {
//    $page_title = "elements";
//    $page_header_title = "elements";
//}
//
//
//}

/** User Web-site */






