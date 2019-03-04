<?php
require('../include/config.php');
require('../include/hundle-ajax.php');
$link = mysqli_connect("localhost", "root", "", "itsource");
mysqli_set_charset($link, "utf8");
$sq = "'";
$path = '../';

if (isset($_POST['action']) && $_POST['action'] == 'change-status' && isset($_POST['user_id']) && isset($_POST['user_status'])) {

    $user_id = make_safe($_POST['user_id']);
    $status = make_safe($_POST['user_status']);

    $query = "update user set role={$status} where id={$user_id}";
    //block 4
    //active 2
    //vip 3

    if (mysqli_query($link, $query) === TRUE) {
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


?>