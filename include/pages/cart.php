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
//var_dump($_SESSION);
$link = connectDb_mysqli();
mysqli_set_charset($link, "utf8");
$sq = "'";
$path = '../';
$disabled = false;
?>

<!--====================================================
                       HOME-P
======================================================-->
<div id="confirmation-modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div align="center" class="modal-content" style="margin-top: 100px">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><?php echo $lang['are_you_sure'] ?></h4>
            </div>
            <div class="modal-body">
                <form action=""  method="post" class="form-horizontal col" >
                    <div class="form-group">
                        <label class="col control-label text-left "><?php echo $lang['send_note'] ?></label>
                        <div class="col">
                            <textarea required id="cart-note"  class="form-control" placeholder="<?php echo $lang['send_note_ex'] ?>" name="" type="text"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-8 ">
                            <button id="submit-cart" class="btn btn-primary  mr-2"><?php echo $lang['yes'] ?></button>
                            <button id="cancel-cart" class="btn btn-primary  mr-2"><?php echo $lang['no'] ?></button>
                        </div>
                    </div>
                </form>

            </div>

        </div>

    </div>
</div>
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
            if(isset($_SESSION['user_id']) && isset($_SESSION['order_id']))
            {
                $query = "select c.id as cart_id, c.product_id, c.sub_total, c.quantity, p.name, p.description_ar, p.description_en, p.pic, o.id as order_id, o.msg, o.status as order_status, o.user_id, p.price, p.price_vip from cart c inner join product p on c.product_id=p.id inner join itsource.order o on c.order_id=o.id where o.user_id={$_SESSION['user_id']} and o.id= {$_SESSION['order_id']}";

                if ($result = mysqli_query($link, $query)) {

                    while ($row = mysqli_fetch_assoc($result)) {
                        $msg = $row['msg'];
                        $product_id=$row['product_id'];
                        $cart_id=$row['cart_id'];
                        $order_status=$row['order_status'];
//                    var_dump($row['order_status']);
//                    exit;
                        if ($row['order_status'] == 2) {
                            $disabled = true;
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
                                'order_status' => $row['order_status'],


                            );

                            template('cards/cart-card.php', $arr);

                        } else if ($row['order_status'] == 3 || $row['order_status'] == 4) {
                            $date = date('Y-m-d', time());

                            $query1 = "insert into itsource.order (user_id, status, date) VALUES ({$_SESSION['user_id']},1,{$sq}{$date}{$sq})";

                            if (mysqli_query($link, $query1) === TRUE) {
                                $last_id = mysqli_insert_id($link);
                                $_SESSION['order_id'] = $last_id;
                            }
                            break;

                        } else {
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
                                'order_status' => $row['order_status'],

                            );

                            template('cards/cart-card.php', $arr);
                        }

                    }

                }
            }
            else
            {
                echo 'general error';
            }

            ?>
            </tbody>
            <tfoot>
            <tr>
                <td></td>
                <td colspan="2" style="color: red"
                    class="hidden-xs"><?php if(isset($order_status) && $order_status==2) echo $lang['pending']; else if (isset($msg) && !empty($msg)) echo $msg;else  ?></td>
                <td class="hidden-xs text-center"><strong id="total-price"></strong></td>
                <?php if (!$disabled) { ?>
                    <td><a  class="btn btn-general btn-green submit-cart"><?php echo $lang['submit'] ?><i
                                    class="fa fa-angle-right prev-arrow"></i></a></td>
                <?php } ?>

                <input id="total-price-hidden" type="hidden" value="">
                <input id="pid" type="hidden" value="<?php echo $product_id ?>">
                <input id="cid" type="hidden" value="<?php echo $cart_id ?>">
            </tr>
            </tfoot>
        </table>
    </div>
</section>

<!--====================================================
                      FOOTER
======================================================--> 

