<?php

include '../include/config.php';
$mobile = isset($_POST['phone']) ? make_safe($_POST['phone']) : null;
$password = isset($_POST['password']) ? make_safe($_POST['password']) : null;
$link = mysqli_connect("localhost", "root", "", "itsource");
mysqli_set_charset($link, "utf8");

$sq = "'";
$path = '../';
$query = "select * from user where phone = {$sq}{$mobile}{$sq} and password = {$sq}{$password}{$sq}";


if (mysqli_connect_errno()) {
    $_SESSION['error_msg'] = mysqli_connect_error();
    mysqli_close($link);
    redirect('home', $path);
    exit();
}


if ($result = mysqli_query($link, $query)) {

    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {
//var_dump($row);
//exit;
            $_SESSION['phone'] = $row['phone'];
            $_SESSION['user_id'] = $row['id'];

//            if(!isset($row['role']))

            if ($row['role'] == 1) {

                $_SESSION['role'] = 1;
                redirect('verification', $path);
                exit;
//            mysqli_close($link);

            } else if ($row['role'] == 2) {
                $_SESSION['role'] = 2;
//            mysqli_close($link);

            } else if ($row['role'] == 3) {
                $_SESSION['role'] = 3;
//            mysqli_close($link);

            } else if ($row['role'] == 4) {

                $_SESSION['error_msg'] = $lang['blocked-user'];
                unset($_SESSION['phone']);
                unset($_SESSION['user_id']);
                mysqli_close($link);
                redirect('home', $path);
                exit;

            }
        }
        //find or create order
        if ($_SESSION['role'] == 2 || $_SESSION['role'] == 3) {
            $query2 = "select o.id from itsource.order o inner join user u on o.user_id = u.id where u.id= {$_SESSION['user_id']} and (o.status=1 or o.status=2)";
//           var_dump($query2);exit;
            $date = date('Y-m-d', time());
            $query3 = "insert into itsource.order (user_id, status, date) VALUES ({$_SESSION['user_id']},1,{$sq}{$date}{$sq})";

            if ($result2 = mysqli_query($link, $query2)) {

                $count = mysqli_num_rows($result2);
                if ($count > 0) {

                    while ($row1 = mysqli_fetch_assoc($result2)) {


                        $_SESSION['order_id'] = $row1['id'];
                        mysqli_close($link);
                        redirect($_SERVER['HTTP_REFERER']);
                        exit();


                    }

                } else {
                    if (mysqli_query($link, $query3) === TRUE) {
                        $last_id = mysqli_insert_id($link);
                        $_SESSION['order_id'] = $last_id;
                        mysqli_close($link);
                        redirect($_SERVER['HTTP_REFERER']);
                        exit;
                    }


                }


            } else {

                $_SESSION['error_msg'] = $lang['general_error'];
                mysqli_close($link);
                redirect('home', $path);
                exit();
            }
        }


    } else {
        $_SESSION['error_msg'] = $lang['wrong_login_info'];
        mysqli_close($link);
        redirect('home', $path);
        exit();
    }

} else {

    $_SESSION['error_msg'] = $lang['general_error'];
    mysqli_close($link);
    redirect('home', $path);
    exit();
}


?>