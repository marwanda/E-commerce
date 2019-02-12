<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">

    <title>Bootstrap Admin Template </title>
    <link rel="shortcut icon" href="./img/favicon.ico">

    <!-- global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="./font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/font-icon-style.css">
    <link rel="stylesheet" href="./css/style.default.css" id="theme-stylesheet">
    <!-- Core stylesheets -->
    <link rel="stylesheet" href="./css/ui-elements/card.css">
    <link rel="stylesheet" href="./css/style.css">


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
                    <a href="home.php" class="navbar-brand">
                        <div class="brand-text brand-big hidden-lg-down"><img src="./img/logo-white.png" alt="Logo"
                                                                              class="img-fluid"></div>
                        <div class="brand-text brand-small"><img src="./img/logo-icon.png" alt="Logo"
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
                    <a href="admin-profile.php" >
                        <i style="font-size: 45px" class="fa fa-user-circle fa-3x"></i>
                    </a>
                </div>
                <div class="col-10" style="margin-top: 13px"><div class="title" STYLE="margin: auto">
                        <h5 class="h5 text-center"><a href="admin-profile.php">marwan Agha</a></h5>
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
                    <li><a href="our-team.php">Our Team</a></li>
                    <li><a href="leading-companies.php">Leading Companies</a></li>
                </ul>
            </li>
            <li class=""> <a href="categories.php"><i class="fa fa-cog"></i>Categories Management</a></li>
            <li >
                <a href="#order-mng" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-shopping-cart"></i>Orders Management
                </a>
                <ul id="order-mng" class="collapse list-unstyled">
                    <li><a href="orders-list.php">Pending Orders</a></li>
                    <li><a href="resolved-orders.php">Resolved Orders</a></li>
                </ul>
            </li>
            <li><a href="#product-mng" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-archive"></i>Products Management
                </a>
                <ul id="product-mng" class="collapse list-unstyled">
                    <li><a href="products-list.php">Products</a></li>
                    <li><a href="product-form.php">Add new Product</a></li>
                </ul>
            </li>
            <li ><a href="projects-list.php"><i class="fa fa-file"></i>Projects files</a></li>

            <li><a href="#news-mng" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-newspaper-o"></i>News Management
                </a>
                <ul id="news-mng" class="collapse list-unstyled">
                    <li><a href="news-list.php">News</a></li>
                    <li><a href="news-form.php">Add news</a></li>
                </ul>
            </li>
            <li><a href="#user-mng" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-user-circle-o"></i>User Management
                </a>
                <ul id="user-mng" class="collapse list-unstyled">
                    <li><a href="users-list.php">Users</a></li>
                    <li><a href="admins-list.php">Admins</a></li>
                    <li><a href="admin-form.php">Add new admin</a></li>
                </ul>
            </li>
        </ul>
    </nav>


