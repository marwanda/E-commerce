<?php

if (isset($_SESSION['error_msg']) && !empty($_SESSION['error_msg']) && isset($_SESSION['msg_type'])) {
    if ($_SESSION['msg_type'] == 1)
        echo '<input id="error-msg" data-type="success"  type="hidden" value="' . $_SESSION['error_msg'] . '">';
    else if ($_SESSION['msg_type'] == -1)
        echo '<input id="error-msg" data-type="error"  type="hidden" value="' . $_SESSION['error_msg'] . '">';
    else
        echo '<input id="error-msg" data-type="warn"  type="hidden" value="' . $_SESSION['error_msg'] . '">';
    $_SESSION['error_msg'] = '';
    $_SESSION['msg_type'] = '';

}

$sq = "'";
$path = '../';
$id = isset($_GET['id']) ? make_safe($_GET['id']) : null;
$link = connectDb_mysqli();
mysqli_set_charset($link, "utf8");





$query = "select * from gallary_home";
if ($result = mysqli_query($link, $query)) {
    while ($row = mysqli_fetch_assoc($result)) {

        if ($row['type'] == 1 && $row['number'] == 1) {
            $home = $row['text'];

        } else if ($row['type'] == 1 && $row['number'] == 2) {
            $home2 = $row['text'];
        } else if ($row['type'] == 1 && $row['number'] == 3) {
            $home3 = $row['text'];
        } else if ($row['type'] == 2) {
            $product_list = $row['text'];
        } else if ($row['type'] == 3) {
            $product_details = $row['text'];
        } else if ($row['type'] == 4) {
            $cart = $row['text'];
        } else if ($row['type'] == 5) {
            $projects = $row['text'];
        } else if ($row['type'] == 6) {
            $offers = $row['text'];
        } else if ($row['type'] == 7) {
            $about = $row['text'];
        } else if ($row['type'] == 8) {
            $companies = $row['text'];
        } else if ($row['type'] == 9) {
            $profile = $row['text'];
        }
        else if ($row['type'] == 10) {
            $news = $row['text'];
        }


    }


}


if (mysqli_connect_errno()) {
    $_SESSION['error_msg'] = $lang['sql_problem'];
    echo '<input id="error-msg" data-type="error"  type="hidden" value="' . $_SESSION['error_msg'] . '">';
    $_SESSION['error_msg'] = '';
}

