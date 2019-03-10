<?php
include "../include/config.php";
if ($_POST) {
    $cat_id = $_POST['cat_id'];
    $sub_id = $_POST['sub_id'];
    $sort = $_POST['sort'];
    $sub_query = '';
    if ($cat_id != -1 && $sub_id == -1) {
        $sub_query = " s.category_id= {$cat_id} and ";
    } else if ($cat_id != -1 && $sub_id != -1) {
        $sub_query = " s.category_id= {$cat_id} and p.subcategory_id= {$sub_id} and ";
    }

    if ($sort == 1) {
        $sort = 'desc';
    } else
        $sort = 'asc';

    $sr_min = $_POST['sr_min'];
    $sr_min=str_replace(",","",$sr_min);
    $sr_max = $_POST['sr_max'];
    $sr_max=str_replace(",","",$sr_max);

    $link = connectDb_mysqli();
    mysqli_set_charset($link, "utf8");

    $sq = "'";
    $path = '../';
    if ($_SESSION['role'] == 3)
        $query = "select p.id, p.name, p.price, p.price_vip, p.description_ar, p.description_en, p.pic, p.subcategory_id, p.quantity, p.date, p.status, s.name_ar as sub_name_ar, s.name_en as sub_name_en, s.status as sub_status, s.category_id, c.name_ar as cat_name_ar, c.name_en as cat_name_en, c.status as cat_status from product p inner join subcategory s on p.subcategory_id=s.id inner join category c on s.category_id = c.id where {$sub_query} p.price_vip BETWEEN {$sr_min} AND  {$sr_max} and s.status=1 and c.status=1  order by date {$sort}";

    else
        $query = "select p.id, p.name, p.price, p.price_vip, p.description_ar, p.description_en, p.pic, p.subcategory_id, p.quantity, p.date, p.status, s.name_ar as sub_name_ar, s.name_en as sub_name_en, s.status as sub_status, s.category_id, c.name_ar as cat_name_ar, c.name_en as cat_name_en, c.status as cat_status from product p inner join subcategory s on p.subcategory_id=s.id inner join category c on s.category_id = c.id where {$sub_query} p.price BETWEEN {$sr_min} AND  {$sr_max} and s.status=1 and c.status=1  order by date {$sort}";

    if (mysqli_connect_errno()) {
        $_SESSION['error_msg'] = $lang['sql_problem'];
        $_SESSION['msg_type'] = -1;
    }
    if ($result = mysqli_query($link, $query)) {

        $response = array();
        while ($row = mysqli_fetch_assoc($result)) {

            $arr = array(
                'id' => $row['id'],
                'name' => $row['name'],
                'price' => $row['price'],
                'price_vip' => $row['price_vip'],
                'pic' => $row['pic'],
                'description_ar' => $row['description_ar'],
                'description_en' => $row['description_en'],
                'sub_id' => $row['subcategory_id'],
                'sub_name_ar' => $row['sub_name_ar'],
                'sub_name_en' => $row['sub_name_en'],
                'sub_status' => $row['sub_status'],
                'cat_id' => $row['category_id'],
                'cat_name_ar' => $row['cat_name_ar'],
                'cat_name_en' => $row['cat_name_en'],
                'cat_status' => $row['cat_status'],
                'quantity' => $row['quantity'],
                'date' => $row['date'],
                'status' => $row['status'],
            );

            array_push($response, $arr);

        }
        mysqli_close($link);
        echo json_encode($response);

    } else {
        $_SESSION['error_msg'] = $lang['general_error'];
        $_SESSION['msg_type'] = -1;
        redirect('home', $path);
        mysqli_close($link);
        exit();
    }
//
//

//
//
//
//
//
////    $_SESSION['error_msg'] = $lang['Can_nor_edit'];
////    echo '<script language="javascript">';
////    echo 'alert("'.$_SESSION['error_msg'].'")';
////    echo '</script>';
////    $_SESSION['error_msg']='';
////    mysqli_close($link);
////    exit();
//
//
///* free result set */
////    mysqli_free_result($result);
//
//
//
//
//var_dump($_SESSION);
//

}


?>