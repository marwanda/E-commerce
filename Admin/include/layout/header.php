<!DOCTYPE html>
<html lang="<?php echo $current_lang; ?>">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">

    <title><?php echo $page_title; ?></title>
    <link rel="shortcut icon" href="assets/img/favicon.ico">
<!--    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">-->
<!--    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">-->
    <?php

    foreach ($shared_css as $css){
        if (isset($css)) {
            echo "<link href=\"{$css}\" rel=\"stylesheet\" />";
        }
    }


    ?>



</head>

<body>

<!--====================================================
                         MAIN NAVBAR
======================================================-->
<header class="header">
    <nav class="navbar navbar-expand-lg ">
        <div class="container-fluid ">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
                <div class="navbar-header">
                    <a href="<?php echo $APP_ROOT. $pages['orders-list'] ?>" class="navbar-brand">
                        <div class="brand-text brand-big hidden-lg-down"><img src="assets/img/logo-white.png" alt="Logo"
                                                                              class="img-fluid"></div>
                        <div class="brand-text brand-small"><img src="assets/img/logo-icon.png" alt="Logo"
                                                                 class="img-fluid"></div>
                    </a>
                    <a id="toggle-btn" href="#" class="menu-btn active">
                        <span></span>
                        <span></span>
                        <span></span>
                    </a>
                </div>
            </div>
            <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                <!-- Expand-->
                <li class="nav-item d-flex align-items-center full_scr_exp"><a  id="logout" class="nav-link " href="#">Logout</a></li>

            </ul>
        </div>
    </nav>
</header>

<!--====================================================
                        PAGE CONTENT
======================================================-->
    <div class="page-content d-flex align-items-stretch" style=" min-height:660px; height: 100% ">

    <!--***** SIDE NAVBAR *****-->
    <nav class="side-navbar">
        <div class="sidebar-header d-flex align-items-center">
            <div class="row">

                <div class="col-2">

                        <i  class="fa fa-user-circle fa-3x"></i>
                </div>
                <div class="col-10" style="margin-top: 13px"><div class="title" STYLE="margin: auto">
                        <h5 class="h5 text-center"><a href="<?php echo $APP_ROOT. $pages['admin-profile'] ?>">marwan Agha</a></h5>
                    </div></div>
            </div>

        </div>
        <hr>
        <!-- Sidebar Navidation Menus-->
        <ul  class="list-unstyled">
            <li class="active" >
                <a href="#home-mng" aria-expanded="false" data-toggle="collapse"> <i class="icon-home"></i>Home Management
                </a>
                <ul id="home-mng" class="collapse list-unstyled">
                    <li><a href="<?php echo $APP_ROOT. $pages['our-team'] ?>">Our Team</a></li>
                    <li><a href="<?php echo $APP_ROOT. $pages['leading-companies'] ?>">Leading Companies</a></li>
                </ul>
            </li>
            <li class=""> <a href="<?php echo $APP_ROOT. $pages['categories'] ?>"><i class="fa fa-cog"></i>Categories Management</a></li>
            <li >
                <a href="#order-mng" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-shopping-cart"></i>Orders Management
                </a>
                <ul id="order-mng" class="collapse list-unstyled">
                    <li><a href="<?php echo $APP_ROOT. $pages['orders-list'] ?>">Pending Orders</a></li>
                    <li><a href="<?php echo $APP_ROOT. $pages['resolved-orders'] ?>">Resolved Orders</a></li>
                </ul>
            </li>
            <li><a href="#product-mng" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-archive"></i>Products Management
                </a>
                <ul id="product-mng" class="collapse list-unstyled">
                    <li><a href="<?php echo $APP_ROOT. $pages['products-list'] ?>">Products</a></li>
                    <li><a href="<?php echo $APP_ROOT. $pages['product-form'] ?>">Add new Product</a></li>
                </ul>
            </li>
            <li ><a href="<?php echo $APP_ROOT. $pages['projects-list']?> "><i class="fa fa-file"></i>Projects files</a></li>
            <li ><a href="<?php echo $APP_ROOT. $pages['offers-list']?> "><i class="fa fa-file"></i>Offers files</a></li>

            <li><a href="#news-mng" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-newspaper-o"></i>News Management
                </a>
                <ul id="news-mng" class="collapse list-unstyled">
                    <li><a href="<?php echo $APP_ROOT. $pages['news-list'] ?>">News</a></li>
                    <li><a href="<?php echo $APP_ROOT. $pages['news-form'] ?>">Add news</a></li>
                </ul>
            </li>
            <li><a href="#user-mng" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-user-circle-o"></i>User Management
                </a>
                <ul id="user-mng" class="collapse list-unstyled">
                    <li><a href="<?php echo $APP_ROOT. $pages['users-list'] ?>">Users</a></li>
                    <li><a href="<?php echo $APP_ROOT. $pages['admins-list'] ?>">Admins</a></li>
                    <li><a href="<?php echo $APP_ROOT. $pages['admin-form'] ?>">Add new admin</a></li>
                </ul>
            </li>
        </ul>
    </nav>