if (isset($_POST['edit-gallary'])) {


    $home_text = isset($_POST['home_text']) ? make_safe($_POST['home_text']) : null;
    $home_text2 = isset($_POST['home_text2']) ? make_safe($_POST['home_text2']) : null;
    $home_text3 = isset($_POST['home_text3']) ? make_safe($_POST['home_text3']) : null;
    $product_list_text = isset($_POST['product_list_text']) ? make_safe($_POST['product_list_text']) : null;
    $product_details_text = isset($_POST['product_details_text']) ? make_safe($_POST['product_details_text']) : null;
    $cart_text = isset($_POST['cart_text']) ? make_safe($_POST['cart_text']) : null;
    $projects_text = isset($_POST['projects_text']) ? make_safe($_POST['projects_text']) : null;
    $offers_text = isset($_POST['offers_text']) ? make_safe($_POST['offers_text']) : null;
    $about_text = isset($_POST['about_text']) ? make_safe($_POST['about_text']) : null;
    $companies_text = isset($_POST['companies_text']) ? make_safe($_POST['companies_text']) : null;
    $profile_text = isset($_POST['profile_text']) ? make_safe($_POST['profile_text']) : null;
    $news_text = isset($_POST['news_text']) ? make_safe($_POST['news_text']) : null;


    $home = isset($_FILES['home']) ? make_safe($_FILES['home']) : null;
    $home2 = isset($_FILES['home2']) ? make_safe($_FILES['home2']) : null;
    $home3 = isset($_FILES['home3']) ? make_safe($_FILES['home3']) : null;
    $product_list = isset($_FILES['product_list']) ? make_safe($_FILES['product_list']) : null;
    $product_details = isset($_FILES['product_details']) ? make_safe($_FILES['product_details']) : null;
    $cart = isset($_FILES['cart']) ? make_safe($_FILES['cart']) : null;
    $projects = isset($_FILES['projects']) ? make_safe($_FILES['projects']) : null;
    $offers = isset($_FILES['offers']) ? make_safe($_FILES['offers']) : null;
    $about = isset($_FILES['about']) ? make_safe($_FILES['about']) : null;
    $companies = isset($_FILES['companies']) ? make_safe($_FILES['companies']) : null;
    $profile = isset($_FILES['profile']) ? make_safe($_FILES['profile']) : null;
    $news = isset($_FILES['news']) ? make_safe($_FILES['news']) : null;

    $pics = array();
    $allowed_files = array(
        "image/png",
        "image/jpeg",
    );


    if ($home['error'] != 4 && in_array($home['type'], $allowed_files) == false) {

        $_SESSION['error_msg'] = $lang['only_image'];
        $_SESSION['msg_type'] = -1;
        redirect('gallary-form');
        exit;
    }
    if ($home2['error'] != 4 && in_array($home2['type'], $allowed_files) == false) {

        $_SESSION['error_msg'] = $lang['only_image'];
        $_SESSION['msg_type'] = -1;
        redirect('gallary-form');
        exit;
    }
    if ($home3['error'] != 4 && in_array($home3['type'], $allowed_files) == false) {

        $_SESSION['error_msg'] = $lang['only_image'];
        $_SESSION['msg_type'] = -1;
        redirect('gallary-form');
        exit;
    }
    if ($product_list['error'] != 4 && in_array($product_list['type'], $allowed_files) == false) {

        $_SESSION['error_msg'] = $lang['only_image'];
        $_SESSION['msg_type'] = -1;
        redirect('gallary-form');
        exit;
    }
    if ($product_details['error'] != 4 && in_array($product_details['type'], $allowed_files) == false) {

        $_SESSION['error_msg'] = $lang['only_image'];
        $_SESSION['msg_type'] = -1;
        redirect('gallary-form');
        exit;
    }
    if ($cart['error'] != 4 && in_array($cart['type'], $allowed_files) == false) {

        $_SESSION['error_msg'] = $lang['only_image'];
        $_SESSION['msg_type'] = -1;
        redirect('gallary-form');
        exit;
    }
    if ($projects['error'] != 4 && in_array($projects['type'], $allowed_files) == false) {
        $_SESSION['error_msg'] = $lang['only_image'];
        $_SESSION['msg_type'] = -1;
        redirect('gallary-form');
        exit;
    }
    if ($offers['error'] != 4 && in_array($offers['type'], $allowed_files) == false) {

        $_SESSION['error_msg'] = $lang['only_image'];
        $_SESSION['msg_type'] = -1;
        redirect('gallary-form');
        exit;
    }
    if ($about['error'] != 4 && in_array($about['type'], $allowed_files) == false) {

        $_SESSION['error_msg'] = $lang['only_image'];
        $_SESSION['msg_type'] = -1;
        redirect('gallary-form');
        exit;
    }
    if ($companies['error'] != 4 && in_array($companies['type'], $allowed_files) == false) {

        $_SESSION['error_msg'] = $lang['only_image'];
        $_SESSION['msg_type'] = -1;
        redirect('gallary-form');
        exit;
    }
    if ($profile['error'] != 4 && in_array($profile['type'], $allowed_files) == false) {

        $_SESSION['error_msg'] = $lang['only_image'];
        $_SESSION['msg_type'] = -1;
        redirect('gallary-form');
        exit;
    }
    if ($news['error'] != 4 && in_array($news['type'], $allowed_files) == false) {

        $_SESSION['error_msg'] = $lang['only_image'];
        $_SESSION['msg_type'] = -1;
        redirect('gallary-form');
        exit;
    }


//    $date = date('Y-m-d', time());


    if ($home['error'] != 4) {
        $uploadPath = 'gallary';
        $upload_result = @upload_image($home, $uploadPath, $image_sizes['services'], '../');
        $uploaded_file_name = $upload_result['data']['file_name'];
        $query = "update gallary_home set name={$sq}{$uploaded_file_name}{$sq},text={$sq}{$home_text}{$sq} where type = 1 and number=1";

        $query1 = "select name from gallary_home where type = 1 and number= 1";
        if ($result = mysqli_query($link, $query1)) {
            while ($row = mysqli_fetch_assoc($result)) {

                unlink('../files/images/gallary/large/' . $row['name']);
            }

        } else {

            echo -1;
            exit;

        }

        if (mysqli_query($link, $query) === TRUE) {
            $affected_rows = mysqli_affected_rows($link);
            if ($affected_rows > 0) {
                if (!isset($_SESSION['error_msg']) || $_SESSION['error_msg'] == '') {
                    $_SESSION['error_msg'] = $lang['successfully_done'];
                    $_SESSION['msg_type'] = 1;
                }
            } else {
                $query = "insert into gallary_home  (name, number,type,text) values ({$sq}{$uploaded_file_name}{$sq},1,1,{$sq}{$home_text}{$sq})";

                if (mysqli_query($link, $query) === TRUE) {
                    $_SESSION['error_msg'] = $lang['successfully_done'];
                    $_SESSION['msg_type'] = 1;
                }

            }


        } else {

            $_SESSION['error_msg'] = $lang['pics_did_not_upload'];
            $_SESSION['msg_type'] = -1;
        }
    }
//    else{
//        $query = "update gallary_home set text={$sq}{$home_text}{$sq} where type = 1 and number=1";
//        if (mysqli_query($link, $query) === TRUE) {
//            $affected_rows = mysqli_affected_rows($link);
//            if ($affected_rows > 0) {
//                if (!isset($_SESSION['error_msg']) || $_SESSION['error_msg'] == '') {
//                    $_SESSION['error_msg'] = $lang['successfully_done'];
//                    $_SESSION['msg_type'] = 1;
//                }
//            } else {
//                $query = "insert into gallary_home  (number,type,text) values (1,1,{$sq}{$home_text}{$sq})";
//
//                if (mysqli_query($link, $query) === TRUE) {
//                    $_SESSION['error_msg'] = $lang['successfully_done'];
//                    $_SESSION['msg_type'] = 1;
//                }
//
//            }
//
//
//        } else {
//
//            $_SESSION['error_msg'] = "text did not upload";
//            $_SESSION['msg_type'] = -1;
//        }
//    }
    if ($home2['error'] != 4) {
        $uploadPath = 'gallary';
        $upload_result = @upload_image($home2, $uploadPath, $image_sizes['services'], '../');
        $uploaded_file_name = $upload_result['data']['file_name'];
        $query = "update gallary_home set name={$sq}{$uploaded_file_name}{$sq},text={$sq}{$home_text2}{$sq} where type = 1 and number=2";

        $query1 = "select name from gallary_home where type = 1 and number= 2";
        if ($result = mysqli_query($link, $query1)) {
            while ($row = mysqli_fetch_assoc($result)) {

                unlink('../files/images/gallary/large/' . $row['name']);
            }

        } else {

            echo -1;
            exit;

        }

        if (mysqli_query($link, $query) === TRUE) {
            $affected_rows = mysqli_affected_rows($link);
            if ($affected_rows > 0) {
                if (!isset($_SESSION['error_msg']) || $_SESSION['error_msg'] == '') {
                    $_SESSION['error_msg'] = $lang['successfully_done'];
                    $_SESSION['msg_type'] = 1;
                }
            } else {
                $query = "insert into gallary_home  (name, number,type,text) values ({$sq}{$uploaded_file_name}{$sq},2,1,{$sq}{$home_text2}{$sq})";

                if (mysqli_query($link, $query) === TRUE) {
                    $_SESSION['error_msg'] = $lang['successfully_done'];
                    $_SESSION['msg_type'] = 1;
                }

            }


        } else {

            $_SESSION['error_msg'] = $lang['pics_did_not_upload'];
            $_SESSION['msg_type'] = -1;
        }
    }
//    else{
//        if (mysqli_query($link, $query) === TRUE) {
//            $affected_rows = mysqli_affected_rows($link);
//            if ($affected_rows > 0) {
//                if (!isset($_SESSION['error_msg']) || $_SESSION['error_msg'] == '') {
//                    $_SESSION['error_msg'] = $lang['successfully_done'];
//                    $_SESSION['msg_type'] = 1;
//                }
//            } else {
//                $query = "insert into gallary_home  ( number,type,text) values (2,1,{$sq}{$home_text2}{$sq})";
//
//                if (mysqli_query($link, $query) === TRUE) {
//                    $_SESSION['error_msg'] = $lang['successfully_done'];
//                    $_SESSION['msg_type'] = 1;
//                }
//
//            }
//
//
//        } else {
//
//            $_SESSION['error_msg'] = $lang['pics_did_not_upload'];
//            $_SESSION['msg_type'] = -1;
//        }
//    }
    if ($home3['error'] != 4) {
        $uploadPath = 'gallary';
        $upload_result = @upload_image($home3, $uploadPath, $image_sizes['services'], '../');
        $uploaded_file_name = $upload_result['data']['file_name'];
        $query = "update gallary_home set name={$sq}{$uploaded_file_name}{$sq},text={$sq}{$home_text3}{$sq} where type = 1 and number=3";

        $query1 = "select name from gallary_home where type = 1 and number= 3";
        if ($result = mysqli_query($link, $query1)) {
            while ($row = mysqli_fetch_assoc($result)) {

                unlink('../files/images/gallary/large/' . $row['name']);
            }

        } else {

            echo -1;
            exit;

        }

        if (mysqli_query($link, $query) === TRUE) {
            $affected_rows = mysqli_affected_rows($link);
            if ($affected_rows > 0) {
                if (!isset($_SESSION['error_msg']) || $_SESSION['error_msg'] == '') {
                    $_SESSION['error_msg'] = $lang['successfully_done'];
                    $_SESSION['msg_type'] = 1;
                }
            } else {
                $query = "insert into gallary_home  (name, number,type,text) values ({$sq}{$uploaded_file_name}{$sq},3,1,{$sq}{$home_text3}{$sq})";

                if (mysqli_query($link, $query) === TRUE) {
                    $_SESSION['error_msg'] = $lang['successfully_done'];
                    $_SESSION['msg_type'] = 1;
                }

            }


        } else {

            $_SESSION['error_msg'] = $lang['pics_did_not_upload'];
            $_SESSION['msg_type'] = -1;
        }
    }
//    else{
//        if (mysqli_query($link, $query) === TRUE) {
//            $affected_rows = mysqli_affected_rows($link);
//            if ($affected_rows > 0) {
//                if (!isset($_SESSION['error_msg']) || $_SESSION['error_msg'] == '') {
//                    $_SESSION['error_msg'] = $lang['successfully_done'];
//                    $_SESSION['msg_type'] = 1;
//                }
//            } else {
//                $query = "insert into gallary_home ( number,type,text) values (3,1,{$sq}{$home_text3}{$sq})";
//
//                if (mysqli_query($link, $query) === TRUE) {
//                    $_SESSION['error_msg'] = $lang['successfully_done'];
//                    $_SESSION['msg_type'] = 1;
//                }
//
//            }
//
//
//        } else {
//
//            $_SESSION['error_msg'] = $lang['pics_did_not_upload'];
//            $_SESSION['msg_type'] = -1;
//        }
//    }
    if ($product_list['error'] != 4) {
        $uploadPath = 'gallary';
        $upload_result = @upload_image($product_list, $uploadPath, $image_sizes['services'], '../');
        $uploaded_file_name = $upload_result['data']['file_name'];
        $query = "update gallary_home set name={$sq}{$uploaded_file_name}{$sq},text={$sq}{$product_list_text}{$sq} where type = 2 ";

        $query1 = "select name from gallary_home where type = 2";
        if ($result = mysqli_query($link, $query1)) {
            while ($row = mysqli_fetch_assoc($result)) {

                unlink('../files/images/gallary/large/' . $row['name']);
            }

        } else {

            echo -1;
            exit;

        }

        if (mysqli_query($link, $query) === TRUE) {
            $affected_rows = mysqli_affected_rows($link);
            if ($affected_rows > 0) {
                if (!isset($_SESSION['error_msg']) || $_SESSION['error_msg'] == '') {
                    $_SESSION['error_msg'] = $lang['successfully_done'];
                    $_SESSION['msg_type'] = 1;
                }
            } else {
                $query = "insert into gallary_home  (name,type,text) values ({$sq}{$uploaded_file_name}{$sq},2,{$sq}{$product_list_text}{$sq})";

                if (mysqli_query($link, $query) === TRUE) {
                    $_SESSION['error_msg'] = $lang['successfully_done'];
                    $_SESSION['msg_type'] = 1;
                }

            }


        } else {

            $_SESSION['error_msg'] = $lang['pics_did_not_upload'];
            $_SESSION['msg_type'] = -1;
        }
    }
//    else{
//        if (mysqli_query($link, $query) === TRUE) {
//            $affected_rows = mysqli_affected_rows($link);
//            if ($affected_rows > 0) {
//                if (!isset($_SESSION['error_msg']) || $_SESSION['error_msg'] == '') {
//                    $_SESSION['error_msg'] = $lang['successfully_done'];
//                    $_SESSION['msg_type'] = 1;
//                }
//            } else {
//                $query = "insert into gallary_home  (type,text) values (2,{$sq}{$product_list_text}{$sq})";
//
//                if (mysqli_query($link, $query) === TRUE) {
//                    $_SESSION['error_msg'] = $lang['successfully_done'];
//                    $_SESSION['msg_type'] = 1;
//                }
//
//            }
//
//
//        } else {
//
//            $_SESSION['error_msg'] = $lang['pics_did_not_upload'];
//            $_SESSION['msg_type'] = -1;
//        }
//    }
    if ($product_details['error'] != 4) {
        $uploadPath = 'gallary';
        $upload_result = @upload_image($product_details, $uploadPath, $image_sizes['services'], '../');
        $uploaded_file_name = $upload_result['data']['file_name'];
        $query = "update gallary_home set name={$sq}{$uploaded_file_name}{$sq},text={$sq}{$product_details_text}{$sq} where type = 3";

        $query1 = "select name from gallary_home where type = 3";
        if ($result = mysqli_query($link, $query1)) {
            while ($row = mysqli_fetch_assoc($result)) {

                unlink('../files/images/gallary/large/' . $row['name']);
            }

        } else {

            echo -1;
            exit;

        }

        if (mysqli_query($link, $query) === TRUE) {
            $affected_rows = mysqli_affected_rows($link);
            if ($affected_rows > 0) {
                if (!isset($_SESSION['error_msg']) || $_SESSION['error_msg'] == '') {
                    $_SESSION['error_msg'] = $lang['successfully_done'];
                    $_SESSION['msg_type'] = 1;
                }
            } else {
                $query = "insert into gallary_home  (name,type,text) values ({$sq}{$uploaded_file_name}{$sq},3,{$sq}{$product_details_text}{$sq})";

                if (mysqli_query($link, $query) === TRUE) {
                    $_SESSION['error_msg'] = $lang['successfully_done'];
                    $_SESSION['msg_type'] = 1;
                }

            }


        } else {

            $_SESSION['error_msg'] = $lang['pics_did_not_upload'];
            $_SESSION['msg_type'] = -1;
        }
    }
//    else{
//        if (mysqli_query($link, $query) === TRUE) {
//            $affected_rows = mysqli_affected_rows($link);
//            if ($affected_rows > 0) {
//                if (!isset($_SESSION['error_msg']) || $_SESSION['error_msg'] == '') {
//                    $_SESSION['error_msg'] = $lang['successfully_done'];
//                    $_SESSION['msg_type'] = 1;
//                }
//            } else {
//                $query = "insert into gallary_home  (type,text) values (3,{$sq}{$product_details_text}{$sq})";
//
//                if (mysqli_query($link, $query) === TRUE) {
//                    $_SESSION['error_msg'] = $lang['successfully_done'];
//                    $_SESSION['msg_type'] = 1;
//                }
//
//            }
//
//
//        } else {
//
//            $_SESSION['error_msg'] = $lang['pics_did_not_upload'];
//            $_SESSION['msg_type'] = -1;
//        }
//    }
    if ($cart['error'] != 4) {
        $uploadPath = 'gallary';
        $upload_result = @upload_image($cart, $uploadPath, $image_sizes['services'], '../');
        $uploaded_file_name = $upload_result['data']['file_name'];
        $query = "update gallary_home set name={$sq}{$uploaded_file_name}{$sq},text={$sq}{$cart_text}{$sq} where type =4";

        $query1 = "select name from gallary_home where type = 4";
        if ($result = mysqli_query($link, $query1)) {
            while ($row = mysqli_fetch_assoc($result)) {

                unlink('../files/images/gallary/large/' . $row['name']);
            }

        } else {

            echo -1;
            exit;

        }

        if (mysqli_query($link, $query) === TRUE) {
            $affected_rows = mysqli_affected_rows($link);
            if ($affected_rows > 0) {
                if (!isset($_SESSION['error_msg']) || $_SESSION['error_msg'] == '') {
                    $_SESSION['error_msg'] = $lang['successfully_done'];
                    $_SESSION['msg_type'] = 1;
                }
            } else {
                $query = "insert into gallary_home  (name,type,text) values ({$sq}{$uploaded_file_name}{$sq},4,{$sq}{$cart_text}{$sq})";

                if (mysqli_query($link, $query) === TRUE) {
                    $_SESSION['error_msg'] = $lang['successfully_done'];
                    $_SESSION['msg_type'] = 1;
                }

            }


        } else {

            $_SESSION['error_msg'] = $lang['pics_did_not_upload'];
            $_SESSION['msg_type'] = -1;
        }
    }
//    else{
//        if (mysqli_query($link, $query) === TRUE) {
//            $affected_rows = mysqli_affected_rows($link);
//            if ($affected_rows > 0) {
//                if (!isset($_SESSION['error_msg']) || $_SESSION['error_msg'] == '') {
//                    $_SESSION['error_msg'] = $lang['successfully_done'];
//                    $_SESSION['msg_type'] = 1;
//                }
//            } else {
//                $query = "insert into gallary_home  (type,text) values (4,{$sq}{$cart_text}{$sq})";
//
//                if (mysqli_query($link, $query) === TRUE) {
//                    $_SESSION['error_msg'] = $lang['successfully_done'];
//                    $_SESSION['msg_type'] = 1;
//                }
//
//            }
//
//
//        } else {
//
//            $_SESSION['error_msg'] = $lang['pics_did_not_upload'];
//            $_SESSION['msg_type'] = -1;
//        }
//    }
    if ($projects['error'] != 4) {
        $uploadPath = 'gallary';
        $upload_result = @upload_image($projects, $uploadPath, $image_sizes['services'], '../');
        $uploaded_file_name = $upload_result['data']['file_name'];
        $query = "update gallary_home set name={$sq}{$uploaded_file_name}{$sq},text={$sq}{$projects_text}{$sq} where type = 5";

        $query1 = "select name from gallary_home where type = 5";
        if ($result = mysqli_query($link, $query1)) {
            while ($row = mysqli_fetch_assoc($result)) {

                unlink('../files/images/gallary/large/' . $row['name']);
            }

        } else {

            echo -1;
            exit;

        }

        if (mysqli_query($link, $query) === TRUE) {
            $affected_rows = mysqli_affected_rows($link);
            if ($affected_rows > 0) {
                if (!isset($_SESSION['error_msg']) || $_SESSION['error_msg'] == '') {
                    $_SESSION['error_msg'] = $lang['successfully_done'];
                    $_SESSION['msg_type'] = 1;
                }
            } else {
                $query = "insert into gallary_home  (name,type,text) values ({$sq}{$uploaded_file_name}{$sq},5,{$sq}{$projects_text}{$sq})";

                if (mysqli_query($link, $query) === TRUE) {
                    $_SESSION['error_msg'] = $lang['successfully_done'];
                    $_SESSION['msg_type'] = 1;
                }

            }


        } else {

            $_SESSION['error_msg'] = $lang['pics_did_not_upload'];
            $_SESSION['msg_type'] = -1;
        }
    }
//    else{
//        if (mysqli_query($link, $query) === TRUE) {
//            $affected_rows = mysqli_affected_rows($link);
//            if ($affected_rows > 0) {
//                if (!isset($_SESSION['error_msg']) || $_SESSION['error_msg'] == '') {
//                    $_SESSION['error_msg'] = $lang['successfully_done'];
//                    $_SESSION['msg_type'] = 1;
//                }
//            } else {
//                $query = "insert into gallary_home  (type,text) values (5,{$sq}{$projects_text}{$sq})";
//
//                if (mysqli_query($link, $query) === TRUE) {
//                    $_SESSION['error_msg'] = $lang['successfully_done'];
//                    $_SESSION['msg_type'] = 1;
//                }
//
//            }
//
//
//        } else {
//
//            $_SESSION['error_msg'] = $lang['pics_did_not_upload'];
//            $_SESSION['msg_type'] = -1;
//        }
//    }
    if ($offers['error'] != 4) {
        $uploadPath = 'gallary';
        $upload_result = @upload_image($offers, $uploadPath, $image_sizes['services'], '../');
        $uploaded_file_name = $upload_result['data']['file_name'];
        $query = "update gallary_home set name={$sq}{$uploaded_file_name}{$sq},text={$sq}{$offers_text}{$sq} where type = 6";

        $query1 = "select name from gallary_home where type = 6";
        if ($result = mysqli_query($link, $query1)) {
            while ($row = mysqli_fetch_assoc($result)) {

                unlink('../files/images/gallary/large/' . $row['name']);
            }

        } else {

            echo -1;
            exit;

        }

        if (mysqli_query($link, $query) === TRUE) {
            $affected_rows = mysqli_affected_rows($link);
            if ($affected_rows > 0) {
                if (!isset($_SESSION['error_msg']) || $_SESSION['error_msg'] == '') {
                    $_SESSION['error_msg'] = $lang['successfully_done'];
                    $_SESSION['msg_type'] = 1;
                }
            } else {
                $query = "insert into gallary_home  (name,type,text) values ({$sq}{$uploaded_file_name}{$sq},6,{$sq}{$offers_text}{$sq})";

                if (mysqli_query($link, $query) === TRUE) {
                    $_SESSION['error_msg'] = $lang['successfully_done'];
                    $_SESSION['msg_type'] = 1;
                }

            }


        } else {

            $_SESSION['error_msg'] = $lang['pics_did_not_upload'];
            $_SESSION['msg_type'] = -1;
        }
    }
//    else{
//        if (mysqli_query($link, $query) === TRUE) {
//            $affected_rows = mysqli_affected_rows($link);
//            if ($affected_rows > 0) {
//                if (!isset($_SESSION['error_msg']) || $_SESSION['error_msg'] == '') {
//                    $_SESSION['error_msg'] = $lang['successfully_done'];
//                    $_SESSION['msg_type'] = 1;
//                }
//            } else {
//                $query = "insert into gallary_home  (type,text) values (6,{$sq}{$offers_text}{$sq})";
//
//                if (mysqli_query($link, $query) === TRUE) {
//                    $_SESSION['error_msg'] = $lang['successfully_done'];
//                    $_SESSION['msg_type'] = 1;
//                }
//
//            }
//
//
//        } else {
//
//            $_SESSION['error_msg'] = $lang['pics_did_not_upload'];
//            $_SESSION['msg_type'] = -1;
//        }
//    }
    if ($about['error'] != 4) {
        $uploadPath = 'gallary';
        $upload_result = @upload_image($about, $uploadPath, $image_sizes['services'], '../');
        $uploaded_file_name = $upload_result['data']['file_name'];
        $query = "update gallary_home set name={$sq}{$uploaded_file_name}{$sq},text={$sq}{$about_text}{$sq} where type = 7";

        $query1 = "select name from gallary_home where type =7";
        if ($result = mysqli_query($link, $query1)) {
            while ($row = mysqli_fetch_assoc($result)) {

                unlink('../files/images/gallary/large/' . $row['name']);
            }

        } else {

            echo -1;
            exit;

        }

        if (mysqli_query($link, $query) === TRUE) {
            $affected_rows = mysqli_affected_rows($link);
            if ($affected_rows > 0) {
                if (!isset($_SESSION['error_msg']) || $_SESSION['error_msg'] == '') {
                    $_SESSION['error_msg'] = $lang['successfully_done'];
                    $_SESSION['msg_type'] = 1;
                }
            } else {
                $query = "insert into gallary_home (name,type,text) values ({$sq}{$uploaded_file_name}{$sq},7,{$sq}{$about_text}{$sq})";

                if (mysqli_query($link, $query) === TRUE) {
                    $_SESSION['error_msg'] = $lang['successfully_done'];
                    $_SESSION['msg_type'] = 1;
                }

            }


        } else {

            $_SESSION['error_msg'] = $lang['pics_did_not_upload'];
            $_SESSION['msg_type'] = -1;
        }
    }
//    else{
//        if (mysqli_query($link, $query) === TRUE) {
//            $affected_rows = mysqli_affected_rows($link);
//            if ($affected_rows > 0) {
//                if (!isset($_SESSION['error_msg']) || $_SESSION['error_msg'] == '') {
//                    $_SESSION['error_msg'] = $lang['successfully_done'];
//                    $_SESSION['msg_type'] = 1;
//                }
//            } else {
//                $query = "insert into gallary_home (type,text) values (7,{$sq}{$about_text}{$sq})";
//
//                if (mysqli_query($link, $query) === TRUE) {
//                    $_SESSION['error_msg'] = $lang['successfully_done'];
//                    $_SESSION['msg_type'] = 1;
//                }
//
//            }
//
//
//        } else {
//
//            $_SESSION['error_msg'] = $lang['pics_did_not_upload'];
//            $_SESSION['msg_type'] = -1;
//        }
//    }
    if ($companies['error'] != 4) {
        $uploadPath = 'gallary';
        $upload_result = @upload_image($companies, $uploadPath, $image_sizes['services'], '../');
        $uploaded_file_name = $upload_result['data']['file_name'];
        $query = "update gallary_home set name={$sq}{$uploaded_file_name}{$sq},text={$sq}{$companies_text}{$sq} where type = 8";

        $query1 = "select name from gallary_home where type =8";
        if ($result = mysqli_query($link, $query1)) {
            while ($row = mysqli_fetch_assoc($result)) {

                unlink('../files/images/gallary/large/' . $row['name']);
            }

        } else {

            echo -1;
            exit;

        }

        if (mysqli_query($link, $query) === TRUE) {
            $affected_rows = mysqli_affected_rows($link);
            if ($affected_rows > 0) {
                if (!isset($_SESSION['error_msg']) || $_SESSION['error_msg'] == '') {
                    $_SESSION['error_msg'] = $lang['successfully_done'];
                    $_SESSION['msg_type'] = 1;
                }
            } else {
                $query = "insert into gallary_home  (name,type,text) values ({$sq}{$uploaded_file_name}{$sq},8,{$sq}{$companies_text}{$sq})";

                if (mysqli_query($link, $query) === TRUE) {
                    $_SESSION['error_msg'] = $lang['successfully_done'];
                    $_SESSION['msg_type'] = 1;
                }

            }


        } else {

            $_SESSION['error_msg'] = $lang['pics_did_not_upload'];
            $_SESSION['msg_type'] = -1;
        }
    }
//    else{
//        if (mysqli_query($link, $query) === TRUE) {
//            $affected_rows = mysqli_affected_rows($link);
//            if ($affected_rows > 0) {
//                if (!isset($_SESSION['error_msg']) || $_SESSION['error_msg'] == '') {
//                    $_SESSION['error_msg'] = $lang['successfully_done'];
//                    $_SESSION['msg_type'] = 1;
//                }
//            } else {
//                $query = "insert into gallary_home  (type,text) values (8,{$sq}{$companies_text}{$sq})";
//
//                if (mysqli_query($link, $query) === TRUE) {
//                    $_SESSION['error_msg'] = $lang['successfully_done'];
//                    $_SESSION['msg_type'] = 1;
//                }
//
//            }
//
//
//        } else {
//
//            $_SESSION['error_msg'] = $lang['pics_did_not_upload'];
//            $_SESSION['msg_type'] = -1;
//        }
//    }
    if ($profile['error'] != 4) {
        $uploadPath = 'gallary';
        $upload_result = @upload_image($profile, $uploadPath, $image_sizes['services'], '../');
        $uploaded_file_name = $upload_result['data']['file_name'];
        $query = "update gallary_home set name={$sq}{$uploaded_file_name}{$sq},text={$sq}{$profile_text}{$sq} where type = 9";

        $query1 = "select name from gallary_home where type =9";
        if ($result = mysqli_query($link, $query1)) {
            while ($row = mysqli_fetch_assoc($result)) {

                unlink('../files/images/gallary/large/' . $row['name']);
            }

        } else {

            echo -1;
            exit;

        }

        if (mysqli_query($link, $query) === TRUE) {
            $affected_rows = mysqli_affected_rows($link);
            if ($affected_rows > 0) {
                if (!isset($_SESSION['error_msg']) || $_SESSION['error_msg'] == '') {
                    $_SESSION['error_msg'] = $lang['successfully_done'];
                    $_SESSION['msg_type'] = 1;
                }
            } else {
                $query = "insert into gallary_home  (name,type,text) values ({$sq}{$uploaded_file_name}{$sq},9,{$sq}{$profile_text}{$sq})";

                if (mysqli_query($link, $query) === TRUE) {
                    $_SESSION['error_msg'] = $lang['successfully_done'];
                    $_SESSION['msg_type'] = 1;
                }

            }


        } else {

            $_SESSION['error_msg'] = $lang['pics_did_not_upload'];
            $_SESSION['msg_type'] = -1;
        }
    }
//    else{
//        if (mysqli_query($link, $query) === TRUE) {
//            $affected_rows = mysqli_affected_rows($link);
//            if ($affected_rows > 0) {
//                if (!isset($_SESSION['error_msg']) || $_SESSION['error_msg'] == '') {
//                    $_SESSION['error_msg'] = $lang['successfully_done'];
//                    $_SESSION['msg_type'] = 1;
//                }
//            } else {
//                $query = "insert into gallary_home  (type,text) values (9,{$sq}{$profile_text}{$sq})";
//
//                if (mysqli_query($link, $query) === TRUE) {
//                    $_SESSION['error_msg'] = $lang['successfully_done'];
//                    $_SESSION['msg_type'] = 1;
//                }
//
//            }
//
//
//        } else {
//
//            $_SESSION['error_msg'] = $lang['pics_did_not_upload'];
//            $_SESSION['msg_type'] = -1;
//        }
//    }


    mysqli_close($link);
    redirect('gallary-form');
    exit;

}


