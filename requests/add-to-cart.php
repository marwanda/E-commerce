<?php
include "../include/config.php";
//$_POST['action']='add';
//$_POST['product_id']=6;



$link = mysqli_connect("localhost", "root", "", "itsource");
mysqli_set_charset($link, "utf8");
$sq = "'";
$path = '../';
$query = "select o.status from itsource.order o where o.id = {$_SESSION['order_id']}";
if ($result = mysqli_query($link, $query)) {

    while ($row = mysqli_fetch_assoc($result)) {


        if ($row['status'] == 2) {

            echo 3;
            exit;
        }
    }

}


if (isset($_POST['action']) && $_POST['action'] == 'add') {


    $user_id = $_SESSION['user_id'];
    if (isset($_POST['product_id']) && isset($_SESSION['order_id']) && isset($user_id) && isset($_SESSION['role']) && ($_SESSION['role'] == 2 || $_SESSION['role'] == 3)) {


        $product_id = make_safe($_POST['product_id']);

        $query_get_price = "select p.price, p.price_vip from product p where p.id= {$product_id}";
        $price = '';


        if ($result = mysqli_query($link, $query_get_price)) {

            while ($row = mysqli_fetch_assoc($result)) {

                if ($_SESSION['role'] == 3) {
                    $price = $row['price_vip'];
                } else {
                    $price = $row['price'];
                }


            }

        }

        $query = "select o.status from itsource.order o where o.id = {$_SESSION['order_id']}";
        $date = date('Y-m-d', time());
        $query1 = "insert into itsource.order (user_id, status, date) VALUES ({$user_id},1,{$sq}{$date}{$sq})";
        $query2 = "insert into cart (product_id,order_id,quantity) VALUES ({$product_id},{$_SESSION['order_id']},1)";
        $query4 = "select * from cart where order_id = {$_SESSION['order_id']}";

        if ($result = mysqli_query($link, $query)) {

            $count = mysqli_num_rows($result);

            if ($count > 0) {

                while ($row = mysqli_fetch_assoc($result)) {

                    if ($row['status'] == 3 || $row['status'] == 4) {

                        if (mysqli_query($link, $query1) === TRUE) {
                            $last_id = mysqli_insert_id($link);
                            $_SESSION['order_id'] = $last_id;
//                        $err = array('order_id' =>$last_id);
//                        echo json_encode($err);
//                        mysqli_close($link);
                            $query3 = "insert into cart (product_id,order_id,quantity) VALUES ({$product_id},{$_SESSION['order_id']},1)";
                            $query4 = "select * from cart where order_id = {$_SESSION['order_id']}";

                            if ($result = mysqli_query($link, $query4)) {
                                $count = mysqli_num_rows($result);

                                if ($count > 0) {

                                    echo 2;
                                    mysqli_close($link);
                                    exit;
                                } else {
                                    if (mysqli_query($link, $query3) === TRUE) {

                                        echo 1;
                                        mysqli_close($link);
                                        exit;
                                    } else {

                                        mysqli_close($link);
                                        echo -1;
                                        exit();
                                    }
                                }

                            } else {

                                mysqli_close($link);
                                echo -1;
                                exit();
                            }


                        } else {

                            mysqli_close($link);
                            echo -1;
                            exit();
                        }

                    } else if ($row['status'] == 2) {

                        mysqli_close($link);
                        echo 3;
                        exit();
                    } else {
                        $query4 = "select * from cart where product_id = {$product_id} and  order_id = {$_SESSION['order_id']}";

                        if ($result = mysqli_query($link, $query4)) {

                            $count = mysqli_num_rows($result);
                            if ($count > 0) {

                                echo 2;
                                mysqli_close($link);
                                exit;
                            } else {
                                $query3 = "insert into cart (product_id,order_id,quantity) VALUES ({$product_id},{$_SESSION['order_id']},1)";
                                if (mysqli_query($link, $query3) === TRUE) {

                                    echo 1;
                                    mysqli_close($link);
                                    exit;
                                } else {

                                    mysqli_close($link);
                                    echo -1;
                                    exit();
                                }
                            }

                        } else {
                            mysqli_close($link);
                            echo -1;
                            exit();
                        }
                    }
                }
            } else {
                if (mysqli_query($link, $query1) === TRUE) {
                    $last_id = mysqli_insert_id($link);
                    $_SESSION['order_id'] = $last_id;
                    $query3 = "insert into cart (product_id,order_id,quantity) VALUES ({$product_id},{$_SESSION['order_id']},1)";
                    if (mysqli_query($link, $query3) === TRUE) {

                        echo 1;
                        mysqli_close($link);
                        exit;
                    } else {

                        mysqli_close($link);
                        echo -1;
                        exit();
                    }
                }
            }


        } else {

            mysqli_close($link);
            echo -1;
            exit();
        }

    }

} else if (isset($_POST['action']) && $_POST['action'] == 'refresh' && isset($_POST['product_id']) && isset($_POST['cart_id']) && isset($_POST['quantity']) && isset($_SESSION['order_id'])) {

    $quantity = make_safe($_POST['quantity']);
    $product_id = make_safe($_POST['product_id']);
    $cart_id = make_safe($_POST['cart_id']);

    $query_price = "select p.price, p.price_vip from product p where id= {$product_id}";

    if ($result = mysqli_query($link, $query_price)) {

        while ($row = mysqli_fetch_assoc($result)) {
            if ($_SESSION['role'] == 2) {
                $price = $row['price'];
            } else if ($_SESSION['role'] == 3) {
                $price = $row['price_vip'];
            } else {
                echo -1;
                exit;
            }

        }
        $new_sub_total = $price * $quantity;

        $query_sub_total_update = "update cart set sub_total = {$new_sub_total} , quantity={$quantity} where id= {$cart_id} and order_id= {$_SESSION['order_id']}";

        if (mysqli_query($link, $query_sub_total_update) === TRUE) {

            echo 1;
            exit;

        } else {
            echo -1;
            exit;
        }

    } else {
        echo -1;
        exit;
    }

    $query = "update cart set quantity = {$quantity}, sub_total= {$_new_sub_total} where id = {$cart_id} and order_id = {$_SESSION['order_id']}";
    if (mysqli_query($link, $query) === TRUE) {

        echo 1;
        exit;

    } else {
        echo -1;
        exit;
    }

}
else if (isset($_POST['action']) && $_POST['action'] == 'delete' && isset($_POST['cart_id']) && isset($_SESSION['order_id'])) {

    $cart_id = make_safe($_POST['cart_id']);

    $query = "delete from cart where id = {$cart_id} and order_id= {$_SESSION['order_id']}";
    if (mysqli_query($link, $query) === TRUE) {

        echo 1;
        exit;

    } else {
        echo -1;
        exit;
    }

} else if (isset($_POST['action']) && $_POST['action'] == 'submit' && isset($_SESSION['order_id']) && isset($_POST['qp_array'])) {

    $qp_array = make_safe_array($_POST['qp_array']);

    foreach ($qp_array as $item) {
        $quantity = $item['q'];
        $product_id = $item['pid'];
        $price = '';
        // get price
        $price_query = "select p.price, p.price_vip from product p where p.id = {$product_id}";
        if ($result = mysqli_query($link, $price_query)) {

            while ($row = mysqli_fetch_assoc($result)) {
                if ($_SESSION['role'] == 3) {
                    $price = $row['price_vip'];
                } else {
                    $price = $row['price'];
                }
            }
        }
        //store subtotals and quantities
        $subtotal = $quantity * $price;
        $query = "update cart set quantity= {$quantity}, sub_total= {$subtotal} where product_id={$product_id} and order_id = {$_SESSION['order_id']}";
        if (mysqli_query($link, $query) === TRUE) {

        } else {
            echo -1;
            exit;
        }
    }
    // calculate total price
    $query = "select sub_total from cart where order_id= {$_SESSION['order_id']}";
    $total = 0;
    if ($result = mysqli_query($link, $query)) {

        while ($row = mysqli_fetch_assoc($result)) {

            $total = $total + $row['sub_total'];

        }
    }
    //store total
    $date = date('Y-m-d', time());
    if (isset($_POST['note'])) {
        $note = make_safe($_POST['note']);
        $query = "update itsource.order set note = {$sq}{$note}{$sq}, total = {$total}, date= {$sq}{$date}{$sq}, status= 2 where id = {$_SESSION['order_id']}";

    } else
        $query = "update itsource.order set total = {$total}, date= {$sq}{$date}{$sq}, status= 2 where id = {$_SESSION['order_id']}";
    if (mysqli_query($link, $query) === TRUE) {
      $_SESSION['error_msg']=$lang['successfully_done'];
      $_SESSION['msg_type']=1;
      echo 1;
      exit;
    } else {
        $_SESSION['error_msg']=$lang['general_error'];
        $_SESSION['msg_type']=-1;
        echo -1;
        exit;
    }
} else {
    $_SESSION['error_msg']=$lang['general_error'];
    $_SESSION['msg_type']=-1;
    echo -1;
    exit();
}


//$query2 = "select o.id from itsource.order o inner join user u on o.user_id = u.id where u.id= {$_SESSION['user_id']} and o.status=1 or o.status=2";
//$date = date('Y-m-d', time());



