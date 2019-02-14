

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
    <div class="container-fluid mt-5 mb-5 news-list-padding" >
        <div class="row">
            <?php
            //                  foreach ($result_latest['data'] as $item) {
            //                      template('article_card.php', $item);
            //                  }
            for ($i=0;$i<10;$i++)
            {
                template('cards/order-card.php', array());
            }
            ?>
        </div>
    </div>
</section>

