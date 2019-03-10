<?php
include "../include/config.php";
include "../include/hundle-ajax.php";

if (isset($_POST)) {

    $link = connectDb_mysqli();
    mysqli_set_charset($link, "utf8");
    $sq = "'";
    $path = '../';
    $query = "select * from category";

    if (mysqli_connect_errno()) {
        $_SESSION['error_msg'] = $lang['sql_problem'];
        $_SESSION['msg_type'] = -1;

    }

    if ($result = mysqli_query($link, $query)) {
        $response = array();
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


            array_push($response, $arr);
        }
        mysqli_close($link);
        echo json_encode($response) ;


    }

    /* free result set */
//    mysqli_free_result($result);

    else {

        $_SESSION['error_msg'] = $lang['general_error'];
        $_SESSION['msg_type'] = -1;
        redirect('home');
        mysqli_close($link);
        exit();

    }


//var_dump($_SESSION);

}


?>