<?php
require('../include/config.php');
require('../include/hundle-ajax.php');

$link = mysqli_connect("localhost", "root", "", "itsource");
mysqli_set_charset($link, "utf8");
$sq = "'";
$path = '../';
if (isset($_POST['action']) && $_POST['action'] == 'delete' && isset($_POST['product_id'])) {
    $product_id = make_safe($_POST['product_id']);
    $query = "select c.order_id from cart c inner join itsource.order o on c.order_id=o.id where c.product_id = {$product_id} and o.status=2 limit 1";

    if ($result = mysqli_query($link, $query)) {

        $count = mysqli_num_rows($result);
        if ($count > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo $row['order_id'];
                exit;
            }
        }

    }



    $query = "delete from gallary where product_id = {$product_id}";
    if (mysqli_query($link, $query) === TRUE) {

    } else {

        echo -1;
        exit;

    }

    $query = "delete from cart where product_id = {$product_id}";
    if (mysqli_query($link, $query) === TRUE) {

    } else {

        echo -1;
        exit;

    }


    $query = "delete from product where id = {$product_id}";
    if (mysqli_query($link, $query) === TRUE) {

        echo 1;
        exit;

    } else {

        echo -1;
        exit;
    }

} else if (isset($_POST['action']) && $_POST['action'] == 'change-status' && isset($_POST['product_id']) && isset($_POST['status'])) {

    $product_id = make_safe($_POST['product_id']);
    $status = make_safe($_POST['status']);

    $query = "update product set status = {$status} where id = {$product_id}";

    if (mysqli_query($link, $query) === TRUE) {

        echo 1;
        exit;

    } else {

        echo -1;
        exit;
    }

}


?>