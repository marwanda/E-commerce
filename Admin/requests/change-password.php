<?php
include '../include/config.php';



$current_password = isset($_POST['current-password']) ? make_safe($_POST['current-password']) : null;
$new_password = isset($_POST['new-password']) ? make_safe($_POST['new-password']) : null;



$link = mysqli_connect("localhost", "root", "", "itsource");
mysqli_set_charset($link, "utf8");
$sq = "'";
$path = '../';



    $query = "select * from user where password={$sq}{$current_password}{$sq} and id={$_SESSION['admin_id']}";

    if ($result = mysqli_query($link, $query)) {
        $count = mysqli_num_rows($result);

        if ($count > 0) {

            $query = "update user set password={$sq}{$new_password}{$sq} where id= {$_SESSION['admin_id']}";

            if (mysqli_query($link, $query) === TRUE) {
                unset($_SESSION['change_password']);
                $_SESSION['error_msg']=$lang['successfully_done'];
                mysqli_close($link);
                redirect('logout.php');
                exit;
            } else {
                $_SESSION['error_msg']=$lang['general_error'];
                mysqli_close($link);
                redirect('orders-list',$path);
                exit;
            }
        } else {

            $_SESSION['error_msg']=$lang['passwords_not_matched'];
            mysqli_close($link);
            $_SESSION['change_password']=1;
            redirect('admin-profile',$path);
            exit;
        }
    }
    else {
        $_SESSION['error_msg']=$lang['general_error'];
        mysqli_close($link);
        redirect('orders-list',$path);
        exit;
    }


