<?php

$link = mysqli_connect("localhost", "root", "", "itsource");
mysqli_set_charset($link, "utf8");
$sq = "'";
$path = '../';
$query = "select c.id as cart_id, c.product_id, c.sub_total, c.quantity, p.name, p.description_ar, p.description_en, p.pic, o.id as order_id, o.user_id, p.price, p.price_vip from cart c inner join product p on c.product_id=p.id inner join itsource.order o on c.order_id=o.id where o.user_id={$_SESSION['user_id']}";

?>

<!--====================================================
                       HOME-P
======================================================-->
<div id="home-p" class="home-p pages-head3 text-center">
    <div class="container">
        <h1 class="wow fadeInUp" data-wow-delay="0.1s">Shoping Box</h1>
    </div><!--/end container-->
</div>

<!--====================================================
                        CART
======================================================-->
<section id="cart" class="cart">
    <div class="container">
        <table id="cart" class="table table-hover table-condensed">
            <thead>
            <tr>
                <th style="width:50%"><?php echo $lang['product'] ?></th>
                <th style="width:10%"><?php echo $lang['price'] ?></th>
                <th style="width:8%"><?php echo $lang['quantity'] ?></th>
                <th style="width:22%" class="text-center"><?php echo $lang['subtotal'] ?></th>
                <th style="width:10%"></th>
            </tr>
            </thead>
            <tbody>

            <?php

            if ($result = mysqli_query($link, $query)) {

                while ($row = mysqli_fetch_assoc($result)) {

                    $arr = array(
                        'cart_id' => $row['cart_id'],
                        'product_id' => $row['product_id'],
                        'sub_total' => $row['sub_total'],
                        'quantity' => $row['quantity'],
                        'name' => $row['name'],
                        'pic' => $row['pic'],
                        'description_en' => $row['description_en'],
                        'description_ar' => $row['description_ar'],
                        'order_id' => $row['order_id'],
                        'price' => $row['price'],
                        'price_vip' => $row['price_vip'],

                    );

                    template('cards/cart-card.php', $arr);
                }

            }
            ?>
            </tbody>
            <tfoot>
            <tr>
                <td></td>
                <td colspan="2" class="hidden-xs"></td>
                <td class="hidden-xs text-center"><strong id="total-price"></strong></td>
                <td><a href="#" class="btn btn-general btn-green submit-cart"><?php echo $lang['submit'] ?><i
                                class="fa fa-angle-right prev-arrow"></i></a></td>
                <input id="total-price-hidden" type="hidden" value="">
            </tr>
            </tfoot>
        </table>
    </div>
</section>

<!--====================================================
                      FOOTER
======================================================--> 

