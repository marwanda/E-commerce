<?php
include '../include/config.php';


$path = '../';
$name = isset($_POST['name']) ? make_safe($_POST['name']) : null;
$price = isset($_POST['price']) ? make_safe($_POST['price']) : null;
$special_price = isset($_POST['special-price']) ? make_safe($_POST['special-price']) : null;
$descrption_ar = isset($_POST['description-ar']) ? make_safe($_POST['description-ar']) : null;
$descrption_en = isset($_POST['description-en']) ? make_safe($_POST['description-en']) : null;
$subcategory = isset($_POST['subcategory']) ? make_safe($_POST['subcategory']) : null;
$picture = isset($_FILES['picture']) ? make_safe($_FILES['picture']) : null;
$picture1 = isset($_FILES['picture1']) ? make_safe($_FILES['picture1']) : null;
$picture2 = isset($_FILES['picture2']) ? make_safe($_FILES['picture2']) : null;
$picture3 = isset($_FILES['picture3']) ? make_safe($_FILES['picture3']) : null;
$picture4 = isset($_FILES['picture4']) ? make_safe($_FILES['picture4']) : null;

$pics=array();
$allowed_files = array(
    "image/png",
    "image/jpeg",
);


if ($picture['error']!=4 && in_array($picture['type'], $allowed_files)==false) {
    $_SESSION['error_msg'] = $lang['only_image'];
    redirect('products-list', $path);
    exit;
}
if ($picture1['error']!=4 &&in_array($picture1['type'], $allowed_files)==false) {

    $_SESSION['error_msg'] = $lang['only_image'];
    redirect('products-list', $path);
    exit;
}
if ($picture2['error']!=4 &&in_array($picture2['type'], $allowed_files)==false) {

    $_SESSION['error_msg'] = $lang['only_image'];
    redirect('products-list', $path);
    exit;
}
if ($picture3['error']!=4 &&in_array($picture3['type'], $allowed_files)==false) {

    $_SESSION['error_msg'] = $lang['only_image'];
    redirect('products-list', $path);
    exit;
}
if ($picture4['error']!=4 &&in_array($picture4['type'], $allowed_files)==false) {

    $_SESSION['error_msg'] = $lang['only_image'];
    redirect('products-list', $path);
    exit;
}








$uploadPath = 'products';
$upload_result = @upload_image($picture, $uploadPath, $image_sizes['services']);
$uploaded_file_name = $upload_result['data']['file_name'];



$link = mysqli_connect("localhost", "root", "", "itsource");
mysqli_set_charset($link, "utf8");
$sq = "'";
$path = '../';
$date = date('Y-m-d', time());
$query = "INSERT INTO product ( name, price, price_vip, description_ar, description_en, subcategory_id, pic,date , status) VALUES ( {$sq}{$name}{$sq},{$price}, {$special_price}, {$sq}{$descrption_ar}{$sq}, {$sq}{$descrption_en}{$sq},{$subcategory},{$sq}{$uploaded_file_name}{$sq},{$sq}{$date}{$sq},1)";

if (mysqli_connect_errno()) {
    $_SESSION['error_msg'] = mysqli_connect_error();
    mysqli_close($link);
    redirect('orders-list', $path);
    exit;
}
$product_id='';
if (mysqli_query($link, $query) === TRUE) {

    $product_id= mysqli_insert_id($link);

    if($picture1['error']!=4)
    {
        $uploadPath = 'products';
        $upload_result = @upload_image($picture1, $uploadPath, $image_sizes['services']);
        $uploaded_file_name = $upload_result['data']['file_name'];


        $query="insert into gallary (product_id,name,number) values ({$product_id},{$sq}{$uploaded_file_name}{$sq},1)";
        if (mysqli_query($link, $query) === TRUE) {
            if(!isset($_SESSION['error_msg']) || $_SESSION['error_msg']=='')
            {
                $_SESSION['error_msg']=$lang['successfully_done'];
            }

        }else{

            $_SESSION['error_msg']=$lang['pics_did_not_upload'];
        }
    }
    if($picture2['error']!=4)
    {
        $uploadPath = 'products';
        $upload_result = @upload_image($picture2, $uploadPath, $image_sizes['services']);
        $uploaded_file_name = $upload_result['data']['file_name'];
        $query="insert into gallary (product_id,name,number) values ({$product_id},{$sq}{$uploaded_file_name}{$sq},2)";
        if (mysqli_query($link, $query) === TRUE) {
            if(!isset($_SESSION['error_msg']) || $_SESSION['error_msg']=='')
            {
                $_SESSION['error_msg']=$lang['successfully_done'];
            }

        }else{

            $_SESSION['error_msg']=$lang['pics_did_not_upload'];
        }
    }
    if($picture3['error']!=4)
    {
        $uploadPath = 'products';
        $upload_result = @upload_image($picture3, $uploadPath, $image_sizes['services']);
        $uploaded_file_name = $upload_result['data']['file_name'];
        $query="insert into gallary (product_id,name,number) values ({$product_id},{$sq}{$uploaded_file_name}{$sq},3)";

        if (mysqli_query($link, $query) === TRUE) {
            if(!isset($_SESSION['error_msg']) || $_SESSION['error_msg']=='')
            {
                $_SESSION['error_msg']=$lang['successfully_done'];
            }

        }else{

            $_SESSION['error_msg']=$lang['pics_did_not_upload'];
        }
    }
    if($picture4['error']!=4)
    {
        $uploadPath = 'products';
        $upload_result = @upload_image($picture4, $uploadPath, $image_sizes['services']);
        $uploaded_file_name = $upload_result['data']['file_name'];
        $query="insert into gallary (product_id,name,number) values ({$product_id},{$sq}{$uploaded_file_name}{$sq},4)";
        if (mysqli_query($link, $query) === TRUE) {
            if(!isset($_SESSION['error_msg']) || $_SESSION['error_msg']=='')
            {
                $_SESSION['error_msg']=$lang['successfully_done'];
            }

        }else{

            $_SESSION['error_msg']=$lang['pics_did_not_upload'];
        }
    }

    mysqli_close($link);
    redirect('products-list',$path);
    exit;


} else {
    $_SESSION['error_msg'] = $lang['general_error'];
    mysqli_close($link);
    redirect('product-form', $path);
    exit();
}


?>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         