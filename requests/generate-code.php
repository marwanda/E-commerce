<?php
include "../include/config.php";


$mobile = isset($_POST['mobile']) ? make_safe($_POST['mobile']) : null;

$code = generatePIN(4);
$link = mysqli_connect("localhost", "root", "", "itsource");
mysqli_set_charset($link, "utf8");

$sq = "'";
$path = '../';


$query2 = "select id from user where phone= {$sq}{$mobile}{$sq}";
if ($result = mysqli_query($link, $query2)) {
    $count = mysqli_num_rows($result);
    if ($count > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $_SESSION['user_id_verification'] = $row['id'];
            $_SESSION['phone'] = $mobile;
        }
//
//            $_SESSION['role']=1;
//            $_SESSION['phone']=$mobile;
//            echo $lang['successfully_done'];
//            exit;
    } else {
        echo -2;
        exit;
    }
} else {
    echo -1;
    exit;
}


$query = "update user set code = {$code} where id = {$_SESSION['user_id_verification']}";
if (mysqli_connect_errno()) {
    $_SESSION['error_msg'] = $lang['sql_problem'];
    $_SESSION['msg_type'] = -1;
//    redirect('verification');
    echo -1;
    exit();
}

if (mysqli_query($link, $query) === TRUE) {
    /** todo send sms **/
//    $_SESSION['msg'] = $lang['successfully_done'];
    echo 1;
    mysqli_close($link);
    exit();
}

//}
