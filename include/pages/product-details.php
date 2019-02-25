<?php
$id = isset($_GET['id']) ? $_GET['id'] : null;
$link = mysqli_connect("localhost", "root", "", "itsource");
mysqli_set_charset($link, "utf8");
$sq = "'";
$path = '../';
$query = "select p.id, p.name, p.price, p.price_vip, p.description_ar, p.description_en, p.pic, p.subcategory_id, p.quantity, p.date, p.status, s.name_ar as sub_name_ar, s.name_en as sub_name_en, s.status as sub_status, s.category_id, c.name_ar as cat_name_ar, c.name_en as cat_name_en, c.status as cat_status from product p inner join subcategory s on p.subcategory_id=s.id inner join category c on s.category_id = c.id where p.id=$id";
$query2 = "SELECT * FROM itsource.gallary where product_id= {$id}";
$arr2=array();
//
if (mysqli_connect_errno()) {
    $_SESSION['error_msg'] = mysqli_connect_error();
    echo '<script language="javascript">';
    echo 'alert("' . $_SESSION['error_msg'] . '")';
    echo '</script>';
    $_SESSION['error_msg'] = '';
}

else
    if(isset($id) && !empty($id) )
{

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

            extract($arr);



        }
    }
    else {

        $_SESSION['error_msg'] = $lang['general_error'];
        redirect('home');
        mysqli_close($link);
        exit();

    }




}
//var_dump($_SESSION);
?>
<!--====================================================
                       HOME-P
======================================================-->
    <div id="home-p" class="home-p pages-head3 text-center">
      <div class="container">
        <h1 class="wow fadeInUp" data-wow-delay="0.1s"><?php echo $lang['online_shopping']?></h1>
      </div><!--/end container-->
    </div> 

<!--====================================================
                  SINGLE-PRODUCT-P1
======================================================--> 
    <section id="single-product-p1">
      <div class="container">  
            <div class="wrapper row">
              <div class="preview col-md-6">
                
                <div class="preview-pic tab-content">
                  <div class="tab-pane active" id="pic-1"><img class="product-details-large-pic" src="<?php echo $FILES_ROOT.'images/products/large/'.$pic?>" /></div>

                    <?php
                    $i=2;
                    if ($result = mysqli_query($link, $query2)) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            array_push($arr2,$row['name']);
                            echo '<div class="tab-pane" id="pic-'.$i.'" data-toggle="tab"><img class="product-details-large-pic" src="'.$FILES_ROOT.'images/products/large/'.$row['name'].'" /></div>';
                            $i++;
                        }
                    }

                    ?>


<!--                  <div class="tab-pane" id="pic-2"><img src="--><?php //echo $APP_ROOT ?><!--assets/img/shop/shop-item-3.jpg" /></div>-->
<!--                  <div class="tab-pane" id="pic-3"><img src="--><?php //echo $APP_ROOT ?><!--assets/img/shop/shop-item-4.jpg" /></div>-->
<!--                  <div class="tab-pane" id="pic-4"><img src="--><?php //echo $APP_ROOT ?><!--assets/img/shop/shop-item-5.jpg" /></div>-->
<!--                  <div class="tab-pane" id="pic-5"><img src="--><?php //echo $APP_ROOT ?><!--assets/img/shop/shop-item-2.jpg" /></div>-->
                </div>
                <ul class="preview-thumbnail nav nav-tabs">
                    <li class="active"><a class="product-gallery-thumbs" data-target="#pic-1" data-toggle="tab"><img src="<?php echo $FILES_ROOT.'images/products/large/'.$pic?>" /></a></li>
                    <?php
                    $i=2;
                    if (isset($arr2)) {
                       foreach ($arr2 as $pic)
                       {
                            echo '<li><a class="product-gallery-thumbs" data-target="#pic-'.$i.'" data-toggle="tab"><img src="' . $FILES_ROOT . 'images/products/thumb/' . $pic. '" /></a></li>';
                            $i++;
                            }

                    }



                    ?>
