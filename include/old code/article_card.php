<?php
/**
 * Created by PhpStorm.
 * User: Marwan
 * Date: 12/4/2018
 * Time: 1:52 PM
 */
?>

<div data-id="<?php echo $articleId ?>" class="col-md-3 col-sm-6 desc-comp-offer wow fadeInUp consulting_card"
     data-wow-delay="0.4s"
     style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
    <div class="desc-comp-offer-cont">
        <div class="thumbnail-blogs">
            <div class="caption" style="display: none;">
                <i class="fa fa-chain"></i>
            </div>
            <img src="img/news/news-11.jpg" class="img-fluid" alt="...">
        </div>
        <a><?php echo $adminName ?>
        </a>
        <h3><?php echo $subject ?>
        </h3>
        <p class="desc"><?php echo $headline ?>
        </p>
        <div class="row" style="color:#2196f3">
            <div class="col-6  "><span class="ml-2"><i class="fa fa-eye mr-2" aria-hidden="true"></i>
</span>
            </div>
            <div class="col-6 text-right "><span class="mr-2"><i class="fa fa-calendar" aria-hidden="true"></i>
</span>
            </div>
        </div>


    </div>
</div>