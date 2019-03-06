<?php
include '../include/config.php';
require('../include/hundle-ajax.php');


$link = mysqli_connect("localhost", "root", "", "itsource");
mysqli_set_charset($link, "utf8");
$sq = "'";
$path = '../';
$date = date('Y-m-d', time());

if (isset($_POST['submit-category'])) {

    $name_ar = isset($_POST['category-name-ar']) ? make_safe($_POST['category-name-ar']) : null;
    $name_en = isset($_POST['category-name-en']) ? make_safe($_POST['category-name-en']) : null;
    $query = "INSERT INTO category ( name_ar, name_en,status) VALUES ( {$sq}{$name_ar}{$sq},{$sq}{$name_en}{$sq},1)";

    if (mysqli_connect_errno()) {
        $_SESSION['error_msg'] = mysqli_connect_error();
        mysqli_close($link);
        redirect('orders-list', $path);
        exit;
    }

    if (mysqli_query($link, $query) === TRUE) {

        $_SESSION['error_msg'] = $lang['successfully_done'];
        $_SESSION['msg_type'] = 1;

        mysqli_close($link);
        redirect('categories', $path);
        exit;


    } else {
        $_SESSION['error_msg'] = $lang['general_error'];
        $_SESSION['msg_type'] = -1;

        mysqli_close($link);
        redirect('categories', $path);
        exit();
    }
} else if (isset($_POST['action']) && $_POST['action'] == 'delete' && $_POST['cat_id']) {
    $cat_id = make_safe($_POST['cat_id']);
    $query = "delete from category where id = {$cat_id}";

    if (mysqli_query($link, $query) === TRUE) {
        echo 1;
    } else {

        echo -1;
        exit;

    }
} else if (isset($_POST['action']) && $_POST['action'] == 'change-status' && $_POST['cat_id'] && $_POST['status']) {
    $cat_id = make_safe($_POST['cat_id']);
    $status = make_safe($_POST['status']);
    $query = "update category set status={$status} where id = {$cat_id}";

    if (mysqli_query($link, $query) === TRUE) {
        echo 1;
    } else {

        echo -1;
        exit;

    }
} else {
    $_SESSION['error_msg'] = $lang['general_error'];
    $_SESSION['msg_type'] = -1;

    mysqli_close($link);
    redirect('categories', $path);
    exit();
}


?>

