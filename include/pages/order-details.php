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
            <h4 class="text-left mb-5">Order details</h4>
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
                <?php
                //                  foreach ($result_latest['data'] as $item) {
                //                      template('article_card.php', $item);
                //                  }
                for ($i=0;$i<6;$i++)
                {
                    template('cards/cart-card-old.php', array());
                }
                ?>
                </tbody>
                <tfoot>
                <tr>
                    <td><a href="#" class="btn btn-general btn-white"><i class="fa fa-angle-left"></i> Back to orders</a></td>
                    <td colspan="2" class="hidden-xs"></td>
                    <td class="hidden-xs text-center"><strong>Total $150.99</strong></td>
                </tr>
                </tfoot>
            </table>
        </div>
    </section>

    <!--====================================================
                          FOOTER
    ======================================================-->

<?php include '../layout/footer.php'?>