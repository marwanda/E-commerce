<?php
require('../include/config.php');
$link = mysqli_connect("localhost", "root", "", "itsource");
mysqli_set_charset($link, "utf8");
$sq = "'";
$path = '../';
//var_dump($_POST);
//exit;
if (isset($_POST['action']) && $_POST['action'] == 'change-status' && isset($_POST['order_id']) && isset($_POST['status'])) {

    $order_id = make_safe($_POST['order_id']);
    $status = make_safe($_POST['status']);

    if (isset($_POST['note']) && !empty($_POST['note'])) {
        $note = make_safe($_POST['note']);
        $query = "update itsource.order set status={$status},msg={$note} where id={$order_id}";
    } else {

        $query = "update itsource.order set status={$status} where id={$order_id}";

    }

    if (mysqli_query($link, $query) === TRUE) {
        echo 1;
    } else {
        echo -1;
        exit;

    }

//    $query="update user set faild_orders=faild_orders+1";


} else if (isset($_POST['action']) && $_POST['action'] == 'get-cart' && isset($_POST['order_id'])) {


    $order_id = make_safe($_POST['order_id']);

    $query = "select c.product_id, c.sub_total, c.quantity, p.name from cart c inner join product p on c.product_id=p.id where c.order_id = {$order_id}";

    if ($result = mysqli_query($link, $query)) {
        $response = array();
        while ($row = mysqli_fetch_assoc($result)) {

            $arr = array(
                'product_id' => $row['product_id'],
                'sub_total' => $row['sub_total'],
                'quantity' => $row['quantity'],
                'name' => $row['name'],
            );

            array_push($response, $arr);

        }
        mysqli_close($link);
        echo json_encode($response);
        exit;

    } else {

        echo -1;
        exit;
    }

}


?>