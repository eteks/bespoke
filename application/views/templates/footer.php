<footer>
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3  col-md-3 col-sm-4 col-xs-6">
                    <h3> Support </h3>
                    <ul>
                        <li class="supportLi">
                            <p> Lorem ipsum dolor sit amet, consectetur </p>
                            <h4><a class="inline" href="callto:+12025550151"> <strong> <i class="fa fa-phone"> </i> +1-202-555-0151 </strong> </a></h4>
                            <h4><a class="inline" href="mailto:help@yourweb.com"> <i class="fa fa-envelope-o"> </i>
                                help@yourweb.com </a></h4>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
                    <h3> Shop </h3>
                    <ul>
                        <li><a href="#">
                            Men's
                        </a></li>
                        <li><a href="#">
                            Women's</a></li>
                        <li><a href="#">
                            Kids'
                        </a></li>
                        <li><a href="#">Shoes
                        </a></li>
                        <li><a href="#">
                            Gift Cards
                        </a></li>

                    </ul>
                </div>
                <div style="clear:both" class="hide visible-xs"></div>
                <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
                    <h3> Information </h3>
                    <ul class="list-unstyled footer-nav">
                        <li><a href="#">Questions? </a></li>
                        <li><a href="#"> Order Status </a></li>
                        <li><a href="#"> Sizing Charts </a></li>
                        <li><a href="#"> Return Policy </a></li>
                        <li><a href="#"> Contact Us </a></li>
                    </ul>
                </div>
                <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
                    <h3> My Account </h3>
                    <ul>
                        <li><a href="<?php echo base_url(); ?>account"> My Account </a></li>
                        <li><a href="<?php echo base_url(); ?>my_address"> My Address </a></li>
                        <li><a href="<?php echo base_url(); ?>wishlist"> Wish List </a></li>
                        <li><a href="<?php echo base_url(); ?>order_list"> Order list </a></li>
                        <li><a href="<?php echo base_url(); ?>order_status"> Order Status </a></li>
                    </ul>
                </div>
                <div style="clear:both" class="hide visible-xs"></div>
                <div class="col-lg-3  col-md-3 col-sm-6 col-xs-12 ">
                    <h3> Stay in touch </h3>
                    <ul>
                        <li>
                            <div class="input-append newsLatterBox text-center">
                                <input type="text" class="full text-center" placeholder="Email ">
                                <button class="btn  bg-gray" type="button"> Subscribe <i
                                        class="fa fa-long-arrow-right"> </i></button>
                            </div>
                        </li>
                    </ul>
                    <ul class="social">
                        <li><a href="http://facebook.com"> <i class=" fa fa-facebook"> &nbsp; </i> </a></li>
                        <li><a href="http://twitter.com"> <i class="fa fa-twitter"> &nbsp; </i> </a></li>
                        <li><a href="https://plus.google.com"> <i class="fa fa-google-plus"> &nbsp; </i> </a></li>
                        <li><a href="http://youtube.com"> <i class="fa fa-pinterest"> &nbsp; </i> </a></li>
                        <li><a href="http://youtube.com"> <i class="fa fa-youtube"> &nbsp; </i> </a></li>
                    </ul>
                </div>
            </div>
            <!--/.row-->
        </div>
        <!--/.container-->
    </div>
    <!--/.footer-->
    <div class="footer-bottom">
        <div class="container">
            <p class="pull-left"> &copy; Bespoke 2016. All right reserved. </p>
            <div class="pull-right paymentMethodImg">
                <img height="30" class="pull-right" src="<?php echo base_url(); ?>/assets/img/site/payment/master_card.png" alt="img"> 
                <img height="30" class="pull-right" src="<?php echo base_url(); ?>/assets/img/site/payment/visa_card.png" alt="img">
                <img height="30" class="pull-right" src="<?php echo base_url(); ?>/assets/img/site/payment/paypal.png" alt="img">
                <img height="30" class="pull-right" src="<?php echo base_url(); ?>/assets/img/site/payment/american_express_card.png" alt="img"> <img
                        height="30" class="pull-right" src="<?php echo base_url(); ?>/assets/img/site/payment/discover_network_card.png" alt="img">
                <img height="30" class="pull-right" src="<?php echo base_url(); ?>/assets/img/site/payment/google_wallet.png" alt="img">
            </div>
        </div>
    </div>
    <!--/.footer-bottom-->
