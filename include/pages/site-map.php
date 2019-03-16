<div id="home-p" class="home-p pages-head1 text-center">
    <div class="container">
        <h1 class="wow fadeInUp" data-wow-delay="0.1s"><?php echo $lang['site_map'] ?></h1>
    </div>
    <!--/end container-->
</div>
<div class="container mt-5 mb-5">
    <div class="w3-padding w3-white notranslate">

        <div class="section">

            <p style="font-size: xx-large"><a href="<?php echo $APP_ROOT ?>"><?php echo $lang['home'] ?></a></p>

            <ul>

            </ul>

            <li style="font-size: x-large" class="mb-2 "><a href="<?php echo $APP_ROOT ?>products-list"><?php echo $lang['products'] ?></a></li>

            <li style="font-size: x-large" class="mb-2"><a href="<?php echo $APP_ROOT ?>news-list"><?php echo $lang['news'] ?></a></li>

            <li style="font-size: x-large" class="mb-2"><a href="<?php echo $APP_ROOT ?>project-form"><?php echo $lang['suggest_a_project'] ?></a></li>

            <li style="font-size: x-large" class="mb-2"><a href="<?php echo $APP_ROOT ?>offer-form"><?php echo $lang['suggest_an_offer'] ?></a></li>


            <li style="font-size: x-large" class="mb-2"><a href="<?php echo $APP_ROOT ?>about"><?php echo $lang['about'] ?></a></li>

            <li style="font-size: x-large" class="mb-2"><a href="<?php echo $APP_ROOT ?>companies"><?php echo $lang['leading_companies'] ?></a></li>



            <li style="font-size: x-large" class="mb-2"><a href="<?php echo $APP_ROOT ?>register"><?php echo $lang['register'] ?></a></li>

            <?php if ($_SESSION['role'] == 2 || $_SESSION['role'] == 3) { ?>


                <li style="font-size: x-large" class="mb-2"><a href="<?php echo $APP_ROOT ?>profile"><?php echo $lang['profile'] ?></a></li>

                <li style="font-size: x-large" class="mb-2"><a href="<?php echo $APP_ROOT ?>cart"><?php echo $lang['cart'] ?></a></li>
            <?php }else {?>

                <li style="font-size: x-large" class="mb-2"><a href="<?php echo $APP_ROOT ?>reset-password"><?php echo $lang['forget_password'] ?></a></li>

           <?php } ?>


        </div>
    </div>
</div>