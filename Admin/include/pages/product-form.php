<?php

if (isset($_SESSION['error_msg']) && !empty($_SESSION['error_msg'])) {
    echo '<script language="javascript">';
    echo "alert('" . $_SESSION['error_msg'] . "')";
    echo '</script>';
    $_SESSION['error_msg'] = '';

}

$sq = "'";
$path = '../';
$id = isset($_GET['id']) ? make_safe($_GET['id']) : null;
$link = mysqli_connect("localhost", "root", "", "itsource");
mysqli_set_charset($link, "utf8");

if ($id) {

    $query = "select p.id, p.name, p.price, p.price_vip, p.description_ar, p.description_en, p.pic, p.subcategory_id, p.quantity, p.date, p.status, s.name_ar as sub_name_ar, s.name_en as sub_name_en, s.status as sub_status, s.category_id, c.name_ar as cat_name_ar, c.name_en as cat_name_en, c.status as cat_status from product p inner join subcategory s on p.subcategory_id=s.id inner join category c on s.category_id = c.id where p.id= {$id} order by date desc";
    if ($result = mysqli_query($link, $query)) {
        $count = mysqli_num_rows($result);

        if ($count > 0) {
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
            }
        } else
            redirect('404', '../');


    }
}

if (isset($_POST['edit-product'])) {

    $name = isset($_POST['name']) ? make_safe($_POST['name']) : null;
    $price = isset($_POST['price']) ? make_safe($_POST['price']) : null;
    $special_price = isset($_POST['special-price']) ? make_safe($_POST['special-price']) : null;
    $descrption_ar = isset($_POST['description-ar']) ? make_safe($_POST['description-ar']) : null;
    $descrption_en = isset($_POST['description-en']) ? make_safe($_POST['description-en']) : null;
    $subcategory = isset($_POST['subcategory-select']) ? make_safe($_POST['subcategory-select']) : null;
    $picture = isset($_FILES['picture']) ? make_safe($_FILES['picture']) : null;

    $picture1 = isset($_FILES['picture1']) ? make_safe($_FILES['picture1']) : null;
    $picture2 = isset($_FILES['picture2']) ? make_safe($_FILES['picture2']) : null;
    $picture3 = isset($_FILES['picture3']) ? make_safe($_FILES['picture3']) : null;
    $picture4 = isset($_FILES['picture4']) ? make_safe($_FILES['picture4']) : null;

    $pics = array();
    $allowed_files = array(
        "image/png",
        "image/jpeg",
    );


    if ($picture['error'] != 4 && in_array($picture['type'], $allowed_files) == false) {
        $_SESSION['error_msg'] = $lang['only_image'];
        redirect('products-list', $path);
        exit;
    }
    if ($picture1['error'] != 4 && in_array($picture1['type'], $allowed_files) == false) {

        $_SESSION['error_msg'] = $lang['only_image'];
        redirect('products-list', $path);
        exit;
    }
    if ($picture2['error'] != 4 && in_array($picture2['type'], $allowed_files) == false) {

        $_SESSION['error_msg'] = $lang['only_image'];
        redirect('products-list', $path);
        exit;
    }
    if ($picture3['error'] != 4 && in_array($picture3['type'], $allowed_files) == false) {

        $_SESSION['error_msg'] = $lang['only_image'];
        redirect('products-list', $path);
        exit;
    }
    if ($picture4['error'] != 4 && in_array($picture4['type'], $allowed_files) == false) {

        $_SESSION['error_msg'] = $lang['only_image'];
        redirect('products-list', $path);
        exit;
    }

    $uploadPath = 'products';
    $upload_result = @upload_image($picture, $uploadPath, $image_sizes['services'], '../');
    $uploaded_file_name = $upload_result['data']['file_name'];


    $date = date('Y-m-d', time());

    $query = "update product p set  p.name={$sq}{$name}{$sq}, p.price={$price}, p.price_vip={$special_price}, p.description_ar={$sq}{$descrption_ar}{$sq}, p.description_en={$sq}{$descrption_en}{$sq}, p.pic={$sq}{$uploaded_file_name}{$sq}, p.subcategory_id={$subcategory}, p.date={$sq}{$date}{$sq}, p.status=1 where p.id= {$id}";

    if (mysqli_query($link, $query) === TRUE) {

        if ($picture1['error'] != 4) {
            $uploadPath = 'products';
            $upload_result = @upload_image($picture1, $uploadPath, $image_sizes['services'], '../');
            $uploaded_file_name = $upload_result['data']['file_name'];
            $query = "update gallary set name={$sq}{$uploaded_file_name}{$sq} where product_id = {$id} and number=1";

            if (mysqli_query($link, $query) === TRUE) {

                if (!isset($_SESSION['error_msg']) || $_SESSION['error_msg'] == '') {
                    $_SESSION['error_msg'] = $lang['successfully_done'];
                }

            } else {

                $_SESSION['error_msg'] = $lang['pics_did_not_upload'];
            }
        }
        if ($picture2['error'] != 4) {
            $uploadPath = 'products';
            $upload_result = @upload_image($picture2, $uploadPath, $image_sizes['services'], '../');
            $uploaded_file_name = $upload_result['data']['file_name'];
            $query = "update gallary set name={$sq}{$uploaded_file_name}{$sq} where product_id = {$id} and number=2";

            if (mysqli_query($link, $query) === TRUE) {

                if (!isset($_SESSION['error_msg']) || $_SESSION['error_msg'] == '') {
                    $_SESSION['error_msg'] = $lang['successfully_done'];
                }

            } else {

                $_SESSION['error_msg'] = $lang['pics_did_not_upload'];
            }
        }

        if ($picture3['error'] != 4) {
            $uploadPath = 'products';
            $upload_result = @upload_image($picture3, $uploadPath, $image_sizes['services'], '../');
            $uploaded_file_name = $upload_result['data']['file_name'];
            $query = "update gallary set name={$sq}{$uploaded_file_name}{$sq} where product_id = {$id} and number=3";

            if (mysqli_query($link, $query) === TRUE) {

                if (!isset($_SESSION['error_msg']) || $_SESSION['error_msg'] == '') {
                    $_SESSION['error_msg'] = $lang['successfully_done'];
                }

            } else {

                $_SESSION['error_msg'] = $lang['pics_did_not_upload'];
            }
        }

        if ($picture4['error'] != 4) {
            $uploadPath = 'products';
            $upload_result = @upload_image($picture4, $uploadPath, $image_sizes['services'], '../');
            $uploaded_file_name = $upload_result['data']['file_name'];
            $query = "update gallary set name={$sq}{$uploaded_file_name}{$sq} where product_id = {$id} and number=4";

            if (mysqli_query($link, $query) === TRUE) {

                if (!isset($_SESSION['error_msg']) || $_SESSION['error_msg'] == '') {
                    $_SESSION['error_msg'] = $lang['successfully_done'];
                }

            } else {

                $_SESSION['error_msg'] = $lang['pics_did_not_upload'];
            }
        }

        mysqli_close($link);
        redirect('products-list', $path);
        exit;


    } else {
        $_SESSION['error_msg'] = $lang['general_error'];
        mysqli_close($link);
        redirect('product-form', $path);
        exit();
    }
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
                <h3><i class="fa fa-archive"></i> Product Info</h3>
            </div>
            <br>
            <form action="<?php if (!isset($arr)) echo 'requests/submit-product.php'; ?>" enctype="multipart/form-data"
                  method="post"
                  class="form-horizontal  col-8 ">
                <div class="form-group">
                    <label class="col-lg-8 control-label text-left ">Product name:</label>
                    <div class="col-lg-8">
                        <input value="<?php echo isset($arr['name']) ? $arr['name'] : null ?>" required
                               class="form-control" name="name" type="text">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-8 control-label text-left ">Price:</label>
                    <div class="col-lg-8">
                        <input required class="form-control" name="price" type="number"
                               value="<?php echo isset($arr['price']) ? $arr['price'] : null ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-8 control-label text-left ">Special Price:</label>
                    <div class="col-lg-8">
                        <input required class="form-control" name="special-price" type="number"
                               value="<?php echo isset($arr['price_vip']) ? $arr['price_vip'] : null ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-8 control-label text-left ">Description (Arabic):</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="description-ar" type="text"
                               value="<?php echo isset($arr['description_ar']) ? $arr['description_ar'] : null ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-8 control-label text-left ">Description (English):</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="description-en" type="text"
                               value="<?php echo isset($arr['description_en']) ? $arr['description_en'] : null ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-8 control-label text-left ">Category:</label>
                    <div class="col-lg-8">
                        <select required name="category-select" id="category-select" class="selectpicker" menuPlacement="top">
                            <?php if (isset($arr['cat_id'])) {

                                if ($_SESSION['lang'] == 'en')
                                    $catname = $arr['cat_name_en'];
                                else $catname = $arr['cat_name_ar'];

                                echo '<option value="' . $arr['cat_id'] . '" >' . $catname . '</option>';
                            } else {
                                echo '<option value="-1" selected>please choose</option>';
                            } ?>
                        </select>
                    </div>
                </div>
                <input id="cat-id" type="hidden" value="<?php if (isset($arr['cat_id'])) echo $arr['cat_id'] ?>">
                <div class="form-group">
                    <label class="col-md-8 control-label text-left ">Subcategory:</label>
                    <div class="col-lg-8">
                        <select required name="subcategory-select" disabled id="subcategory-select" class="selectpicker">
                            <?php if (isset($arr['sub_id'])) {
                                if ($_SESSION['lang'] == 'en')
                                    $subname = $arr['sub_name_en'];
                                else $subname = $arr['sub_name_ar'];

                                echo '<option value="' . $arr['sub_id'] . '" >' . $subname . '</option>';
                            } else {
                                echo '<option value="-1" selected>please choose</option>';
                            } ?>
                        </select>
                    </div>
                </div>
                <input id="sub-id" type="hidden" value="<?php if (isset($arr['sub_id'])) echo $arr['sub_id'] ?>">


                <!--                <div class="form-group">-->
                <!--                    <label class="col-md-8 control-label text-left ">Subcategory:</label>-->
                <!--                    <div class="col-md-8">-->
                <!--                        <select id="subcategory-select" required class="form-control " name="subcategory">-->
                <!--                            --><?php
                //                            if (!isset($arr)) {
                //
                //                                echo '<option selected value="-1" >Please choose</option>';
                //
                //
                //                            }
                //                            if ($result = mysqli_query($link, $subcategory_query)) {
                //
                //                                while ($row = mysqli_fetch_assoc($result)) {
                //                                    if ($_SESSION['lang'] == 'ar') {
                //                                        if ($row['status'] == 1) {
                //                                            if (isset($arr['sub_id']) && $row['id'] == $arr['sub_id']) {
                //                                                echo '<option selected value="' . $row['id'] . '" >' . $row['name_ar'] . '</option>';
                //                                            } else
                //                                                echo '<option value="' . $row['id'] . '" >' . $row['name_ar'] . '</option>';
                //                                        }
                //
                //
                //                                    } else {
                //
                //                                        if ($row['status'] == 1) {
                //                                            if (isset($arr['sub_id']) && $row['id'] == $arr['sub_id']) {
                //                                                echo '<option selected value="' . $row['id'] . '" >' . $row['name_en'] . '</option>';
                //                                            } else
                //                                                echo '<option value="' . $row['id'] . '" >' . $row['name_en'] . '</option>';
                //                                        }
                //                                    }
                //
                //
                //                                }
                //                                mysqli_close($link);
                //
                //                            }
                //                            ?>
                <!---->
                <!--                        </select>-->
                <!--                    </div>-->
                <!--                </div>-->
                <div class="form-group">
                    <label class="col-md-8 control-label text-left ">thumbnail:</label>
                    <div class="col-md-8">
                        <input required type="file" class="form-control" name="picture" accept="image/*">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-8 control-label text-left ">Picture 1:</label>
                    <div class="col-md-8">
                        <input type="file" class="form-control" name="picture1" accept="image/*">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-8 control-label text-left ">Picture 2:</label>
                    <div class="col-md-8">
                        <input type="file" class="form-control" name="picture2" accept="image/*">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-8 control-label text-left ">Picture 3:</label>
                    <div class="col-md-8">
                        <input type="file" class="form-control" name="picture3" accept="image/*">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-8 control-label text-left ">Picture 4:</label>
                    <div class="col-md-8">
                        <input type="file" class="form-control" name="picture4" accept="image/*">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-8 control-label text-left "></label>
                    <div class="col-md-8">
                        <button type="submit" <?php if (isset($arr)) echo 'id="edit-product" name="edit-product"'; else echo 'id="submit-product" name="submit-product"'; ?>
                                class="btn btn-general btn-blue mr-2">Submit
                        </button>
                        <span></span>
                    </div>
                </div>
            </form>

        </div>

    </div>

</div>