</footer>
<!-- <div class="modal fade hide" id="modalAds" role="dialog">
    <div class="modal-dialog  modal-bg-1">
        <div class="modal-body-content">
            <a class="close" data-dismiss="modal">×</a>

            <div class="modal-body">
                <div class="col-lg-6 col-sm-8 col-xs-8">
                    <h3>enter your <br>email to receive</h3>

                    <p class="discountLg">10% OFF </p>

                    <p>We invite you to subscribe to our newsletter and receive 10% discount.
                    </p>

                    <div class="clearfx">
                        <form id="newsletter" class="newsletter">
                            <input type="text" id="subscribe" name="s" placeholder="Enter email">
                            <button class="subscribe-btn">Subscribe</button>
                        </form>
                    </div>

                    <p><a href="<?php echo base_url(); ?>category" class="link shoplink"> SHOP NOW <i class="fa fa-caret-right"> </i> </a>
                    </p>


                </div>
            </div>

        </div>
    </div>
</div> -->
<!-- Le javascript
================================================== -->
<script>
    var baseurl = "<?php echo base_url(); ?>";
</script>
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js">
</script>
<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
<script>
    // this script required for subscribe modal
    $(window).load(function () {
        // full load
        $('#modalAds').modal('show');
        $('#modalAds').removeClass('hide');
    });

</script>

<!-- include jqueryCycle plugin -->
<script src="<?php echo base_url(); ?>assets/js/jquery.cycle2.min.js"></script>

<!-- include easing plugin -->
<script src="<?php echo base_url(); ?>assets/js/jquery.easing.1.3.js"></script>

<!-- include  parallax plugin -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.parallax-1.1.js"></script>

<!-- optionally include helper plugins -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/helper-plugins/jquery.mousewheel.min.js"></script>

<!-- include mCustomScrollbar plugin //Custom Scrollbar  -->

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.mCustomScrollbar.js"></script>

<!-- include icheck plugin // customized checkboxes and radio buttons   -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/icheck-1.x/icheck.min.js"></script>

<!-- include grid.js // for equal Div height  -->
<script src="<?php echo base_url(); ?>assets/js/grids.js"></script>

<!-- include carousel slider plugin  -->
<script src="<?php echo base_url(); ?>assets/js/owl.carousel.min.js"></script>
<!-- include smoothproducts // product zoom plugin  -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/smoothproducts.min.js"></script>

<!-- jQuery select2 // custom select   -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>

<!-- include touchspin.js // touch friendly input spinner component   -->
<script src="<?php echo base_url(); ?>assets/js/bootstrap.touchspin.js"></script>

<!-- include custom script for only homepage  -->
<script src="<?php echo base_url(); ?>assets/js/home.js"></script>
<!-- include custom script for site  -->
<script src="<?php echo base_url(); ?>assets/js/script.js"></script>
<script></script>
<script src="<?php echo base_url(); ?>assets/plugins/rating/bootstrap-rating.min.js"></script>
<script>
    $(function () {
        $('.rating-tooltip-manual').rating({
            extendSymbol: function () {
                var title;
                $(this).tooltip({
                    container: 'body',
                    placement: 'bottom',
                    trigger: 'manual',
                    title: function () {
                        return title;
                    }
                });
                $(this).on('rating.rateenter', function (e, rate) {
                    title = rate;
                    $(this).tooltip('show');
                })
                        .on('rating.rateleave', function () {
                            $(this).tooltip('hide');
                        });
            }
        });
    });
</script>
<!-- include footable plugin -->
<script src="<?php echo base_url(); ?>assets/js/footable.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/footable.sortable.js" type="text/javascript"></script>
<script type="text/javascript">
  var baseurl = "<?php echo base_url(); ?>";
</script>
<script>
    paceOptions = {
        elements: true
    };
</script>
<script src="<?php echo base_url(); ?>assets/js/pace.min.js"></script>

<!-- external javascript --> 
<script src="<?php echo base_url(); ?>assets/js/custom.js"></script>  
<script src="<?php echo base_url(); ?>assets/js/ajax-call.js"></script> 
</body>
</html>
