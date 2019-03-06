<?php

include '../include/config.php';

$name = isset($_POST['username']) ? make_safe($_POST['username']) : null;
$password = isset($_POST['password']) ? make_safe($_POST['password']) : null;

$link = mysqli_connect("localhost", "root", "", "itsource");
mysqli_set_charset($link, "utf8");

$sq = "'";
$path = '../';

$query = "select * from user where name = {$sq}{$name}{$sq} and password = {$sq}{$password}{$sq}";


if (mysqli_connect_errno()) {
    $_SESSION['error_msg'] = mysqli_connect_error();
    mysqli_close($link);
    redirect('login', $path);
    exit();
}



if ($result = mysqli_query($link, $query)) {

    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {





            if ($row['role'] == 5) {
                $_SESSION['admin_name'] = $row['name'];
                $_SESSION['admin_id'] = $row['id'];
                $_SESSION['ad_role'] = 5;
                mysqli_close($link);
                redirect('orders-list',$path);
                exit;

            } else if ($row['role'] == 6) {
                $_SESSION['admin_name'] = $row['name'];
                $_SESSION['admin_id'] = $row['id'];
                $_SESSION['ad_role'] = 6;
                mysqli_close($link);
                redirect('orders-list',$path);
                exit;

            }
            else
            {
                mysqli_close($link);
                redirect('login',$path);
            }
        }

    }
    else {
        $_SESSION['error_msg'] = $lang['wrong_login_info'];
        $_SESSION['msg_type'] = -1;

        mysqli_close($link);
        redirect('login', $path);
        exit();
    }

}


else{

    $_SESSION['error_msg'] = $lang['general_error'];
    $_SESSION['msg_type'] = -1;
    mysqli_close($link);
    redirect('login', $path);
    exit();
}


?>