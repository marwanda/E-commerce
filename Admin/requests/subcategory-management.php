<?php
include '../include/config.php';
require('../include/hundle-ajax.php');


$link = mysqli_connect("localhost", "root", "", "itsource");
mysqli_set_charset($link, "utf8");
$sq = "'";
$path = '../';
$date = date('Y-m-d', time());

if (isset($_POST['submit-subcategory'])){

    $cat_id = isset($_POST['category-select']) ? make_safe($_POST['category-select']) : null;
    $name_ar = isset($_POST['subcategory-name-ar']) ? make_safe($_POST['subcategory-name-ar']) : null;
    $name_en = isset($_POST['subcategory-name-en']) ? make_safe($_POST['subcategory-name-en']) : null;
    $query = "INSERT INTO subcategory ( name_ar, name_en, category_id,status) VALUES ( {$sq}{$name_ar}{$sq},{$sq}{$name_en}{$sq},{$cat_id},1)";
//var_dump($cat_id);exit;
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
        redirect('subcategories', $path);
        exit;


    } else {
        $_SESSION['error_msg'] = $lang['general_error'];
        $_SESSION['msg_type'] = -1;
        mysqli_close($link);
        redirect('subcategories', $path);
        exit();
    }
} else if (isset($_POST['action']) && $_POST['action'] == 'delete' && $_POST['sub_id']) {
    $sub_id = make_safe($_POST['sub_id']);
    $query = "delete from subcategory where id = {$sub_id}";

    if (mysqli_query($link, $query) === TRUE) {
        echo 1;
    } else {

        echo -1;
        exit;

    }
} else if (isset($_POST['action']) && $_POST['action'] == 'change-status' && $_POST['sub_id'] && $_POST['status']) {
    $sub_id = make_safe($_POST['sub_id']);
    $status = make_safe($_POST['status']);
    $query = "update subcategory set status={$status} where id = {$sub_id}";

    if (mysqli_query($link, $query) === TRUE) {
        echo 1;
    } else {

        echo -1;
        exit;

    }
} else {
    echo -1;
    exit;
//    $_SESSION['error_msg'] = $lang['general_error'];
//    mysqli_close($link);
//    redirect('categories', $path);
//    exit();
}


?>
