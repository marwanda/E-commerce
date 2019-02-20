<?php

if (isset($_SESSION['error_msg']) && !empty($_SESSION['error_msg'])) {

    echo '<script language="javascript">';
    echo "alert('" . $_SESSION['error_msg'] . "')";
    echo '</script>';
    $_SESSION['error_msg'] = '';
}

//$phone='';
//$name='';
//$email='';
//$gender='';
//$birthday='';
//$address='';

//
$link = mysqli_connect("localhost", "root", "", "itsource");
mysqli_set_charset($link, "utf8");
$sq = "'";
$path = '../';
$query = "select p.id, p.name, p.price, p.price_vip, p.description_ar, p.description_en, p.pic, p.subcategory_id, p.quantity, p.date, p.status, s.name_ar as sub_name_ar, s.name_en as sub_name_en, s.status as sub_status, s.category_id, c.name_ar as cat_name_ar, c.name_en as cat_name_en, c.status as cat_status from product p inner join subcategory s on p.subcategory_id=s.id inner join category c on s.category_id = c.id where s.status=1 and c.status=1 order by date desc";
//
if (mysqli_connect_errno()) {
    $_SESSION['error_msg'] = mysqli_connect_error();
    echo '<script language="javascript">';
    echo 'alert("' . $_SESSION['error_msg'] . '")';
    echo '</script>';
    $_SESSION['error_msg'] = '';
}

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

?>
<div id="home-p" class="home-p pages-head3 text-center">
    <div class="container">
        <h1 class="wow fadeInUp" data-wow-delay="0.1s"
            style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">Shoping Box</h1>
    </div><!--/end container-->
</div>
<!--====================================================
                        SHOP-P1
======================================================-->
<section id="shop-p1" class="shop-p1">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="shop-p1-title">
                    <h3>Categories</h3>
                    <div class="heading-border-light"></div>
                </div>
                <select id="category-select" class="form-control">
                    <option value="-1" selected>All</option>
                </select>
            </div>
            <div class="col-lg-3">
                <div class="shop-p1-title">
                    <h3>Subcategory</h3>
                    <div class="heading-border-light"></div>
                </div>
                <select disabled id="subcategory-select" class="form-control">
                    <option value="-1" selected>All</option>
                </select>
            </div>
            <div class="col-lg-3">
                <div class="shop-p1-title">
                    <h3>Sort as</h3>
                    <div class="heading-border-light"></div>
                </div>
                <select id="sort_selecet" class="form-control">
                    <option selected value="1">Latest first</option>
                    <option value="2">Oldest first</option>
                </select>
            </div>

            <div class="col-lg-3">
                <div class="shop-p1-title">
                    <h3>Price range</h3>
                    <div class="heading-border-light"></div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div id="slider-range" class="mt-2"></div>
                    </div>
                </div>
                <div class="row slider-labels-slider small-text-slider">
                    <div class="col-6 ">
                        <label>Min: </label> <span id="slider-range-value1"></span><span> SP</span>
                    </div>
                    <div class="col-6 text-right ">
                        <label>Max: </label> <span id="slider-range-value2"></span><span> SP</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <form>
                            <input type="hidden" name="min-value" value="">
                            <input type="hidden" name="max-value" value="">
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="row">
                    <button id="find" class="btn btn-general btn-green ml-3" role="button">Find</button>
                </div>
                <div id="products_container" class="row">
                    <?php
                    if ($result = mysqli_query($link, $query)) {
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

                            template('cards/product-card.php', $arr);
                        }
                    } else {

                        $_SESSION['error_msg'] = $lang['general_error'];
                        redirect('home');
                        mysqli_close($link);
                        exit();

                    }
                    //
                    //
                    //                    ?>

                </div>
            </div>
        </div>
    </div>
</section>


<!--====================================================
                      FOOTER
======================================================-->

