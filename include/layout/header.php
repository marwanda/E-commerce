<!DOCTYPE html>
<html lang="<?php echo $current_lang; ?>">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $page_title; ?></title>

    <link rel="shortcut icon" href="<?php echo $APP_ROOT ?>assets/img/logo3.png">

    <!-- Global Stylesheets -->
    <!--    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i" rel="stylesheet">-->
    <!--    <link href="assets/css/bootstrap/bootstrap.min.css" rel="stylesheet">-->
    <!--    <link rel="stylesheet" href="assets/font-awesome-4.7.0/css/font-awesome.min.css">-->
    <!--    <link rel="stylesheet" href="assets/css/animate/animate.min.css">-->
    <!--    <link rel="stylesheet" href="assets/css/owl-carousel/owl.carousel.min.css">-->
    <!--    <link rel="stylesheet" href="assets/css/owl-carousel/owl.theme.default.min.css">-->
    <!--    <link rel="stylesheet" href="assets/css/range-slider.css">-->
    <!--    <link rel="stylesheet" href="assets/css/style.css">-->
    <!--    <link rel="stylesheet" href="assets/css/products-list.css">-->
    <!--    <link rel="stylesheet" href="assets/css/product-details.css">-->
    <!--    <link rel="stylesheet" href="assets/css/services.css">-->
    <!--    <link rel="stylesheet" href="assets/css/news.css">-->
    <!--    <link rel="stylesheet" href="assets/css/about.css">-->

    <?php

    foreach ($shared_css as $css) {
        if (isset($css)) {
            echo "<link href=\"{$css}\" rel=\"stylesheet\" />";
        }
    }


    ?>


</head>

<body id="page-top">
<header>

    <!-- Top Navbar  -->
    <div class="top-menubar" id="top-menubar">
        <div class="topmenu">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <ul class="list-inline top-contacts">
                            <?php if(isset($_SESSION['role']) && $_SESSION['role']==3){?>
                                <li>
                                <span> <?php echo $lang['you_can_be_vip_user']?> <a id="vip-read-more" href="#" style="color: #2196f3;"
                                                                   data-toggle="modal" data-target="#vip-modal"
                                                                   class=""><?php echo $lang['read_more']?></a></span>
                                </li>
                           <?php } ?>

                            <li>

                            </li>
                        </ul>
                    </div>
                    <div class="col-md-5">
                        <ul class="list-inline top-data">
                            <li><a href="#" target="_empty"><i class="fa top-social fa-facebook"></i></a></li>
                            <?php if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) { ?>
                            <li><a href="<?php echo $page=='product-details'? '../':''?>requests/logout.php" class="log-top" ><?php echo $lang['logout']?></a>
                                <?php }else{ ?>
                            <li><a href="#" class="log-top" data-toggle="modal" data-target="#login-modal"><?php echo $lang['login']?></a>
                                <?php } ?>

                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light" id="mainNav" data-toggle="affix">
        <div class="container">
            <a class="navbar-brand smooth-scroll" href="<?php echo $APP_ROOT . $pages['home'] ?>">
                <img class="header-logo" src="<?php echo $APP_ROOT ?>assets/img/logo3.png" alt="logo">
            </a>
<!--            <a style="border-radius: 50px;" href="--><?php //if (isset($_SESSION['lang']) && $_SESSION['lang'] && $_SESSION['lang']=='en') echo '?lang=ar'; else echo '?lang=en';?><!--" class="btn btn-general btn-green">--><?php //if($_SESSION['lang']=='ar')  echo 'English'; else echo $lang['arabic']?><!--</a>-->
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                    data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link smooth-scroll"
                                            href="<?php echo $APP_ROOT . $pages['home'] ?>"><?php echo $lang['home']?></a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle smooth-scroll" href="#" id="navbarDropdownMenuLink"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $lang['shop']?></a>
                        <div class="dropdown-menu dropdown-cust" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item"
                               href="<?php echo $APP_ROOT . $pages['products-list'] ?>"><?php echo $lang['products']?></a>
                            <?php if(isset($_SESSION['role']) && ($_SESSION['role']==2 || $_SESSION['role']==3)){?>
                                <a class="dropdown-item" href="<?php echo $APP_ROOT . $pages['cart'] ?>"><?php echo $lang['cart']?></a>
                    <?php } ?>

