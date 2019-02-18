<?php

if (isset($_SESSION['error_msg']) && !empty($_SESSION['error_msg'])) {

    echo '<script language="javascript">';
    echo "alert('".$_SESSION['error_msg']."')";
    echo '</script>';
    $_SESSION['error_msg']='';
}

//$phone='';
//$name='';
//$email='';
//$gender='';
//$birthday='';
//$address='';




$link = mysqli_connect("localhost", "root", "", "itsource");
$sq = "'";
$path = '../';
$query = "select p.id, p.name, p.price, p.price_vip, p.description_ar, p.description_en, p.subcategory_id, p.quantity, p.date, p.status, s.name_ar, s.name_en, s.status, s.category_id, c.name_ar, c.name_en, c.status from product p inner join subcategory s on p.subcategory_id=s.id inner join category c on s.category_id = c.id order by date desc";

if (mysqli_connect_errno()) {
    $_SESSION['error_msg'] = mysqli_connect_error();
    echo '<script language="javascript">';
    echo 'alert("'.$_SESSION['error_msg'].'")';
    echo '</script>';
    $_SESSION['error_msg']='';
}


if ($result = mysqli_query($link, $query)) {

    while ($row = mysqli_fetch_assoc($result)) {

        $name=$row['phone'];
        $price=$row['name'];
        $price_vip=$row['email'];
        $description_ar=$row['gender'];
        $description_en=$row['gender'];
        $sub_id=$row['birthdate'];
        $sub_name=$row['birthdate'];
        $cat_id=$row['birthdate'];
        $cat_name=$row['birthdate'];
        $quantity=$row['address'];
        $date=$row['address'];
        $status=$row['address'];

    }

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
    redirect('home');
    mysqli_close($link);
    exit();

}



//var_dump($_SESSION);


?>
<div id="home-p" class="home-p pages-head3 text-center">
    <div class="container">
        <h1 class="wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">Shoping Box</h1>
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
            <select class="form-control">
             <option>All</option>
             <option>Mobiles</option>
             <option>Computers</option>
             <option>Routers</option>
            </select>
          </div>
            <div class="col-lg-3">
                <div class="shop-p1-title">
                    <h3>Subcategory</h3>
                    <div class="heading-border-light"></div>
                </div>
                <select class="form-control">
                    <option>All</option>
                    <option>Sumsung j7</option>
                    <option>iPhone 7</option>
                    <option>Hawawi</option>
                </select>
            </div>
            <div class="col-lg-3">
                <div class="shop-p1-title">
                    <h3>Sort as</h3>
                    <div class="heading-border-light"></div>
                </div>
                <select class="form-control">
                    <option>Please select</option>
                    <option>Latest first</option>
                    <option>Oldest first</option>
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
                    <div class="row slider-labels-slider small-text-slider" >
                        <div class="col-6 ">
                            <label>Min: </label> <span id="slider-range-value1" ></span><span> SP</span>
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
                    <button class="btn btn-general btn-green ml-3" role="button">Find</button>
                </div>
            <div class="row">
                  <?php
//                  foreach ($result_latest['data'] as $item) {
//                      template('article_card.php', $item);
//                  }
                 for ($i=0;$i<10;$i++)
                 {
                     template('cards/product-card.php', array());
                 }
                  ?>

            </div>
          </div> 
        </div> 
      </div>
    </section>

<!--====================================================
                      FOOTER
======================================================-->