?>
<div class="content-inner chart-cont">
    <div class="col personal-info " align="center">
        <!--                <div class="alert alert-info alert-dismissable">-->
        <!--                    <a class="panel-close close" data-dismiss="alert">×</a>-->
        <!--                    <i class="fa fa-coffee"></i>-->
        <!--                    This is an <strong>.alert</strong>. Use this to show important messages to the user.-->
        <!--                </div>-->
        <div class="card form" id="form1">
            <div class="card-header">
                <h3><i class="fa fa-archive"></i> Gallary</h3>
            </div>
            <br>
            <form action="" enctype="multipart/form-data"
                  method="post"
                  class="form-horizontal  col-8 ">

                <div class="form-group">
                    <label class="col-lg-8 control-label text-left ">Home picture 1</label>
                    <div class="col-lg-8">
                        <input value=""
                               class="form-control" placeholder="" name="home" type="file">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-8 control-label text-left ">Home Text 1:</label>
                    <div class="col-lg-8">
                        <input value="<?php echo isset($home) ? $home : null ?>"
                               class="form-control" placeholder="" name="home_text" type="text">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-8 control-label text-left ">Home picture 2</label>
                    <div class="col-lg-8">
                        <input value=""
                               class="form-control" placeholder="" name="home2" type="file">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-8 control-label text-left ">Home Text 2:</label>
                    <div class="col-lg-8">
                        <input value="<?php echo isset($home2) ? $home2 : null ?>"
                               class="form-control" placeholder="" name="home_text2" type="text">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-8 control-label text-left ">Home picture 3</label>
                    <div class="col-lg-8">
                        <input value=""
                               class="form-control" placeholder="" name="home3" type="file">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-8 control-label text-left ">Home Text 3</label>
                    <div class="col-lg-8">
                        <input value="<?php echo isset($home3) ? $home3 : null ?>"
                               class="form-control" placeholder="" name="home_text3" type="text">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-8 control-label text-left ">Product List</label>
                    <div class="col-lg-8">
                        <input value=""
                               class="form-control" placeholder="" name="product_list" type="file">
                    </div>
                </div>
