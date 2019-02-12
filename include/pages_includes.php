<?php
//exploding css arrays in the header
//exploding js arrays in the footer
$id = isset($_GET['id']) ? make_safe($_GET['id']) : null;
$rtl = isset($_SESSION[SESSION]['lang']) && $_SESSION[SESSION]['lang'] == 'ar' ? 'assets/css/rtl.css' : null;
$rtl_js = isset($_SESSION[SESSION]['lang']) && $_SESSION[SESSION]['lang'] == 'ar' ? 'assets/js/lang/ar.js' : 'assets/js/lang/en.js';

$rtl_js1 = isset($_SESSION[SESSION]['lang']) && $_SESSION[SESSION]['lang'] == 'ar' ? 'assets/site/js/lang/ar.js' : 'assets/site/js/lang/en.js';

$shared_css = array(
    "assets/css/style.bundle.css",
    "assets/css/vendors.bundle.css",
    "assets/css/trumbowyg.min.css",
    "assets/css/fileinput.min.css",
    "assets/css/sweetalert.css",
    "assets/css/bootstrap-editable.css",
    "assets/css/style.css",
    "assets/css/jquery.tagsinput.css",

    $rtl
    );
$shared_js = array(
    "assets/js/jquery.min.js",
    "assets/js/bootstrap.min.js",
    "assets/js/vendors.bundle.js",
    "assets/js/scripts.bundle.js",
    "assets/js/select2.full.min.js",
    "assets/js/trumbowyg.js",
    "assets/js/jquery.bootstrap-growl.min.js",
    "assets/js/sweetalert.min.js",
    "assets/js/parsley.min.js",
    "assets/js/fileinput.min.js",
    "assets/js/bootstrap-editable.min.js",
    "assets/js/jquery.tagsinput.js",

    "assets/js/custom.js",
    "assets/js/pages/top-menu.js",
    "assets/js/table-datatables-buttons.js",
     "assets/js/table-datatables-buttons.min.js",
    $rtl_js,
    $rtl_js1
    );

$page_css = array(
    $ASSET_URL."site/css/bootstrap.min.css",
    $ASSET_URL."site/css/swiper.min.css",
    $ASSET_URL."site/css/style.css",
    $ASSET_URL."site/css/animate.css",
    $ASSET_URL."site/css/elegant-icons.css",
    $ASSET_URL."site/css/grt-youtube-popup.css",
    $ASSET_URL."site/css/lightbox.css",
    $ASSET_URL."site/css/magnific-popup.css",
    $ASSET_URL."site/css/owl.carousel.css",
    $ASSET_URL."site/css/owl.theme.default.css",
    $ASSET_URL."site/css/responsive.css",
    $ASSET_URL."site/css/sm-clean.css",
    $ASSET_URL."site/css/sm-core-css.css",
    $ASSET_URL."site/css/venbox.css",
    $ASSET_URL."site/css/Footer-with-button-logo.css",
    );
$page_js = array(
    $ASSET_URL."site/js/jquery-1.12.4.min.js",
    $ASSET_URL."site/js/popper.min.js",
    $ASSET_URL."site/js/bootstrap.min.js",
    $ASSET_URL."site/js/bootstrap-notify.min.js",
    $ASSET_URL."site/js/swiper.min.js",
    $ASSET_URL."site/js/jquery.googlemap.js",
    $ASSET_URL."site/js/cascade-slider.js",
    $ASSET_URL."site/js/custom.js",
    $ASSET_URL."site/js/html5shiv.min.js",
    $ASSET_URL."site/js/Isotope.js",
    $ASSET_URL."site/js/jquery.ajaxchimp.min.js",
    $ASSET_URL."site/js/jquery.easing.js",
    $ASSET_URL."site/js/jquery.scrollUp.min.js",
    $ASSET_URL."site/js/jquery.smartmenus.min.js",
    $ASSET_URL."site/js/lightbox.js",
    $ASSET_URL."site/js/magnific-popup.min.js",
    $ASSET_URL."site/js/MagnificPopup.js",
    $ASSET_URL."site/js/owl.carousel.js",
    $ASSET_URL."site/js/main.js",
    $ASSET_URL."site/js/modernizr.js",
    $ASSET_URL."site/js/respond.min.js",
    $ASSET_URL."site/js/shapes.js",
    $ASSET_URL."site/js/text-typed.js",
    $ASSET_URL."site/js/typed.min.js",
    $ASSET_URL."site/js/venobox.min.js",
    $ASSET_URL."site/js/wow.min.js",




    );

