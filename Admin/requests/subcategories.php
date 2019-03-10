<?php
include "../include/config.php";
require('../include/hundle-ajax.php');

if (isset($_POST['cat_id'])) {
$cat_id=make_safe($_POST['cat_id']);
    $link = connectDb_mysqli();
    mysqli_set_charset($link, "utf8");
    $sq = "'";
    $path = '../';
    $query = "select * from subcategory where category_id = {$cat_id}";

    if (mysqli_connect_errno()) {
        $_SESSION['error_msg'] = mysqli_connect_error();

    }

    if ($result = mysqli_query($link, $query)) {
        $res = array();
        while ($row = mysqli_fetch_assoc($result)) {


            if($_SESSION['lang']=='ar')
            {
                $arr = array(
                    'id' => $row['id'],
                    'name' => $row['name_ar'],
                    'status' => $row['status'],
                );
            }
            else
            {
                $arr = array(
                    'id' => $row['id'],
                    'name' => $row['name_en'],
                    'status' => $row['status'],
                );
            }

            array_push($res, $arr);
        }
        mysqli_close($link);
        echo json_encode($res);
//    $_SESSION['error_msg'] = $lang['Can_nor_edit'];
//    echo '<script language="javascript">';
//    echo 'alert("'.$_SESSION['error_msg'].'")';
//    echo '</script>';
//    $_SESSION['error_msg']='';
//    mysqli_close($link);
//    exit();

    }

    /* free result set */
//    mysqli_free_result($result);

    else {
        $_SESSION['error_msg'] = $lang['general_error'];
        $_SESSION['msg_type'] = -1;
        mysqli_close($link);
        redirect('orders-list');
        exit();

    }


//var_dump($_SESSION);

}


?>