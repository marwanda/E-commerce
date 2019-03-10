<?php
include '../include/config.php';

$current_password = isset($_POST['current-password']) ? make_safe($_POST['current-password']) : null;
$new_password = isset($_POST['new-password']) ? make_safe($_POST['new-password']) : null;


$link = connectDb_mysqli();
mysqli_set_charset($link, "utf8");
$sq = "'";
$path = '../';

if ($current_password != null) {

    $query = "select * from user where password={$sq}{$current_password}{$sq} and id={$_SESSION['user_id']}";
    if ($result = mysqli_query($link, $query)) {
        $count = mysqli_num_rows($result);

        if ($count > 0) {

            $query = "update user set password={$sq}{$new_password}{$sq} where id= {$_SESSION['user_id']}";

            if (mysqli_query($link, $query) === TRUE) {
                unset($_SESSION['change_password']);
                $_SESSION['error_msg']=$lang['successfully_done'];
                $_SESSION['msg_type'] = 1;
                mysqli_close($link);
                redirect('home',$path);
                exit;
            } else {
                $_SESSION['error_msg']=$lang['general_error'];
                $_SESSION['msg_type'] = -1;
                mysqli_close($link);
                redirect('profile',$path);
                exit;
            }
        } else {
            $_SESSION['error_msg']=$lang['passwords_not_matched'];
            $_SESSION['msg_type'] = -1;
            mysqli_close($link);
            redirect('profile',$path);
            exit;

        }
    }
    else {
        $_SESSION['error_msg'] = $lang['general_error'];
        $_SESSION['msg_type'] = -1;
        mysqli_close($link);
        redirect('profile',$path);
        exit;
    }
}
else
{
    $query = "update user set password={$sq}{$new_password}{$sq} where id= {$_SESSION['user_id']}";
    if (mysqli_query($link, $query) === TRUE) {
        unset($_SESSION['change_password']);
        $_SESSION['error_msg']=$lang['successfully_done'];
        $_SESSION['msg_type'] = 1;
        mysqli_close($link);
        redirect('home',$path);
        exit;
    } else {
        $_SESSION['error_msg'] = $lang['general_error'];
        $_SESSION['msg_type'] = -1;
        mysqli_close($link);
        redirect('profile',$path);
        exit;

    }
}



?>