<!--                <div class="form-group">-->
<!--                    <label class="col-lg-8 control-label text-left ">Product List Text</label>-->
<!--                    <div class="col-lg-8">-->
<!--                        <input value="--><?php //echo isset($product_list) ? $product_list : null ?><!--"-->
<!--                               class="form-control" placeholder="" name="product_list_text" type="text">-->
<!--                    </div>-->
<!--                </div>-->

                <div class="form-group">
                    <label class="col-lg-8 control-label text-left ">Product Details</label>
                    <div class="col-lg-8">
                        <input value=""
                               class="form-control" placeholder="" name="product_details" type="file">
                    </div>
                </div>
<!--                <div class="form-group">-->
<!--                    <label class="col-lg-8 control-label text-left ">Product Details Text</label>-->
<!--                    <div class="col-lg-8">-->
<!--                        <input value="--><?php //echo isset($product_details) ? $product_details : null ?><!--"-->
<!--                               class="form-control" placeholder="" name="product_details_text" type="text">-->
<!--                    </div>-->
<!--                </div>-->

                <div class="form-group">
                    <label class="col-lg-8 control-label text-left ">Cart</label>
                    <div class="col-lg-8">
                        <input value=""
                               class="form-control" placeholder="" name="cart" type="file">
                    </div>
                </div>
