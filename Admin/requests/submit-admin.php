<?php
include '../include/config.php';
$full_name = isset($_POST['full-name']) ? make_safe($_POST['full-name']) : null;
$password = isset($_POST['password']) ? make_safe($_POST['password']) : null;
$mobile = isset($_POST['mobile']) ? make_safe($_POST['mobile']) : null;
$email = isset($_POST['email']) ? make_safe($_POST['email']) : null;
$gender = isset($_POST['gender']) ? make_safe($_POST['gender']) : null;
$birthday = isset($_POST['birthday']) ? make_safe($_POST['birthday']) : null;
$address = isset($_POST['address']) ? make_safe($_POST['address']) : null;
$job = isset($_POST['job']) ? make_safe($_POST['job']) : null;


$link = connectDb_mysqli();
mysqli_set_charset($link, "utf8");

$sq = "'";
$path = '../';
$query = "INSERT INTO user ( name, password, email, phone, address, gender, birthdate, role,job) VALUES ( {$sq}{$full_name}{$sq}, {$sq}{$password}{$sq}, {$sq}{$email}{$sq}, {$sq}{$mobile}{$sq}, {$sq}{$address}{$sq}, {$sq}{$gender}{$sq}, {$sq}{$birthday}{$sq}, 5,{$sq}{$job}{$sq})";

if (mysqli_connect_errno()) {
    $_SESSION['error_msg'] = mysqli_connect_error();
    mysqli_close($link);
    redirect('orders-list',$path);
    exit;
}

if (mysqli_query($link, $query) === TRUE) {
    $last_id = mysqli_insert_id($link);
    mysqli_close($link);
    $_SESSION['error_msg'] =$lang['successfully_done'];
    $_SESSION['msg_type'] = 1;
    redirect('admins-list',$path);
    exit;
}

else {

    $_SESSION['error_msg'] = $lang['general_error'];
    $_SESSION['msg_type'] = -1;
    mysqli_close($link);
    redirect('orders-list',$path);
    exit();
}


?>