<!--                            <a class="dropdown-item" href="--><?php //echo $APP_ROOT . $pages['orders'] ?><!--">My Orders</a>-->
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle smooth-scroll" href="#" id="navbarDropdownMenuLink"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $lang['invest']?></a>
                        <div class="dropdown-menu dropdown-cust" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="<?php echo $APP_ROOT . $pages['project-form'] ?>"><?php echo $lang['suggest_a_project']?></a>
                            <a class="dropdown-item" href="<?php echo $APP_ROOT . $pages['offer-form'] ?>"><?php echo $lang['suggest_an_offer']?></a>
                        </div>
                    </li>
                    <li class="nav-item"><a class="nav-link smooth-scroll" href="<?php echo $APP_ROOT . $pages['news-list'] ?>"><?php echo $lang['news']?></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle smooth-scroll" href="#" id="navbarDropdownMenuLink"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $lang['about']?></a>
                        <div class="dropdown-menu dropdown-cust" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="<?php echo $APP_ROOT . $pages['about'] ?>"><?php echo $lang['our_team']?></a>
                            <a class="dropdown-item" href="<?php echo $APP_ROOT . $pages['companies'] ?>"><?php echo $lang['leading_companies']?></a>
                        </div>
                    </li>
                    <?php if(isset($_SESSION['role']) && ($_SESSION['role']==2 || $_SESSION['role']==3)){?>
                        <li class="nav-item"><a class="nav-link smooth-scroll" href="<?php echo $APP_ROOT . $pages['profile'] ?>"><?php echo $lang['profile']?></a>
                        </li>
                    <?php } ?>
                    <li class="nav-item lang-nav-item">
                        <a href="<?php if (isset($_SESSION['lang']) && $_SESSION['lang'] && $_SESSION['lang']=='en') echo '?lang=ar'; else echo '?lang=en';?>" class="btn btn-general btn-green header-btn"><?php if($_SESSION['lang']=='ar')  echo 'English'; else echo $lang['arabic']?></a>
                    </li>

                    <li>
                        <div class="top-menubar-nav">
                            <div class="topmenu ">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <ul class="list-inline top-contacts">
                                                <li>
                                                    <i class="fa fa-envelope"></i> Email: <a
                                                            href="mailto:info@htmlstream.com">info@htmlstream.com</a>
                                                </li>
                                                <li>
                                                    <i class="fa fa-phone"></i> Hotline: (1) 396 4587 99
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-3">
                                            <ul class="list-inline top-data">
                                                <li><a href="#" target="_empty"><i
                                                                class="fa top-social fa-facebook"></i></a></li>
                                                <li><a href="#" target="_empty"><i class="fa top-social fa-twitter"></i></a>
                                                </li>
                                                <li><a href="#" target="_empty"><i
                                                                class="fa top-social fa-google-plus"></i></a></li>
                                                <li><a href="#" class="log-top" data-toggle="modal"
                                                       data-target="#login-modal">Login</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<section id="login">
    <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" align="center">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="fa fa-times" aria-hidden="true"></span>
                    </button>
                </div>
                <div id="div-forms">
                    <form action="<?php echo $page=='product-details'? '../':''?>requests/login.php" method="post" id="login-form">
                        <h3 class="text-center"><?php echo $lang['login']?></h3>
                        <div class="modal-body">
                            <label for="mobile"><?php echo $lang['mobile']?></label>
                            <input id="mobile" class="form-control" name="phone" type="tel" placeholder="<?php echo $lang['enter_mobile']?>"
                                   required>
                            <label for="username"><?php echo $lang['enter_password']?></label>
                            <input id="login_password" class="form-control" name="password" type="password"
                                   placeholder="<?php echo $lang['enter_password']?>"
                                   required>
                            <div class="checkbox">
                                <a href="<?php  echo $APP_ROOT . $pages['reset-password'] ?>"><?php echo $lang['forgot_password']?></a>
                            </div>
                        </div>
                        <div class="modal-footer text-center">
                            <div>
                                <button type="submit" class="btn btn-general btn-white"><?php echo $lang['login']?></button>
                            </div>
                            <div>
                                <a href="<?php echo $APP_ROOT . $pages['register'] ?>" id="register_btn"
                                   class="btn btn-link"><?php echo $lang['register']?></a>
                            </div>
                        </div>
                    </form>
                    <!--                    <form id="register-form" style="display:none;">-->
                    <!--                        <h3 class="text-center">Register</h3>-->
                    <!--                        <div class="modal-body">-->
                    <!--                            <label for="username">Username</label>-->
                    <!--                            <input id="register_username" class="form-control" type="text" placeholder="Enter username"-->
                    <!--                                   required>-->
                    <!--                            <label for="register_email">E-mailId</label>-->
                    <!--                            <input id="register_email" class="form-control" type="text" placeholder="Enter eMail"-->
                    <!--                                   required>-->
                    <!--                            <label for="register_password">Password</label>-->
                    <!--                            <input id="register_password" class="form-control" type="password" placeholder="Password"-->
                    <!--                                   required>-->
                    <!--                        </div>-->
                    <!--                        <div class="modal-footer">-->
                    <!--                            <div>-->
                    <!--                                <button type="submit" class="btn btn-general btn-white">Register</button>-->
                    <!--                            </div>-->
                    <!--                            <div>-->
                    <!--                                <button id="register_login_btn" type="button" class="btn btn-link">Log In</button>-->
                    <!--                            </div>-->
                    <!--                        </div>-->
                    <!--                    </form>-->
                </div>
            </div>
        </div>
    </div>
</section>
<div id="vip-modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div align="center" class="modal-content" style="margin-top: 100px">
            <div class="modal-header login-modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" dir="auto"><?php echo $lang['vip_account']?></h4>
            </div>
            <div class="modal-body">
                <?php echo $lang['vip_special_price']?>
            </div>
        </div>

    </div>
</div>