<!--                <div class="form-group">-->
<!--                    <label class="col-lg-8 control-label text-left ">Cart Text</label>-->
<!--                    <div class="col-lg-8">-->
<!--                        <input value="--><?php //echo isset($cart) ? $cart : null ?><!--"-->
<!--                               class="form-control" placeholder="" name="cart_text" type="text">-->
<!--                    </div>-->
<!--                </div>-->

                <div class="form-group">
                    <label class="col-lg-8 control-label text-left ">Projects</label>
                    <div class="col-lg-8">
                        <input value=""
                               class="form-control" placeholder="" name="projects" type="file">
                    </div>
                </div>
<!--                <div class="form-group">-->
<!--                    <label class="col-lg-8 control-label text-left ">Projects Text</label>-->
<!--                    <div class="col-lg-8">-->
<!--                        <input value="--><?php //echo isset($projects) ? $projects : null ?><!--"-->
<!--                               class="form-control" placeholder="" name="projects_text" type="text">-->
<!--                    </div>-->
<!--                </div>-->

                <div class="form-group">
                    <label class="col-lg-8 control-label text-left ">Offers</label>
                    <div class="col-lg-8">
                        <input value=""
                               class="form-control" placeholder="" name="offers" type="file">
                    </div>
                </div>
<!--                <div class="form-group">-->
<!--                    <label class="col-lg-8 control-label text-left ">Offers Text</label>-->
<!--                    <div class="col-lg-8">-->
<!--                        <input value="--><?php //echo isset($offers) ? $offers : null ?><!--"-->
<!--                               class="form-control" placeholder="" name="offers_text" type="text">-->
<!--                    </div>-->
<!--                </div>-->

                <div class="form-group">
                    <label class="col-lg-8 control-label text-left ">About</label>
                    <div class="col-lg-8">
                        <input value=""
                               class="form-control" placeholder="" name="about" type="file">
                    </div>
                </div>
