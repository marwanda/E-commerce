<?php
require('../include/config.php');
$link = mysqli_connect("localhost", "root", "", "itsource");
mysqli_set_charset($link, "utf8");
$sq = "'";
$path = '../';
if (isset($_POST['action']) && $_POST['action'] == 'delete' && isset($_POST['product_id'])) {
    $product_id = make_safe($_POST['product_id']);

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