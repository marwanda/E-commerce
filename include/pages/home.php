<?php
if (isset($_SESSION['error_msg']) && !empty($_SESSION['error_msg']) && isset($_SESSION['msg_type'])) {
    if($_SESSION['msg_type']==1)
    echo '<input id="error-msg" data-type="success"  type="hidden" value="'.$_SESSION['error_msg'].'">';
    else if($_SESSION['msg_type']==-1)
        echo '<input id="error-msg" data-type="error"  type="hidden" value="'.$_SESSION['error_msg'].'">';
    else
        echo '<input id="error-msg" data-type="warn"  type="hidden" value="'.$_SESSION['error_msg'].'">';
    $_SESSION['error_msg'] = '';
    $_SESSION['msg_type'] = '';

}

function is_connected()
{
    $connected = @fsockopen("www.google.com", 80);
    //website, port  (try 80 or 443)
    if ($connected) {
        $is_conn = true; //action when connected
        fclose($connected);
    } else {
        $is_conn = false; //action in connection failure
    }
    return $is_conn;
}

if (is_connected() && $_SESSION['lang']=='ar') {
    $xml = simplexml_load_file('https://www.zamanalwsl.net/news/rss/94/');
}
else if(is_connected() && $_SESSION['lang']=='en')
{
    $xml = simplexml_load_file('https://en.zamanalwsl.net/news/rss/52/');
}
    else $xml = null;

$link = connectDb_mysqli();
mysqli_set_charset($link, "utf8");
$sq = "'";
$path = '../';
$query = "select p.id, p.name, p.price, p.price_vip, p.description_ar, p.description_en, p.pic, p.subcategory_id, p.quantity, p.date, p.status, s.name_ar as sub_name_ar, s.name_en as sub_name_en, s.status as sub_status, s.category_id, c.name_ar as cat_name_ar, c.name_en as cat_name_en, c.status as cat_status from product p inner join subcategory s on p.subcategory_id=s.id inner join category c on s.category_id = c.id where s.status=1 and c.status=1 order by date desc";
//
if (mysqli_connect_errno()) {
    $_SESSION['error_msg'] = $lang['sql_problem'];
    echo '<input id="error-msg" data-type="error"  type="hidden" value="'.$_SESSION['error_msg'].'">';
    $_SESSION['error_msg'] ='';
}

//var_dump($_SESSION);
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
                    <h3><?php echo $lang['slide_one'] ?></h3>
                </div>
            </div>
            <!-- Slide Two - Set the background image for this slide in the line below -->
            <div class="carousel-item" style="background-image: url('assets/img/shop/shop-banner-2.jpg')">
                <div class="carousel-caption d-none d-md-block">
                    <h3><?php echo $lang['slide_two'] ?></h3>
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
        <!--                <p class="wow fadeInUp" data-wow-delay="0.4s">-->
        <?php //echo $lang['home_title_text'] ?><!--</p>-->
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
                        <h3><?php echo $lang['online_shopping'] ?></h3>
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
                        <h3><?php echo $lang['latest_technology_news'] ?></h3>
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
                        <div class="service-item-icon"><i class="fa fa-file-o fa-3x"></i>
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
                <a href="products-list">
                    <button class="btn btn-general btn-green" role="button"><?php echo $lang['watch_more'] ?></button>
                </a>
            </div>
            <?php
            $i = 0;
            if ($result = mysqli_query($link, $query)) {
                $count = mysqli_num_rows($result);
                if ($count > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        if ($i < 3) {
                            $i++;
                            $arr = array(
                                'id' => $row['id'],
                                'name' => $row['name'],
                                'price' => $row['price'],
                                'price_vip' => $row['price_vip'],
                                'pic' => $row['pic'],
                                'description_ar' => $row['description_ar'],
                                'description_en' => $row['description_en'],
                                'sub_id' => $row['subcategory_id'],
                                'sub_name_ar' => $row['sub_name_ar'],
                                'sub_name_en' => $row['sub_name_en'],
                                'sub_status' => $row['sub_status'],
                                'cat_id' => $row['category_id'],
                                'cat_name_ar' => $row['cat_name_ar'],
                                'cat_name_en' => $row['cat_name_en'],
                                'cat_status' => $row['cat_status'],
                                'quantity' => $row['quantity'],
                                'date' => $row['date'],
                                'status' => $row['status'],
                            );

                            template('cards/product-card-home.php', $arr);
                        } else
                            break;

                    }

                } else {

                    echo '<div>' . $lang['no_content'] . '</div>';

                }
            }

            //
            //
            //                    ?>
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
                <a href="news-list">
                    <button class="btn btn-general btn-green" role="button"><?php echo $lang['watch_more'] ?></button>
                </a>
            </div>
            <?php
            if ($xml != null) {
                $i = 0;

                foreach ($xml->channel->item as $itm) {
                    if ($i < 3) {
                        $i++; ?>
                        <div data-id="<?php ?>" class="col-md-3 col-sm-6 desc-comp-offer wow fadeInUp news-card"
                             data-wow-delay="0.6s">
                            <div class="desc-comp-offer-cont custom-height" style="">
                                <div class="thumbnail-blogs" >
                                    <img src="<?php echo $itm->enclosure['url'] ?>" class="news-card-img" alt="...">
                                </div>
                                <div class="card-body">
                                    <a href="<?php echo $itm->link; ?>"><h3
                                                class="card-title-custom news-card-title"><?php echo $itm->title; ?></h3>
                                    </a>
                                    <div dir="auto" class="desc news-card-text"><?php echo $itm->description ?></div>
                                    <div class="text-center text-primary"><?php echo date("d-m-Y", strtotime($itm->pubDate)); ?>
                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } else break; ?>


                <?php }
            } else {
                ?>
                <div><?php echo $lang['there_is_no_internet_connection'] ?></div>
            <?php }
            ?>
        </div>
    </div>
</section>
<!--<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>-->


<!--====================================================
                      FOOTER
======================================================-->

