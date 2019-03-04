<?php
include '../include/config.php';
$full_name = isset($_POST['full-name']) ? make_safe($_POST['full-name']) : null;
$mobile = isset($_POST['mobile']) ? make_safe($_POST['mobile']) : null;
$email = isset($_POST['email']) ? make_safe($_POST['email']) : null;
$gender = isset($_POST['gender']) ? make_safe($_POST['gender']) : null;
$birthday = isset($_POST['birthday']) ? make_safe($_POST['birthday']) : null;
$address = isset($_POST['address']) ? make_safe($_POST['address']) : null;


$link = mysqli_connect("localhost", "root", "", "itsource");
mysqli_set_charset($link, "utf8");
$sq = "'";
$path = '../';

$query = "update user set  name= {$sq}{$full_name}{$sq}, phone= {$sq}{$mobile}{$sq}, email = {$sq}{$email}{$sq}, gender = {$gender} , birthdate= {$sq}{$birthday}{$sq}, address= {$sq}{$address}{$sq}, role= 5 where id= {$_SESSION['admin_id']}";

if (mysqli_connect_errno()) {
    $_SESSION['error_msg'] = mysqli_connect_error();
    mysqli_close($link);
    redirect('orders-list', $path);
    exit;
}

if (mysqli_query($link, $query) === TRUE) {
    mysqli_close($link);
    $_SESSION['error_msg'] =$lang['successfully_done'];
    redirect('admin-profile', $path);
    exit;
} else {

    $_SESSION['error_msg'] = $lang['general_error'];
    mysqli_close($link);
    redirect('orders-list', $path);
    exit();
}


?>
