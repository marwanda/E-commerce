<?php
function is_connected()
{
    $connected = @fsockopen("www.example.com", 80);
    //website, port  (try 80 or 443)
    if ($connected){
        $is_conn = true; //action when connected
        fclose($connected);
    }else{
        $is_conn = false; //action in connection failure
    }
    return $is_conn;
}

if(is_connected())
{
    $xml = simplexml_load_file('https://www.zamanalwsl.net/news/rss/94/');
}
else
{
    $_SESSION['error_msg']=$lang['general_error'];
    redirect('home');
}


?>

<!--====================================================
                       HOME-P
======================================================-->
<div id="home-p" class="home-p pages-head1 text-center">
    <div class="container">
        <h1 class="wow fadeInUp" data-wow-delay="0.1s"><?php echo $lang['news'] ?></h1>
        <p><?php echo $lang['discover_more'] ?></p>
    </div><!--/end container-->
</div>

<!--====================================================
                        single-news-p1
======================================================-->

<section id="news_list">
    <div class="container-fluid mt-5 mb-5 news-list-padding">
        <div class="row">
            <?php
            foreach ($xml->channel->item as $itm) { ?>

                <div data-id="<?php ?>" class="col-md-3 col-sm-6 desc-comp-offer wow fadeInUp news-card"
                     data-wow-delay="0.6s">
                    <div class="desc-comp-offer-cont custom-height" style="">
                        <div class="thumbnail-blogs" style="height:145px;">
                            <img src="<?php echo $APP_ROOT . 'assets/img/news-image.jpg' ?>" class="news-card-img" alt="...">
                        </div>
                        <div class="card-body">
                            <a href="<?php echo $itm->link; ?>"><h3 class="card-title-custom news-card-title"><?php echo $itm->title; ?></h3></a>
                            <p class="desc news-card-text"><?php echo $itm->description ?></p>
                            <div class="text-center text-primary"><?php echo date("d-m-Y", strtotime($itm->pubDate)); ?>
                                <i class="fa fa-calendar" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

