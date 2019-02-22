<?php
//
//if (isset($_POST['action']) && $_POST['action'] == 'add') {
//
//
//    $order_id = $_SESSION['order_id'];
//    $user_id = $_SESSION['user_id'];
//    if (isset($_POST['product_id']) && isset($order_id) && isset($user_id)) {
//
//        $link = mysqli_connect("localhost", "root", "", "itsource");
//        $sq = "'";
//        $path = '../';
//        $product_id = make_safe($_POST['product_id']);
//
//        $query = "select o.status from itsource.order o where o.id = {$order_id} ";
//        $date = date('Y-m-d', time());
//        $query1 = "insert into itsource.order (user_id, status, date) VALUES ({$user_id},1,{$sq}{$date}{$sq})";
////    $query2 = "insert into cart c (product_id) VALUES ($product_id) where c.order_id={$order_id}";
//
//        if ($result = mysqli_query($link, $query)) {
//
//            while ($row = mysqli_fetch_assoc($result)) {
//
//                if ($row['status'] == 3 || $row['status'] == 4) {
//                    if (mysqli_query($link, $query1) === TRUE) {
//                        $last_id = mysqli_insert_id($link);
//                        $_SESSION['order_id'] = $last_id;
//                        mysqli_close($link);
//                        redirect($_SERVER['HTTP_REFERER']);
//                        exit;
//                    } else if ($row['status'] == 2) {
//                        $_SESSION['error_msg'] = $lang['general_error'];
//                        mysqli_close($link);
//                        redirect($_SERVER['HTTP_REFERER']);
//                        exit();
//                    } else {
//
//                    }
//
//                }
//            }
//
//
//        } else {
//            $_SESSION['error_msg'] = $lang['general_error'];
//            mysqli_close($link);
//            redirect('home', $path);
//            exit();
//        }
//
//        if (mysqli_query($link, $query) === TRUE) {
//
////                    $last_id = mysqli_insert_id($link);
//            mysqli_close($link);
//            redirect($_SERVER['HTTP_REFERER']);
//            exit;
//        }
//
//
//    }
//
//
//} else if (isset($_POST['action']) && $_POST['action'] == 'edit') {
//
//} else if (isset($_POST['action']) && $_POST['action'] == 'delete') {
//
//} else {
//
//    $_SESSION['error_msg'] = $lang['general_error'];
//    mysqli_close($link);
//    redirect('home', $path);
//    exit();
//}
//
//
////
////$query2 = "select o.id from itsource.order o inner join user u on o.user_id = u.id where u.id= {$_SESSION['user_id']} and o.status=1 or o.status=2";
////$date = date('Y-m-d', time());
//
