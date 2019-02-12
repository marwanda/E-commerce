<?php include '../layout/header.php'?>

<!--====================================================
                       HOME-P
======================================================-->
    <div id="home-p" class="home-p pages-head3 text-center">
      <div class="container">
        <h1 class="wow fadeInUp" data-wow-delay="0.1s">Shoping Box</h1>
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
                  <div class="tab-pane active" id="pic-1"><img src="img/shop/shop-item-1.jpg" /></div>
                  <div class="tab-pane" id="pic-2"><img src="img/shop/shop-item-3.jpg" /></div>
                  <div class="tab-pane" id="pic-3"><img src="img/shop/shop-item-4.jpg" /></div>
                  <div class="tab-pane" id="pic-4"><img src="img/shop/shop-item-5.jpg" /></div>
                  <div class="tab-pane" id="pic-5"><img src="img/shop/shop-item-2.jpg" /></div>
                </div>
                <ul class="preview-thumbnail nav nav-tabs">
                  <li class="active"><a data-target="#pic-1" data-toggle="tab"><img src="img/shop/shop-item-1.jpg" /></a></li>
                  <li><a data-target="#pic-2" data-toggle="tab"><img src="img/shop/shop-item-3.jpg" /></a></li>
                  <li><a data-target="#pic-3" data-toggle="tab"><img src="img/shop/shop-item-4.jpg" /></a></li>
                  <li><a data-target="#pic-4" data-toggle="tab"><img src="img/shop/shop-item-5.jpg" /></a></li>
                  <li><a data-target="#pic-5" data-toggle="tab"><img src="img/shop/shop-item-2.jpg" /></a></li>
                </ul>
              </div>
              <div class="details col-md-6">
                <h3 class="product-title mb-5">Women trend fashion</h3>
                  <h6 class="price mb-5">category - subcategory</h6>
                  <h6 class="price mb-5">current price: <span>$180</span></h6>
                  <h6 class="price mb-5">Last update: <span>20/2/2019</span>
                  </h6>
                  <div class="action " style="margin-top: 116px">
                      <div class="title-but"><button class="btn btn-general btn-white" role="button"><i class="fa fa-cart-plus"></i> Add to Cart</button></div>
                  </div>
                </div>

              </div>
              <div class="col-md-12">
                <div class="service-h-tab"> 
                  <nav class="nav nav-tabs" id="myTab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile">Desciption</a>
                  </nav>
                  <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                      <p>Nulla est ullamco ut irure incididunt nulla Lorem Lorem minim irure officia enim reprehenderit. Magna duis labore cillum sint adipisicing exercitation ipsum. Nostrud ut anim non exercitation velit laboris fugiat cupidatat. Commodo esse dolore fugiat sint velit ullamco magna consequat voluptate minim amet aliquip ipsum aute</p>

                      <p>Nulla est ullamco ut irure incididunt nulla Lorem Lorem minim irure officia enim reprehenderit. Magna duis labore cillum sint adipisicing exercitation ipsum. Nostrud ut anim non exercitation velit laboris fugiat cupidatat. Commodo esse dolore fugiat sint velit ullamco magna consequat voluptate minim amet aliquip ipsum aute</p>
                    </div>  
                  </div>
                </div>
            </div> 
      </div>
    </section>

<!--====================================================
                        SHOP-P1
======================================================--> 
    <section id="shop-p1" class="shop-p1" style="padding-top:0px;">
      <div class="container">
        <div class="row">
          <div class="col-lg-3">
            <div class="shop-p1-title">  
              <h3>Related More</h3>
              <div class="heading-border-light"></div> 
            </div>  
          </div> 
          <div class="col-lg-12"> 
            <div class="row" style="padding: 0px">
                <?php
                //                  foreach ($result_latest['data'] as $item) {
                //                      template('article_card.php', $item);
                //                  }
                for ($i=0;$i<3;$i++)
                {
                    template('cards/product-card.php', array());
                }
                ?>
            </div>
          </div> 
        </div> 
      </div>
    </section>

<?php include '../layout/footer.php'?>

