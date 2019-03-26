<div class="page-content d-flex align-items-stretch" style=" min-height:660px; height: 100% ">
<nav class="side-navbar">
    <div class="sidebar-header d-flex align-items-center">
        <div class="row">

            <div class="col-2">

                <i class="fa fa-user-circle fa-3x"></i>
            </div>
            <div class="col-10" style="margin-top: 13px">
                <div class="title" STYLE="margin: auto">
                    <h5 class="h5 text-center"><a href="<?php echo $APP_ROOT . $pages['admin-profile'] ?>"><?php echo $_SESSION['admin_name']; ?></a></h5>
                </div>
            </div>
        </div>

    </div>
    <hr>
    <!-- Sidebar Navidation Menus-->
    <ul class="list-unstyled">
        <?php if (isset($_SESSION['ad_role']) && $_SESSION['ad_role'] == 6) {
            ?>
            <li class="active">
                <a href="#home-mng" aria-expanded="false" data-toggle="collapse"> <i class="icon-home"></i>Home Management
                </a>
                <ul id="home-mng" class="collapse list-unstyled">
                    <li><a href="<?php echo $APP_ROOT . $pages['about-list'] ?>">About</a></li>
                    <li><a href="<?php echo $APP_ROOT . $pages['companies-list'] ?>">Companies</a></li>
                    <li><a href="<?php echo $APP_ROOT . $pages['gallary-form'] ?>">Gallary</a></li>
                </ul>
            </li>

<!--            <li class="">-->
<!--                <a href="#home-mng" aria-expanded="false" data-toggle="collapse"> <i class="icon-home"></i>Home Management-->
<!--                </a>-->
<!---->
<!--                <ul id="home-mng" class="collapse list-unstyled">-->
<!--                    <li><a href="--><?php //echo $APP_ROOT . $pages['our-team'] ?><!--">Our Team</a></li>-->
<!--                    <li><a href="--><?php //echo $APP_ROOT . $pages['leading-companies'] ?><!--">Leading Companies</a></li>-->
<!--                </ul>-->
<!--            </li>-->
            <?php
        } ?>

        <?php if (isset($_SESSION['ad_role']) && $_SESSION['ad_role'] == 6) {
            ?>
            <li class=""><a href="<?php echo $APP_ROOT . $pages['categories'] ?>"><i class="fa fa-cog"></i>Categories
                    Management</a></li>
            <?php
        } ?>

        <?php if (isset($_SESSION['ad_role']) && $_SESSION['ad_role'] == 6) {
            ?>
            <li class=""><a href="<?php echo $APP_ROOT . $pages['subcategories'] ?>"><i class="fa fa-cog"></i>Subcategories
                    Management</a></li>
            <?php
        } ?>

        <li class="active">
            <a href="#order-mng" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-shopping-cart"></i>Orders
                Management
            </a>
            <ul id="order-mng" class="collapse list-unstyled">
                <li><a href="<?php echo $APP_ROOT . $pages['orders-list'] ?>">Pending Orders</a></li>
                <li><a href="<?php echo $APP_ROOT . $pages['resolved-orders'] ?>">Resolved Orders</a></li>
            </ul>
        </li>
        <li><a href="#product-mng" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-archive"></i>Products
                Management
            </a>
            <ul id="product-mng" class="collapse list-unstyled">
                <li><a href="<?php echo $APP_ROOT . $pages['products-list'] ?>">Products</a></li>
                <li><a href="<?php echo $APP_ROOT . $pages['product-form'] ?>">Add new Product</a></li>
            </ul>
        </li>
        <?php if (isset($_SESSION['ad_role']) && $_SESSION['ad_role'] == 6) {
            ?>
            <li><a href="<?php echo $APP_ROOT . $pages['projects-list'] ?> "><i class="fa fa-file"></i>Projects files</a>
            </li>
            <?php
        } ?>
        <?php if (isset($_SESSION['ad_role']) && $_SESSION['ad_role'] == 6) {
            ?>
            <li><a href="<?php echo $APP_ROOT . $pages['offers-list'] ?> "><i class="fa fa-file"></i>Offers files</a></li>
            <?php
        } ?>
        <?php if (isset($_SESSION['ad_role']) && $_SESSION['ad_role'] == 6) {
            ?>
            <li><a href="#user-mng" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-user-circle-o"></i>User
                    Management
                </a>
                <ul id="user-mng" class="collapse list-unstyled">
                    <li><a href="<?php echo $APP_ROOT . $pages['users-list'] ?>">Users</a></li>
                    <li><a href="<?php echo $APP_ROOT . $pages['admins-list'] ?>">Admins</a></li>
                    <li><a href="<?php echo $APP_ROOT . $pages['admin-form'] ?>">Add new admin</a></li>
                </ul>
            </li>
            <?php
        } ?>
        <?php if (isset($_SESSION['ad_role']) && $_SESSION['ad_role'] == 6) {
            ?>
            <li><a href="<?php echo $APP_ROOT . $pages['sms-configurations'] ?> "><i class="fa fa-file"></i>SMS Configurations</a>
            </li>
            <?php
        } ?>
    </ul>
</nav>                                                                                                      