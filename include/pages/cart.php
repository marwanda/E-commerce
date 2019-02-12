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
                        CART
======================================================-->
    <section id="cart" class="cart">
      <div class="container">
        <table id="cart" class="table table-hover table-condensed">
          <thead>
            <tr>
              <th style="width:50%">Product</th>
              <th style="width:10%">Price</th>
              <th style="width:8%">Quantity</th>
              <th style="width:22%" class="text-center">Subtotal</th>
              <th style="width:10%"></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td data-th="Product">
                <div class="row">
                  <div class="col-sm-2 hidden-xs"><img src="http://placehold.it/100x100" alt="..." class="img-responsive"/></div>
                  <div class="col-sm-10 prod-desc">
                    <h6 class="nomargin">Product 1</h6>
                    <p>Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet.</p>
                  </div>
                </div>
              </td>
              <td data-th="Price">$64.34</td>
              <td data-th="Quantity">
                <input type="number" class="form-control text-center" value="1">
              </td>
              <td data-th="Subtotal" class="text-center">$64.34</td>
              <td class="actions" data-th="">
                <button class="btn btn-info btn-sm"><i class="fa fa-refresh"></i></button>
                <button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>                
              </td>
            </tr>
            <?php
            //                  foreach ($result_latest['data'] as $item) {
            //                      template('article_card.php', $item);
            //                  }
            for ($i=0;$i<6;$i++)
            {
                template('cards/cart-card.php', array());
            }
            ?>
          </tbody>
          <tfoot> 
            <tr>
              <td><a href="#" class="btn btn-general btn-white"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
              <td colspan="2" class="hidden-xs"></td>
              <td class="hidden-xs text-center"><strong>Total $150.99</strong></td>
              <td><a href="#" class="btn btn-general btn-green">Checkout <i class="fa fa-angle-right"></i></a></td>
            </tr>
          </tfoot>
        </table>
      </div>
    </section>

<!--====================================================
                      FOOTER
======================================================--> 

<?php include '../layout/footer.php'?>