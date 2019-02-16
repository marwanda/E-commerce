<div class="col-lg-4 col-md-6 mb-4">
    <div data-id="<?php echo '' ?>" class="card ">
        <a href="<?php echo $APP_ROOT . 'product-details' ?>"><img class="card-img-top" src="assets/img/shop/shop-item-1.jpg" alt=""></a>
        <div class="card-body text-center">
            <div class="card-title">
                <a href="<?php echo $APP_ROOT . 'product-details' ?>"><h4
                            class="card-title-custom"><?php echo 'HP laptop 420XG' ?></h4></a>
            </div>
            <h5 class="primary-color"><?php echo '30000 S.P' ?></h5>
            <div class="cart-icon text-center">
                <a href="#"
                   class="<?php if (isset($_SESSION['role']) && ($_SESSION['role'] == 2 || $_SESSION['role'] == 3)) {
                       ?>add-to-cart <?php } else { ?>add-to-cart-login <?php } ?>"><i class="fa fa-cart-plus"></i> Add to Cart</a>
            </div>
        </div>
    </div>
</div>