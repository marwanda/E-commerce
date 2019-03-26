<?php
include '../include/config.php';
require('../include/hundle-ajax.php');


$link = connectDb_mysqli();
mysqli_set_charset($link, "utf8");
$sq = "'";
$path = '../';
$date = date('Y-m-d', time());

if (isset($_POST['submit-companies'])) {

    $name = isset($_POST['name']) ? make_safe($_POST['name']) : null;
    $phone = isset($_POST['phone']) ? make_safe($_POST['phone']) : null;
    $email = isset($_POST['email']) ? make_safe($_POST['email']) : null;
    $business = isset($_POST['business']) ? make_safe($_POST['business']) : null;
    $address = isset($_POST['address']) ? make_safe($_POST['address']) : null;

    $query = "INSERT INTO companies ( name, phone,business,email,address) VALUES ( {$sq}{$name}{$sq},{$sq}{$phone}{$sq},{$sq}{$business}{$sq},{$sq}{$email}{$sq},{$sq}{$address}{$sq})";

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
        redirect('companies-list', $path);
        exit;


    } else {
        $_SESSION['error_msg'] = $lang['general_error'];
        $_SESSION['msg_type'] = -1;

        mysqli_close($link);
        redirect('companies-list', $path);
        exit();
    }
} else if (isset($_POST['action']) && $_POST['action'] == 'delete' && $_POST['id']) {
    $id = make_safe($_POST['id']);
    $query = "delete from companies where id = {$id}";

    if (mysqli_query($link, $query) === TRUE) {
        echo 1;
    } else {

        echo -1;
        exit;

    }
}  else {
    $_SESSION['error_msg'] = $lang['general_error'];
    $_SESSION['msg_type'] = -1;

    mysqli_close($link);
    redirect('companies-list', $path);
    exit();
}


?>

