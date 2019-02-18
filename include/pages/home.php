<?php
if (isset($_SESSION['error_msg']) && !empty($_SESSION['error_msg'])) {
    echo '<script language="javascript">';
    echo "alert('".$_SESSION['error_msg']."')";
    echo '</script>';
    $_SESSION['error_msg']='';
//var_dump( $_SESSION['error_msg']);
}


?>
<!--====================================================
                         HOME
======================================================-->
<section id="home-shop">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <!-- Slide One - Set the background image for this slide in the line below -->
            <div class="carousel-item active" style="background-image: url('assets/img/shop/shop-banner-1.jpg')">
                <div class="carousel-caption d-none d-md-block">
                    <h3><?php echo $lang['slide_one']?></h3>
                </div>
            </div>
            <!-- Slide Two - Set the background image for this slide in the line below -->
            <div class="carousel-item" style="background-image: url('assets/img/shop/shop-banner-2.jpg')">
                <div class="carousel-caption d-none d-md-block">
                    <h3><?php echo $lang['slide_two']?></h3>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</section>


<!--====================================================
                     WHAT WE DO
======================================================-->
<section id="business-growth-p1" class="business-growth-p1 bg-gray ">
    <div class="container ">
<!--        <div class="row title-bar">-->
<!--            <div class="col-md-12">-->
<!--                <h1 class="wow fadeInUp">--><?php //echo $lang['home_big_title'] ?><!--</h1>-->
<!--                <div class="heading-border"></div>-->
<!--                <p class="wow fadeInUp" data-wow-delay="0.4s">--><?php //echo $lang['home_title_text'] ?><!--</p>-->
<!--            </div>-->
<!--        </div>-->

        <div class="row wow animated fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">

            <div class="col-md-3 col-sm-6 service-padding">
                <div class="service-item">
                    <a href="products-list">
                        <div class="service-item-icon"><i class="fa fa-shopping-cart fa-3x"></i>
                        </div>
                    </a>
                    <div class="service-item-title">
                        <h3><?php echo $lang['online_shopping']?></h3>
                    </div>
                    <div class="service-item-desc">
                        <p>Laborum adipisicing do amet commodo occaecat do amet commodo occaecat.</p>
                        <div class="content-title-underline-light"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 service-padding">
                <div class="service-item">
                    <a href="news-list">
                        <div class="service-item-icon"><i class="fa fa-newspaper-o fa-3x"></i>
                        </div>
                    </a>
                    <div class="service-item-title">
                        <h3><?php echo $lang['latest_technology_news']?></h3>
                    </div>
                    <div class="service-item-desc">
                        <p>Laborum adipisicing do amet commodo occaecat do amet commodo occaecat.</p>
                        <div class="content-title-underline-light"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 service-padding">
                <div class="service-item">
                    <a href="project-form">
                        <div class="service-item-icon"><i class="fa fa-handshake-o fa-3x"></i>
                        </div>
                    </a>
                    <div class="service-item-title">
                        <h3><?php echo $lang['suggest_a_project'] ?></h3>
                    </div>
                    <div class="service-item-desc">
                        <p>Laborum adipisicing do amet commodo occaecat do amet commodo occaecat.</p>
                        <div class="content-title-underline-light"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 service-padding">
                <div class="service-item right-bord">
                    <a href="offers-form">
                        <div class="service-item-icon"><i class="fa fa-share-square-o fa-3x"></i>
                        </div>
                    </a>
                    <div class="service-item-title">
                        <h3><?php echo $lang['suggest_an_offer'] ?></h3>
                    </div>
                    <div class="service-item-desc">
                        <p>Laborum adipisicing do amet commodo occaecat do amet commodo occaecat.</p>
                        <div class="content-title-underline-light"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--====================================================
                        Products
======================================================-->
<section id="latest_products ">
    <div class="container-fluid mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 col-sm-6 desc-comp-offer wow fadeInUp" data-wow-delay="0.2s">
                <h2><?php echo $lang['latest_products'] ?></h2>
                <div class="heading-border-light"></div>
               <a href="products-list"><button  class="btn btn-general btn-green" role="button"><?php echo $lang['watch_more'] ?></button></a>
            </div>
            <?php
            //                  foreach ($result_latest['data'] as $item) {
            //                      template('article_card.php', $item);
            //                  }
            for ($i = 0; $i < 3; $i++) {
                template('cards/product-card-home.php', array());
            }
            ?>
        </div>
    </div>
</section>
<!--====================================================
                        News
======================================================-->
<section id="latest_news">
    <div class="container-fluid mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 col-sm-6 desc-comp-offer wow fadeInUp" data-wow-delay="0.2s">
                <h2><?php echo $lang['latest_news'] ?></h2>
                <div class="heading-border-light"></div>
                <a href="news-list"><button class="btn btn-general btn-green" role="button"><?php echo $lang['watch_more'] ?></button></a>
            </div>
            <?php
            //                  foreach ($result_latest['data'] as $item) {
            //                      template('article_card.php', $item);
            //                  }
            for ($i = 0; $i < 3; $i++) {
                template('cards/news-card.php', array());
            }
            ?>
        </div>
    </div>
</section>


<!--====================================================
                      FOOTER
======================================================-->

