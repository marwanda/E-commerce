<?php
include "../include/config.php";


if (isset($_POST['action']) && $_POST['action'] == 'add') {


    $user_id = $_SESSION['user_id'];
    if (isset($_POST['product_id']) && isset($_SESSION['order_id']) && isset($user_id)) {

        $link = mysqli_connect("localhost", "root", "", "itsource");
        mysqli_set_charset($link, "utf8");
        $sq = "'";
        $path = '../';
        $product_id = make_safe($_POST['product_id']);
//        if($_SESSION['role']==2)
//        $query_get_price='select';




        $query = "select o.status from itsource.order o where o.id = {$_SESSION['order_id']}";
        $date = date('Y-m-d', time());
        $query1 = "insert into itsource.order (user_id, status, date) VALUES ({$user_id},1,{$sq}{$date}{$sq})";
        $query2 = "insert into cart (product_id,order_id,quantity) VALUES ({$product_id},{$_SESSION['order_id']},1)";
        $query4 = "select * from cart where product_id = {$product_id} and order_id = {$_SESSION['order_id']}";

        if ($result = mysqli_query($link, $query)) {

            $count = mysqli_num_rows($result);
            if($count>0)
            {
                while ($row = mysqli_fetch_assoc($result)) {

                    if ($row['status'] == 3 || $row['status'] == 4) {

                        if (mysqli_query($link, $query1) === TRUE) {
                            $last_id = mysqli_insert_id($link);
                            $_SESSION['order_id'] = $last_id;
//                        $err = array('order_id' =>$last_id);
//                        echo json_encode($err);
//                        mysqli_close($link);
                            $query3 = "insert into cart (product_id,order_id,quantity) VALUES ({$product_id},{$_SESSION['order_id']},1)";
                            $query4 = "select * from cart where product_id = {$product_id} and order_id = {$_SESSION['order_id']}";

                            if ($result = mysqli_query($link, $query4)) {
                                $count = mysqli_num_rows($result);

                                if ($count > 0) {

                                    echo 2;
                                    mysqli_close($link);
                                    exit;
                                }
                                else
                                {
                                    if (mysqli_query($link, $query3) === TRUE) {

                                        echo 1;
                                        mysqli_close($link);
                                        exit;
                                    }
                                    else {

                                        mysqli_close($link);
                                        echo -1;
                                        exit();
                                    }
                                }

                            }
                            else {

                                mysqli_close($link);
                                echo -1;
                                exit();
                            }


                        } else {

                            mysqli_close($link);
                            echo -1;
                            exit();
                        }

                    } else if ($row['status'] == 2) {

                        mysqli_close($link);
                        echo 3;
                        exit();
                    } else {
                        $query4 = "select * from cart where product_id = {$product_id} and order_id = {$_SESSION['order_id']}";

                        if ($result = mysqli_query($link, $query4)) {

                            $count = mysqli_num_rows($result);
                            if ($count > 0) {

                                echo 2;
                                mysqli_close($link);
                                exit;
                            }
                            else
                            {
                                $query3 = "insert into cart (product_id,order_id,quantity) VALUES ({$product_id},{$_SESSION['order_id']},1)";
                                if (mysqli_query($link, $query3) === TRUE) {

                                    echo 1;
                                    mysqli_close($link);
                                    exit;
                                }
                                else {

                                    mysqli_close($link);
                                    echo -1;
                                    exit();
                                }
                            }

                        }
                        else {
                            mysqli_close($link);
                            echo -1;
                            exit();
                        }
                    }
                }
            }
            else {
                if (mysqli_query($link, $query1) === TRUE) {
                    $last_id = mysqli_insert_id($link);
                    $_SESSION['order_id'] = $last_id;
                    $query3 = "insert into cart (product_id,order_id,quantity) VALUES ({$product_id},{$_SESSION['order_id']},1)";
                    if (mysqli_query($link, $query3) === TRUE) {

                        echo 1;
                        mysqli_close($link);
                        exit;
                    } else {

                        mysqli_close($link);
                        echo -1;
                        exit();
                    }
                }
            }



        } else {

            mysqli_close($link);
            echo -1;
            exit();
        }

    }

} else if (isset($_POST['action']) && $_POST['action'] == 'edit') {

} else if (isset($_POST['action']) && $_POST['action'] == 'delete') {

} else {

    $err = array('error_code' => -1);
    mysqli_close($link);
    echo json_encode($err);
    exit();
}


//
//$query2 = "select o.id from itsource.order o inner join user u on o.user_id = u.id where u.id= {$_SESSION['user_id']} and o.status=1 or o.status=2";
//$date = date('Y-m-d', time());