$page_title = $lang['site_name'];
$page_header_title = '';
//$page_title = $lang['site_name'] . ' | ' .  $lang[$page];
//$page_header_title = $lang[$page];
if (!(in_array($page, $pages_users))) {
    if ($page === $pages['404']) {
        $page_title = "404" . ' - ' . $lang['site_name'];
        $page_js = array(
            "assets/js/pages/404.js",
            );
    } elseif ($page === $pages['login']) {
        $page_title = $lang['login'] . ' - ' . $lang['site_name'];
    } elseif ($page === $pages['dashboard']) {
        $page_title = $lang['dashboard'] . ' - ' . $lang['site_name'];
    } elseif ($page === $pages['user-list']) {
        $page_title = $lang['user-list'] . ' - ' . $lang['site_name'];
        $page_header_title = $lang['user-list'];
    } elseif ($page === $pages['add-user']) {
        $page_title = $lang['add-user'] . ' - ' . $lang['site_name'];
        $page_header_title = $lang['add-user'];
        $page_breadcrumbs = array(
            array(
                'title' => $lang['user-list'],
                'link' => $pages['user-list']
                ),
            );
    } elseif ($page === $pages['edit-user/{id}']) {
        $page_title = $lang['edit-user/{id}'] . ' - ' . $lang['site_name'];
        $page_header_title = $lang['edit-user/{id}'];
        $page_breadcrumbs = array(
            array(
                'title' => $lang['user-list'],
                'link' => $pages['user-list']
                ),
            );
    } elseif ($page === $pages['services-list']) {
        $page_title = $lang['services-list'] . ' - ' . $lang['site_name'];
        $page_header_title = $lang['services-list'];
    }


    elseif ($page === $pages['newsletter-list']) {
        $page_title = $lang['newsletter-list'] . ' - ' . $lang['site_name'];
        $page_header_title = $lang['newsletter-list'];
        $page_js = array(
            "assets/js/table-datatables-buttons.js",
            "assets/js/table-datatables-buttons.min.js",
            );



    }




    elseif ($page === $pages['add-services']) {
        $page_title = $lang['add-services'] . ' - ' . $lang['site_name'];
        $page_header_title = $lang['add-services'];
        $page_breadcrumbs = array(
            array(
                'title' => $lang['services-list'],
                'link' => $pages['services-list']
                ),
            );
    } elseif ($page === $pages['edit-services/{id}']) {
        $page_title = $lang['edit-services/{id}'] . ' - ' . $lang['site_name'];
        $page_header_title = $lang['edit-services/{id}'];
        $page_breadcrumbs = array(
            array(
                'title' => $lang['services-list'],
                'link' => $pages['services-list']
                ),
            );
    }  elseif ($page === $pages['ads-list']) {
        $page_title = $lang['ads-list'] . ' - ' . $lang['site_name'];
        $page_header_title = $lang['ads-list'];
    } elseif ($page === $pages['add-ads']) {
        $page_title = $lang['add-ads'] . ' - ' . $lang['site_name'];
        $page_header_title = $lang['add-ads'];
        $page_breadcrumbs = array(
            array(
                'title' => $lang['ads-list'],
                'link' => $pages['ads-list']
                ),
            );
    } elseif ($page === $pages['edit-ads/{id}']) {
        $page_title = $lang['edit-ads/{id}'] . ' - ' . $lang['site_name'];
        $page_header_title = $lang['edit-ads/{id}'];
        $page_breadcrumbs = array(
            array(
                'title' => $lang['ads-list'],
                'link' => $pages['ads-list']
                ),
            );
    } elseif ($page === $pages['settings']) {
        $page_title = $lang['settings'] . ' - ' . $lang['site_name'];
        $page_header_title = $lang['settings'];
    }

    elseif ($page === $pages['achievements-list']) {
        $page_title = $lang['achievements-list'] . ' - ' . $lang['site_name'];
        $page_header_title = $lang['achievements-list'];
    } elseif ($page === $pages['add-achievement']) {
        $page_title = $lang['add-achievement'] . ' - ' . $lang['site_name'];
        $page_header_title = $lang['add-achievement'];
        $page_breadcrumbs = array(
            array(
                'title' => $lang['achievements-list'],
                'link' => $pages['achievements-list']
                ),
            );
    } elseif ($page === $pages['edit-achievement/{id}']) {
        $page_title = $lang['edit-achievement'] . ' - ' . $lang['site_name'];
        $page_header_title = $lang['edit-achievement'];
        $page_breadcrumbs = array(
            array(
                'title' => $lang['achievements-list'],
                'link' => $pages['achievements-list']
                ),
            );
    } elseif ($page === $pages['blogs']) {
        $page_title = $lang['blogs'] . ' - ' . $lang['site_name'];
        $page_header_title = $lang['blogs'];
    } elseif ($page === $pages['add-blog']) {
        $page_title = $lang['add-blog'] . ' - ' . $lang['site_name'];
        $page_header_title = $lang['add-blog'];
        $page_breadcrumbs = array(
            array(
                'title' => $lang['blogs'],
                'link' => $pages['blogs']
                ),
            );
    } elseif ($page === $pages['edit-blog/{id}']) {
        $page_title = $lang['edit-blog'] . ' - ' . $lang['site_name'];
        $page_header_title = $lang['edit-blog'];
        $page_breadcrumbs = array(
            array(
                'title' => $lang['blogs'],
                'link' => $pages['blogs']
                ),
            );
    }


    elseif ($page === $pages['add-tags']) {
        $page_title = $lang['add-tags'] . ' - ' . $lang['site_name'];
        $page_header_title = $lang['add-tags'];
        $page_breadcrumbs = array(
            array(
                'title' => $lang['blogs'],
                'link' => $pages['blogs']
                ),
            );
    }


    elseif ($page === $pages['add-category']) {
        $page_title = $lang['add-category'] . ' - ' . $lang['site_name'];
        $page_header_title = $lang['add-category'];
        $page_breadcrumbs = array(
            array(
                'title' => $lang['blogs'],
                'link' => $pages['blogs']
                ),
            );
    }



  // user pages start


    elseif ($page === $pages_users['about']) {
     $page_title = $lang['about'] . ' - ' . $lang['site_name'];
     $page_header_title = $lang['about'];
     $page_breadcrumbs = array(
        array(
            'title' => $lang['about'],
            'link' => $pages_users['about']
            ),
        );
 }

 elseif ($page === $pages_users['services']) {
    $page_title = $lang['services'] . ' - ' . $lang['site_name'];
    $page_header_title = $lang['services'];
    $page_breadcrumbs = array(
        array(
            'title' => $lang['services'],
            'link' => $pages_users['services']
            ),
        );
}



elseif ($page === $pages_users['service-details']) {
    $page_title = $lang['service-details'] . ' - ' . $lang['site_name'];
    $page_header_title = $lang['service-details'];
    $page_breadcrumbs = array(
        array(
            'title' => $lang['service-details'],
            'link' => $pages_users['service-details']
            ),
        );
}
elseif ($page === $pages_users['projects']) {
    $page_title = $lang['projects'] . ' - ' . $lang['site_name'];
    $page_header_title = $lang['projects'];
    $page_breadcrumbs = array(
        array(
            'title' => $lang['projects'],
            'link' => $pages_users['projects']
            ),
        );
}

elseif ($page === $pages_users['blogs-list']) {
    $page_title = $lang['blogs'] . ' - ' . $lang['site_name'];
    $page_header_title = $lang['blogs'];
    $page_breadcrumbs = array(
        array(
            'title' => $lang['blogs'],
            'link' => $pages_users['blogs-list']
            ),
        );
}



elseif ($page === $pages_users['blog-details']) {
    $page_title = $lang['blog-details'] . ' - ' . $lang['site_name'];
    $page_header_title = $lang['blog-details'];
    $page_breadcrumbs = array(
        array(
            'title' => $lang['blog-details'],
            'link' => $pages_users['blog-details']
            ),
        );
}





elseif ($page === $pages_users['project-details']) {
    $page_title = $lang['project-details'] . ' - ' . $lang['site_name'];
    $page_header_title = $lang['project-details'];
    $page_breadcrumbs = array(
        array(
            'title' => $lang['project-details'],
            'link' => $pages_users['project-details']
            ),
        );
}

elseif ($page === $pages['elements']) {
    $page_title = "elements";
    $page_header_title = "elements";
}


}

/** User Web-site */






