<?php $xml = simplexml_load_file('https://www.zamanalwsl.net/news/rss/94/');

?>

<!--====================================================
                       HOME-P
======================================================-->
<div id="home-p" class="home-p pages-head1 text-center">
    <div class="container">
        <h1 class="wow fadeInUp" data-wow-delay="0.1s">News</h1>
        <p>Discover more</p>
    </div><!--/end container-->
</div>

<!--====================================================
                        single-news-p1
======================================================-->

<section id="news_list">
    <div class="container-fluid mt-5 mb-5 news-list-padding">
        <div class="row">
            <?php
            foreach ($xml->channel->item as $itm) {?>

               <div data-id="<?php ?>" class="col-md-3 col-sm-6 desc-comp-offer wow fadeInUp news-card" data-wow-delay="0.6s">
    <div class="desc-comp-offer-cont custom-height">
        <div class="thumbnail-blogs">
            <img src="<?php echo $itm->enclosure['url']?>" class="img-fluid" alt="...">
        </div>
        <div class="card-body">
            <a href="<?php echo $itm->link;?>"><h3 class="card-title-custom"><?php echo $itm->title;?></h3></a>
            <p class="desc news-card-text"><?php echo $itm->description ?></p>
            <div class="row card-text " style="color:#2196f3">
                <div class="col-6 text-left ">
                </div>
                <div class="col-6 text-right "><span class="mr-2"><?php echo  date("d-m-Y", strtotime($itm->pubDate)); ?><i class="fa fa-calendar" aria-hidden="true"></i></span>
                </div>
            </div>
        </div>

    </div>
    </div>

          <?php  } ?>

        </div>
    </div>
</section>

