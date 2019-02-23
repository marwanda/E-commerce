<div data-id="<?php echo $id ?>" class="col-md-3 col-sm-6 desc-comp-offer wow fadeInUp product-card-home" data-wow-delay="0.6s">
    <a href="<?php echo $APP_ROOT . 'product-details/' . $id ?>" class="card-link">
    <div class="desc-comp-offer-cont custom-height text-center ">
        <div class="thumbnail-blogs">
            <img src="<?php echo $FILES_ROOT . "images/products/large/" . $pic; ?>" class="img-fluid home-product-card-img" alt="...">
        </div>
        <div class="card-body">
            <h3 class="text-center card-title-custom" href="#"><?php echo $name ?></h3>
            <p class="desc text-center "><?php echo $_SESSION['lang'] == 'en' ? $cat_name_en . ' - ' . $sub_name_en : $cat_name_ar . ' - ' . $sub_name_ar ?></p>

            <span class="desc text-center primary-color"><?php if (isset($_SESSION['role']) && $_SESSION['role'] == 3) {
                    echo $price_vip . ' ' . $lang['sp'];
                } else {
                    echo $price . ' ' . $lang['sp'];
                } ?> </span>
<!--            <div class="row card-text primary-color" >-->
<!--                <div class="col-6 text-left "><span class="ml-2"><i class="fa fa-eye mr-2 " aria-hidden="true"></i>50-->
<!--</span>-->
<!--                </div>-->
<!--                <div class="col-6 text-right ">10/10/2019 <span class="mr-2"><i class="fa fa-calendar "-->
<!--                                                                                aria-hidden="true"></i>-->
<!--</span>-->
<!--                </div>-->
<!--            </div>-->
        </div>

    </div>
</a>
</div>