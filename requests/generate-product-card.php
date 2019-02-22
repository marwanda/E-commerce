<?php
include '../include/config.php';
if($_POST)
{

    if( isset($_POST['id']))
    {
        $id= make_safe($_POST['id']);
    }
    if( isset($_POST['pic']))
    {
        $pic= make_safe($_POST['pic']);
    }
    if( isset($_POST['name']))
    {
        $name= make_safe($_POST['name']);
    }
    if( isset($_POST['price_vip']))
    {
        $price_vip= make_safe($_POST['price_vip']);
    }
    if( isset($_POST['price']))
    {
        $price= make_safe($_POST['price']);
    }
    if( isset($_POST['status']))
    {
        $status= make_safe($_POST['status']);
    }
    if( isset($_POST['sub_name_en']))
    {
        $sub_name_en= make_safe($_POST['sub_name_en']);
    }
    if( isset($_POST['sub_name_ar']))
    {
        $sub_name_ar= make_safe($_POST['sub_name_ar']);
    }
    if( isset($_POST['cat_name_en']))
    {
        $cat_name_en= make_safe($_POST['cat_name_en']);
    }
    if( isset($_POST['cat_name_ar']))
    {
        $cat_name_ar= make_safe($_POST['cat_name_ar']);
    }

}

?>
<div data-id="<?php echo $id?>" class="col-lg-4 col-md-6 mb-4 product-card">
    <div class="card ">
        <a href="<?php echo $APP_ROOT . 'product-details/'.$id ?>"><img class="card-img-top" src="<?php echo $FILES_ROOT."images/products/large/". $pic; ?>" alt=""></a>
        <div class="card-body text-center">
            <div class="card-title">
                <a href="<?php echo $APP_ROOT . 'product-details?ID='.$id ?>"><h4 class="card-title-custom"><?php echo $name ?></h4></a>
            </div>
            <p class="desc text-center"><?php echo $_SESSION['lang']=='en'? $cat_name_en. ' - '.$sub_name_en : $cat_name_ar. ' - '.$sub_name_ar  ?></p>
            <div class="cart-icon text-center">
                <h5 class="primary-color mb-4"><?php if(isset($_SESSION['role']) && $_SESSION['role']==3){echo $price_vip.' '.$lang['sp'];}else {echo $price.' '.$lang['sp'];} ?> </h5>
                <?php
                if($status!=1)
                {?>
                    <p><?php echo $lang['product_unavailable']?></p><?php
                }else{?>
                <a href="#" data-id="<?php echo $id ?>" class="add-to-cart"
                   class="<?php if (isset($_SESSION['role']) && ($_SESSION['role'] == 2 || $_SESSION['role'] == 3)) {
                       ?>add-to-cart <?php } else { ?>add-to-cart-login <?php } ?>"><i class="fa fa-cart-plus"></i><?php echo $lang['add_to_cart'];
                    }
                    ?>
                </a>
            </div>
        </div>
    </div>
</div>
