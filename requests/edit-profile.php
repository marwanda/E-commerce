<?php
include '../include/config.php';
$full_name = isset($_POST['full-name']) ? make_safe($_POST['full-name']) : null;
$mobile = isset($_POST['mobile']) ? make_safe($_POST['mobile']) : null;
$email = isset($_POST['email']) ? make_safe($_POST['email']) : null;
$gender = isset($_POST['gender']) ? make_safe($_POST['gender']) : null;
$birthday = isset($_POST['birthday']) ? make_safe($_POST['birthday']) : null;
$address = isset($_POST['address']) ? make_safe($_POST['address']) : null;


$_SESSION['phone'] = $mobile;

$link = connectDb_mysqli();
mysqli_set_charset($link, "utf8");
$sq = "'";
$path = '../';
if ($mobile != $_SESSION['phone'])
    $role = 1;
else
    $role = $_SESSION['role'];

$query = "update user set  name= {$sq}{$full_name}{$sq}, phone= {$sq}{$mobile}{$sq}, email = {$sq}{$email}{$sq}, gender = {$gender} , birthdate= {$sq}{$birthday}{$sq}, address= {$sq}{$address}{$sq}, role= {$role} where id= {$_SESSION['user_id']}";

if (mysqli_connect_errno()) {
    $_SESSION['error_msg'] = $lang['sql_problem'];
    $_SESSION['msg_type'] = -1;
    mysqli_close($link);
    redirect('profile', $path);
    exit;
}

if (mysqli_query($link, $query) === TRUE) {
    mysqli_close($link);
    if ($role == 1)
        redirect('logout');
    else
        redirect('profile', $path);
    exit;
} else {

    $_SESSION['error_msg'] = $lang['general_error'];
    $_SESSION['msg_type'] = -1;
    mysqli_close($link);
    redirect('home', $path);
    exit();
}


?>