<!--                <div class="form-group">-->
<!--                    <label class="col-lg-8 control-label text-left ">About Text</label>-->
<!--                    <div class="col-lg-8">-->
<!--                        <input value="--><?php //echo isset($about) ? $about : null ?><!--"-->
<!--                               class="form-control" placeholder="" name="about_text" type="text">-->
<!--                    </div>-->
<!--                </div>-->

                <div class="form-group">
                    <label class="col-lg-8 control-label text-left ">Companies</label>
                    <div class="col-lg-8">
                        <input value=""
                               class="form-control" placeholder="" name="companies" type="file">
                    </div>
                </div>
<!--                <div class="form-group">-->
<!--                    <label class="col-lg-8 control-label text-left ">Companies Text</label>-->
<!--                    <div class="col-lg-8">-->
<!--                        <input value="--><?php //echo isset($companies) ? $companies : null ?><!--"-->
<!--                               class="form-control" placeholder="" name="companies_text" type="text">-->
<!--                    </div>-->
<!--                </div>-->

                <div class="form-group">
                    <label class="col-lg-8 control-label text-left ">Profile</label>
                    <div class="col-lg-8">
                        <input value=""
                               class="form-control" placeholder="" name="profile" type="file">
                    </div>
                </div>
<!--                <div class="form-group">-->
<!--                    <label class="col-lg-8 control-label text-left ">Profile Text</label>-->
<!--                    <div class="col-lg-8">-->
<!--                        <input value="--><?php //echo isset($profile) ? $profile : null ?><!--"-->
<!--                               class="form-control" placeholder="" name="profile_text" type="text">-->
<!--                    </div>-->
<!--                </div>-->

                <div class="form-group">
                    <label class="col-lg-8 control-label text-left ">News</label>
                    <div class="col-lg-8">
                        <input value=""
                               class="form-control" placeholder="" name="news" type="file">
                    </div>
                </div>
<!--                <div class="form-group">-->
<!--                    <label class="col-lg-8 control-label text-left ">News Text</label>-->
<!--                    <div class="col-lg-8">-->
<!--                        <input value="--><?php //echo isset($news) ? $news : null ?><!--"-->
<!--                               class="form-control" placeholder="" name="news_text" type="text">-->
<!--                    </div>-->
<!--                </div>-->

                <div class="form-group">
                    <label class="col-md-8 control-label text-left "></label>
                    <div class="col-md-8">
                        <button type="submit" id="edit-gallary " name="edit-gallary"
                                class="btn btn-general btn-blue mr-2">Submit
                        </button>
                        <span></span>
                    </div>
                </div>
            </form>

        </div>

    </div>

</div>