<!--                  <li class="active"><a data-target="#pic-1" data-toggle="tab"><img src="--><?php //echo $FILES_ROOT.'images/products/thumb/'.$pic?><!--" /></a></li>-->
<!--                  <li><a data-target="#pic-2" data-toggle="tab"><img src="--><?php //echo $APP_ROOT ?><!--assets/img/shop/shop-item-3.jpg" /></a></li>-->
<!--                  <li><a data-target="#pic-3" data-toggle="tab"><img src="--><?php //echo $APP_ROOT ?><!--assets/img/shop/shop-item-4.jpg" /></a></li>-->
<!--                  <li><a data-target="#pic-4" data-toggle="tab"><img src="--><?php //echo $APP_ROOT ?><!--assets/img/shop/shop-item-5.jpg" /></a></li>-->
<!--                  <li><a data-target="#pic-5" data-toggle="tab"><img src="--><?php //echo $APP_ROOT ?><!--assets/img/shop/shop-item-2.jpg" /></a></li>-->
                </ul>
              </div>
              <div class="details col-md-6">
                <h3 class="product-title mb-5"><?php echo $name?></h3>
                  <h6 class="price mb-5"><?php echo $_SESSION['lang']=='en'? $cat_name_en. ' - '.$sub_name_en : $cat_name_ar. ' - '.$sub_name_ar  ?></h6>
                  <h6 class="price mb-5"><?php echo $lang['current_price']?><span><?php echo $_SESSION['role']==3? $price_vip.' '.$lang['sp'] : $price .' '.$lang['sp'] ?></span></h6>
                  <h6 class="price mb-5"><?php echo $lang['last_update']?><span><?php echo $date ?></span>
                  </h6>
                  <?php
                  if ($status != 1)
                  {
                      ?>
                      <p><?php echo $lang['product_unavailable']; ?></p><?php
                  }else{
                  ?>
                      <div class="action " style="margin-top: 116px">
                          <div class="title-but"> <button data-id="<?php echo $id ?>" class="btn btn-general product-details-add-button btn-white <?php if (isset($_SESSION['role']) && (($_SESSION['role'] == 2 || $_SESSION['role'] == 3))) {
                                  echo 'add-to-cart'; } else { echo 'add-to-cart-login'; } ?>" role="button"><i class="fa fa-cart-plus"></i> <?php echo $lang['add_to_cart'] ?></button></div>
                      </div>
<input type="hidden" id="pd" value="1">
                  <?php }?>

                </div>

              </div>
              <div class="col-md-12">
                <div class="service-h-tab"> 
                  <nav class="nav nav-tabs" id="myTab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile"><?php echo $lang['description'] ?></a>
                  </nav>
                  <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                      <p class="product-details-desc"><?php echo $_SESSION['lang']=='en'? $description_en:$description_ar?></p>
                    </div>
                  </div>
                </div>
            </div> 
      </div>
    </section>

<!--====================================================
                        SHOP-P1
======================================================--> 
<!--    <section id="shop-p1" class="shop-p1" style="padding-top:0px;">-->
<!--      <div class="container">-->
<!--        <div class="row">-->
<!--          <div class="col-lg-3">-->
<!--            <div class="shop-p1-title">  -->
<!--              <h3>Related More</h3>-->
<!--              <div class="heading-border-light"></div> -->
<!--            </div>  -->
<!--          </div> -->
<!--          <div class="col-lg-12"> -->
<!--            <div class="row" style="padding: 0px">-->
<!--                --><?php
//                //                  foreach ($result_latest['data'] as $item) {
//                //                      template('article_card.php', $item);
//                //                  }
//                for ($i=0;$i<3;$i++)
//                {
//                    template('cards/product-card.php', array());
//                }
//                ?>
<!--            </div>-->
<!--          </div> -->
<!--        </div> -->
<!--      </div>-->
<!--    </section>-->


