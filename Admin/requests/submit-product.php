<?php
//include '../include/config.php';
//
////var_dump($_POST);
////var_dump($_FILES);
////exit;
//
//$product_name_ar = isset($_POST['product-name-ar']) ? make_safe($_POST['product-name-ar']) : null;
//$product_name_end = isset($_POST['product-name-en']) ? make_safe($_POST['product-name-en']) : null;
//$price = isset($_POST['price']) ? make_safe($_POST['price']) : null;
//$special_price = isset($_POST['special-price']) ? make_safe($_POST['special-price']) : null;
//$descrption_ar = isset($_POST['description-ar']) ? make_safe($_POST['description-ar']) : null;
//$descrption_en = isset($_POST['description-en']) ? make_safe($_POST['description-en']) : null;
//$subcategory = isset($_POST['subcategory']) ? make_safe($_POST['subcategory']) : null;
//$picture = isset($_FILES['picture']) ? make_safe($_FILES['picture']) : null;
////$pictures = isset($_FILES['pictures']) ? make_safe_array($_FILES['pictures']) : null;
//
//$uploadPath = 'products';
//$upload_result = @upload_image($picture, $uploadPath, $image_sizes['services']);
//$uploaded_file_name = $upload_result['data']['file_name'];
//
//var_dump($uploaded_file_name);
//exit;
//
//$link = mysqli_connect("localhost", "root", "", "itsource");
//$sq = "'";
//$path = '../';
//$query = "INSERT INTO product ( name_ar, name_en, price, price_vip, description_ar, description_en, subcategory_id, pic) VALUES ( {$sq}{$product_name_ar}{$sq}, {$sq}{$product_name_en}{$sq},{$price}, {$special_price}, {$sq}{$descrption_ar}{$sq}, {$sq}{$descrption_en}{$sq},{$subcategory},{$sq}{$picture}{$sq})";
//
//if (mysqli_connect_errno()) {
//    $_SESSION['error_msg'] = mysqli_connect_error();
//    mysqli_close($link);
//    redirect('register',$path);
//    exit;
//}
//
//
//
//if (mysqli_query($link, $query) === TRUE) {
//    $last_id = mysqli_insert_id($link);
//    $_SESSION['role']=1;
//    $_SESSION['user_id']=$last_id;
//    mysqli_close($link);
//    redirect('verification',$path);
//    exit;
//}
//
//else {
//
//    $_SESSION['error_msg'] = $lang['general_error'];
//    mysqli_close($link);
//    redirect('home',$path);
//    exit();
//}
//
//
//?>
