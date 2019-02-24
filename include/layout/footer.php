<footer class="padding-vertical-1  footer-section" id="home_footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-2 text-start margin-bottom-1">
                <img src="<?php echo $APP_ROOT?>assets/img/logo3.png" class="card-img" alt="">
            </div>
            <div class="col-sm-12 col-md-4 text-center margin-bottom-1">
                <div class="footer-links d-flex justify-content-start">
                    <a href="<?php echo $APP_ROOT . $pages['about'] ?>" class=" font-size-16 contact-us-title text-start"><?php echo $lang['our_team']?></a>
                    <a href="<?php echo $APP_ROOT . $pages['companies'] ?>" class=" font-size-16 contact-us-title text-start"><?php echo $lang['leading_companies']?></a>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 connect-us margin-bottom-1">
                <h3 class=" font-size-18 bold stay-connected"><?php echo $lang['stay_connected']?></h3>
                <ul class="social-icon mt-sm-4 pr-sm-2">
                    <li>
                        <a href="#" class=" btn btn-default">
                            <i class="fa fa-facebook-f mt-lg-1"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div id="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div id="footer-copyrights">
                        <p><?php echo $lang['footer_copyright']?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a href="#top-menubar" id="back-to-top" class="btn btn-sm btn-green btn-back-to-top smooth-scrolls hidden-sm hidden-xs" title="home" role="button">
        <i class="fa fa-angle-up"></i>
    </a>
</footer>


<!--<footer>-->
<!--    <div id="footer-s1" class="footer-s1">-->
<!--        <div class="footer">-->
<!--            <div class="container">-->
<!--                <div class="row">-->
<!--                    <div class="col-md-3 col-sm-6 ">-->
<!--                        <div><img src="--><?php //echo $APP_ROOT?><!--assets/img/logo2.png" alt="" class="img-fluid"></div>-->
<!--                        <ul class="list-unstyled comp-desc-f">-->
<!--                            <li><p>Businessbox is a corporate business theme. You can customize what ever you think to make your website much better from your great ideas. </p></li>-->
<!--                        </ul><br>-->
<!--                    </div>-->
<!---->
<!--                    <div class="col-md-3 col-sm-6 ">-->
<!--                        <div class="heading-footer"><h2>Useful Links</h2></div>-->
<!--                        <ul class="list-unstyled link-list">-->
<!--                            <li><a href="about.html">--><?php //echo $lang['about']?><!--</a><i class="fa fa-angle-right"></i></li>-->
<!--                            <li><a href="project.html">Project</a><i class="fa fa-angle-right"></i></li>-->
<!--                            <li><a href="careers.html">Career</a><i class="fa fa-angle-right"></i></li>-->
<!--                            <li><a href="faq.html">FAQ</a><i class="fa fa-angle-right"></i></li>-->
<!--                            <li><a href="contact.html">Contact us</a><i class="fa fa-angle-right"></i></li>-->
<!--                        </ul>-->
<!--                    </div>-->
<!---->
<!--                    <div class="col-md-3 col-sm-6 ">-->
<!--                        <div class="heading-footer"><h2>Recent Post Entries</h2></div>-->
<!--                        <ul class="list-unstyled thumb-list">-->
<!--                            <li>-->
<!--                                <div class="overflow-h">-->
<!--                                    <a href="#">Praesent ut consectetur diam.</a>-->
<!--                                    <small>02 OCT, 2017</small>-->
<!--                                </div>-->
<!--                            </li>-->
<!--                            <li>-->
<!--                                <div class="overflow-h">-->
<!--                                    <a href="#">Maecenas pharetra tellus et fringilla.</a>-->
<!--                                    <small>02 OCT, 2017</small>-->
<!--                                </div>-->
<!--                            </li>-->
<!--                        </ul>-->
<!--                    </div>-->
<!---->
<!--                    <div class="col-md-3 col-sm-6">-->
<!--                        <div class="heading-footer"><h2>Get In Touch</h2></div>-->
<!--                        <address class="address-details-f">-->
<!--                            25, Dist town Street, Logn <br>-->
<!--                            California, US <br>-->
<!--                            Phone: 800 123 3456 <br>-->
<!--                            Fax: 800 123 3456 <br>-->
<!--                            Email: <a href="mailto:info@Businessbox.com" class="">info@Businessbox.com</a>-->
<!--                        </address>-->
<!--                        <ul class="list-inline social-icon-f top-data">-->
<!--                            <li><a href="#" target="_empty"><i class="fa top-social fa-facebook"></i></a></li>-->
<!--                            <li><a href="#" target="_empty"><i class="fa top-social fa-twitter"></i></a></li>-->
<!--                            <li><a href="#" target="_empty"><i class="fa top-social fa-google-plus"></i></a></li>-->
<!--                        </ul>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!---->
<!--    <div id="footer-bottom">-->
<!--        <div class="container">-->
<!--            <div class="row">-->
<!--                <div class="col-md-12">-->
<!--                    <div id="footer-copyrights">-->
<!--                        <p>--><?php //echo $lang['footer_copyright']?><!--</p>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--    <a href="#top-menubar" id="back-to-top" class="btn btn-sm btn-green btn-back-to-top smooth-scrolls hidden-sm hidden-xs" title="home" role="button">-->
<!--        <i class="fa fa-angle-up"></i>-->
<!--    </a>-->
<!--</footer>-->


<?php
foreach ($shared_js as $js) {
    if (isset($js)) {
        echo "<script src=\"{$js}\"></script>";
    }
}

?>

</body>

</html>
