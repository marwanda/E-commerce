<tr class="cart-card">
    <td data-th="Product">
        <div class="row">
            <div class="col-sm-2 hidden-xs cart-table-img-col"><a
                        href="<?php echo $APP_ROOT . 'product-details/' . $product_id ?>"><img
                            src="<?php echo $FILES_ROOT . 'images/products/large/' . $pic ?>" alt=""
                            class="cart-table-img pic-cart"/></a>
            </div>
            <div class="col-sm-10 prod-desc">
                <h6 class="nomargin"><?php echo $name ?></h6>
                <p><?php if ($_SESSION['lang'] = 'en') echo $description_en; else echo $description_ar; ?></p>
            </div>
        </div>
    </td>
    <td data-th="Price"
        class="product-price"><?php if (isset($_SESSION['role']) && $_SESSION['role'] == 3) echo $price_vip . ' ' . $lang['sp']; else echo $price . ' ' . $lang['sp']; ?> </td>
    <td data-th="Quantity" class="quantity">
        <?php if ($order_status == 2) {
            ?>
            <input data-pid="<?php echo $product_id; ?>" disabled type="number" class="form-control text-center quantity-value" min="1"
                   value="<?php echo $quantity ?>">
        <?php } else { ?>

            <input data-pid="<?php echo $product_id; ?>" type="number" class="form-control text-center quantity-value" min="1"
                   value="<?php echo $quantity ?>">
        <?php } ?>

    </td>
    <td data-th="Subtotal"
        class="text-center sub-price"><?php if ($_SESSION['role'] == 3) echo $price_vip * $quantity . ' ' . $lang['sp']; else echo $price * $quantity . ' ' . $lang['sp'] ?></td>
    <td class="actions" data-th="">
        <?php if ($order_status != 2) {
            ?>
            <button data-pid="<?php echo $product_id; ?>" data-cid="<?php echo $cart_id; ?>"
                    class="btn btn-info btn-sm refresh-cart"><i class="fa fa-refresh"></i></button>
            <button data-pid="<?php echo $product_id; ?>" data-cid="<?php echo $cart_id; ?>"
                    class="btn btn-danger btn-sm delete-cart"><i class="fa fa-trash-o"></i></button>
        <?php } ?>




    </td>
</tr>
