<?php
include "../include/config.php";


$mobile = isset($_POST['mobile']) ? make_safe($_POST['mobile']) : null;

$code = generatePIN(4);
$link = mysqli_connect("localhost", "root", "", "itsource");
$sq = "'";
$path='../';


if(!isset($_SESSION['user_id']))
{

    $query2="select id from user where phone= {$sq}{$mobile}{$sq}";
    if ($result = mysqli_query($link, $query2)) {

        while ($row = mysqli_fetch_assoc($result)) {
            $_SESSION['user_id']=$row['id'];
            echo $lang['successfully_done'];
            exit;
        }
        echo $lang['wrong_mobile'];
        exit;
    }
    else
    {
        echo $lang['general_error'];
        exit;
    }

}


else
{

    $query = "update user set code = {$code} where id = {$_SESSION['user_id']}";
    if (mysqli_connect_errno()) {
        $_SESSION['msg'] = mysqli_connect_error();
//    redirect('verification');
        echo  mysqli_connect_error();
        exit();
    }
    if (mysqli_query($link, $query) === TRUE) {
        /** todo send sms **/
//    $_SESSION['msg'] = $lang['successfully_done'];
        echo $lang['successfully_done'];
        exit();
    }
    mysqli_close($link);
}
