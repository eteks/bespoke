<?php if(!$this->input->is_ajax_request()){ ?>
<?php include "templates/header.php"; ?>
<div class="banner">
    <div class="full-container">
        <div class="slider-content">
            <ul id="pager2" class="container">
            </ul> <!-- prev/next links -->
            <span class="prevControl sliderControl"> 
                <i class="fa fa-angle-left fa-3x "></i>
            </span> 
            <span class="nextControl sliderControl"> 
                <i class="fa fa-angle-right fa-3x "></i>
            </span>
            <div class="slider slider-v1" data-cycle-swipe=true data-cycle-prev=".prevControl"
                 data-cycle-next=".nextControl" data-cycle-loader="wait">
                <div class="slider-item slider-item-img1">
                    <img src="<?php echo base_url(); ?>assets/img/slider/slider0.jpg" class="img-responsive parallaximg sliderImg" alt="img">
                </div>
                <div class="slider-item slider-item-img1">
                    <div class="sliderInfo">
                        <div class="container">
                            <div class="col-lg-12 col-md-12 col-sm-12 sliderTextFull ">
                                <div class="inner text-center">
                                    <div class="topAnima animated">
                                        <h1 class="uppercase xlarge">FREE SHIPPING</h1>
                                        <h3 class="hidden-xs"> Free Standard Shipping on Orders Over $100 </h3>
                                    </div>
                                    <a class="btn btn-danger btn-lg bottomAnima animated opacity0">SHOP NOW ON BESPOKE
                                        <span class="arrowUnicode">►</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <img src="<?php echo base_url(); ?>assets/img/slider/slider1.jpg" class="img-responsive parallaximg sliderImg" alt="img">
                </div> <!--/.slider-item-->
                <div class="slider-item slider-item-img2 ">
                    <div class="sliderInfo">
                        <div class="container">
                            <div class="col-lg-12 col-md-12 col-sm-12 sliderTextFull  ">
                                <div class="inner dark maxwidth500 text-center animated topAnima">
                                    <div class=" ">
                                        <h1 class="uppercase xlarge"> CUSTOM HTML BLOCK</h1>
                                        <h3 class="hidden-xs"> Custom Slides to Your Slider </h3>
                                    </div>
                                    <a class="btn btn-danger btn-lg">SHOP NOW ON BESPOKE <span
                                            class="arrowUnicode">►</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <img src="<?php echo base_url(); ?>assets/img/slider/slider3.jpg" class="img-responsive parallaximg sliderImg" alt="img">
                </div> <!--/.slider-item-->
                <div class="slider-item slider-item-img3 ">
                    <div class="sliderInfo">
                        <div class="container">
                            <div class="col-lg-5 col-md-4 col-sm-6 col-xs-8   pull-left sliderText white hidden-xs">
                                <div class="inner">
                                    <h1>JEANS</h1>
                                    <h3 class="price "> Free Shipping on $100</h3>
                                    <p class="hidden-xs">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed
                                        diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat
                                        volutpat. </p>
                                    <a href="<?php echo base_url(); ?>category" class="btn btn-primary">SHOP NOW <span class="arrowUnicode">►</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <img src="<?php echo base_url(); ?>assets/img/slider/slider4.jpg" class="img-responsive parallaximg sliderImg" alt="img">
                </div> <!--/.slider-item-->
                <div class="slider-item slider-item-img3">
                    <div class="sliderInfo">
                        <div class="container">
                            <div class="col-lg-5 col-md-6 col-sm-5 col-xs-5 pull-left sliderText blankstyle transformRight">
                                <div class="inner text-right">
                                    <img src="<?php echo base_url(); ?>assets/img/slider/color.png" class="img-responsive" alt="img">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-5 col-xs-7   pull-left sliderText blankstyle color-white">
                                <div class="inner">
                                    <h1 class="uppercase topAnima animated ">10+ Amazing Color Theme</h1>
                                    <p class="bot tomAnima animated opacity0 hidden-xs"> Fully responsive bootstrap
                                        Ecommerce Template. Available in 10+ color schemes and easy to set. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <img src="<?php echo base_url(); ?>assets/img/slider/slider2.jpg" class="img-responsive parallaximg sliderImg" alt="img">
                </div>
            </div> <!--/.slider slider-v1-->
        </div> <!--/.slider-content-->
    </div> <!--/.full-container-->
</div> <!--/.banner style1-->

    <!-- ************  New Arrivals Start  ***************  -->

    <div class="container main-container">
        <!-- Main component call to action -->
        <div class="row featuredPostContainer globalPadding style2">
            <h3 class="section-title style2 text-center"><span>NEW ARRIVALS</span></h3>
            <div id="productslider" class="owl-carousel owl-theme">
                <?php
                if(!empty($new_arrivals)) :
                foreach ($new_arrivals as $new_arr) :
                ?>
                <div class="item">
                    <div class="product">
                        <a class="add-fav tooltipHere" data-toggle="tooltip" data-original-title="Add to Wishlist" data-placement="left">
                            <i class="glyphicon glyphicon-heart"></i>
                        </a>
                        <div class="image">
                            <a href="#">
                                <img src="<?php echo base_url().$new_arr['product_upload_image']; ?>"  alt="img" class="img-responsive">
                            </a>
                            <div class="product_name">
                                <a href="<?php echo base_url(); ?>product_details/<?php echo $new_arr['product_id']; ?>">
                                    <?php echo $new_arr['product_title']; ?>
                                </a>
                            </div>
                        </div>
                        <div class="description">
                            <h4>
                                <a href="<?php echo base_url(); ?>product_details/<?php echo $new_arr['product_id']; ?>"><?php echo $new_arr['product_title']; ?> </a>
                            </h4>
                            <p> <?php echo $new_arr['product_description']; ?> </p>
                        </div>
                        <div class="price">
                            <span> &#8377; <?php echo $new_arr['product_price']; ?> </span>
                        </div>
                        <div class="action-control">
                            <a data-toggle="modal" class="btn btn-primary add_to_cart_popup" href="#" data-target="#productSetailsModalAjax" data-pro_id="<?php echo $new_arr['product_id']; ?>"> 
                                <span class="add2cart">
                                    <i class="glyphicon glyphicon-shopping-cart"> </i> Add to cart 
                                </span> 
                            </a>
                        </div>
                    </div>
                </div>
                <?php
                endforeach;
                endif;
                ?>
            </div> <!--/.productslider-->
        </div> <!--/.featuredPostContainer-->
    </div> <!-- /main container -->

    <!-- ************  New Arrivals End  ***************  -->

<div class="parallax-section parallax-image-1">
    <div class="container">
        <div class="row ">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="parallax-content clearfix">
                    <h1 class="parallaxPrce"> $200 </h1>

                    <h2 class="uppercase">FREE INTERNATIONAL SHIPPING! Get Free Shipping Coupons</h2>

                    <h3> Energistically develop parallel mindshare rather than premier deliverables. </h3>

                    <div style="clear:both"></div>
                    <a class="btn btn-discover "> <i class="fa fa-shopping-cart"></i> SHOP NOW </a></div>
            </div>
        </div>
        <!--/.row-->
    </div>
    <!--/.container-->
</div>
<!--/.parallax-image-1-->

    <!-- Demo Features Content end -->

    <!-- Main component call to action -->

    <!-- ************  Featured products Start  ***************  -->
    <div class="container main-container">
    <div class="morePost row featuredPostContainer style2 globalPaddingTop ">
        <h3 class="section-title style2 text-center"><span>FEATURED PRODUCT</span></h3>
        <div class="container">
            <div class="row xsResponse" id="featured_product_section">
                <?php } ?>
                <?php
                if(!empty($featured_products)) :
                foreach ($featured_products as $fea_arr) :
                ?>
                <div class="item col-lg-3 col-md-3 col-sm-4 col-xs-6">
                    <div class="product">
                        <a class="add-fav tooltipHere" data-toggle="tooltip" data-original-title="Add to Wishlist" data-placement="left">
                            <i class="glyphicon glyphicon-heart"></i>
                        </a>
                        <div class="image">
                            <a href="#">
                                <img src="<?php echo base_url().$fea_arr['product_upload_image']; ?>" alt="img" class="img-responsive">
                            </a>
                            <div class="product_name">
                                <a href="<?php echo base_url(); ?>product_details/<?php echo $fea_arr['product_id']; ?>">
                                    <?php echo $fea_arr['product_title']; ?>
                                </a>
                            </div>
                        </div>
                        <div class="description">
                            <h4>
                                <a href="<?php echo base_url(); ?>product_details/<?php echo $fea_arr['product_id']; ?>">
                                    <?php echo $fea_arr['product_title']; ?>
                                </a>
                            </h4>
                            <p> <?php echo $fea_arr['product_description']; ?> </p>
                        </div>
                        <div class="price">
                            <span> &#8377; <?php echo $fea_arr['product_price']; ?> </span> 
                        </div>
                        <div class="action-control">
                            <a data-toggle="modal" class="btn btn-primary add_to_cart_popup" data-target="#productSetailsModalAjax" data-pro_id="<?php echo $fea_arr['product_id']; ?>">
                                <span class="add2cart">
                                    <i class="glyphicon glyphicon-shopping-cart"> </i> 
                                        Add to cart 
                                </span> 
                            </a>
                        </div>
                    </div>
                </div>
                <?php
                endforeach;
                ?>
                <input type="hidden" value="<?php if(!empty($featured_remaining_products)) : echo $featured_remaining_products; endif; ?>" class="remaining_featured_value" />
                <?php
                endif;
                ?>
                <?php if(!$this->input->is_ajax_request()){ ?>
            </div> <!-- /.row -->
            <div class="row">
                <div class="load-more-block text-center">
                    <a id="load_more_featured" class="btn btn-thin load_more_featured"> 
                        <i class="fa fa-plus-sign">+</i> load more products
                    </a>
                    <input type="hidden" value="4" id="load_more_featured_value" />     
                </div>
            </div>
        </div> <!--/.container-->
    </div> <!--/.featuredPostContainer-->

    <!-- ************  Featured products End  ***************  -->

    <hr class="no-margin-top">
    <div class="width100 section-block ">
        <div class="row featureImg">
            <div class="col-md-3 col-sm-3 col-xs-6"><a href="<?php echo base_url(); ?>category"><img src="<?php echo base_url(); ?>assets/img/site/new-collection-1.jpg"
                                                                                 class="img-responsive" alt="img"></a>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6"><a href="<?php echo base_url(); ?>category"><img src="<?php echo base_url(); ?>assets/img/site/new-collection-2.jpg"
                                                                                 class="img-responsive" alt="img"></a>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6"><a href="<?php echo base_url(); ?>category"><img src="<?php echo base_url(); ?>assets/img/site/new-collection-3.jpg"
                                                                                 class="img-responsive" alt="img"></a>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6"><a href="<?php echo base_url(); ?>category"><img src="<?php echo base_url(); ?>assets/img/site/new-collection-4.jpg"
                                                                                 class="img-responsive" alt="img"></a>
            </div>
        </div>
        <!--/.row-->
    </div>
    <!--/.section-block-->

    <div class="width100 section-block">
        <h3 class="section-title"><span> BRAND</span> <a id="nextBrand" class="link pull-right carousel-nav"> <i
                class="fa fa-angle-right"></i></a> <a id="prevBrand" class="link pull-right carousel-nav"> <i
                class="fa fa-angle-left"></i> </a></h3>

        <div class="row">
            <div class="col-lg-12">
                <ul class="no-margin brand-carousel owl-carousel owl-theme">
                    <li><a><img src="<?php echo base_url(); ?>assets/img/brand/1.gif" alt="img"></a></li>
                    <li><img src="<?php echo base_url(); ?>assets/img/brand/2.png" alt="img"></li>
                    <li><img src="<?php echo base_url(); ?>assets/img/brand/3.png" alt="img"></li>
                    <li><img src="<?php echo base_url(); ?>assets/img/brand/4.png" alt="img"></li>
                    <li><img src="<?php echo base_url(); ?>assets/img/brand/5.png" alt="img"></li>
                    <li><img src="<?php echo base_url(); ?>assets/img/brand/6.png" alt="img"></li>
                    <li><img src="<?php echo base_url(); ?>assets/img/brand/7.png" alt="img"></li>
                    <li><img src="<?php echo base_url(); ?>assets/img/brand/8.png" alt="img"></li>
                    <li><img src="<?php echo base_url(); ?>assets/img/brand/1.gif" alt="img"></li>
                    <li><img src="<?php echo base_url(); ?>assets/img/brand/2.png" alt="img"></li>
                    <li><img src="<?php echo base_url(); ?>assets/img/brand/3.png" alt="img"></li>
                    <li><img src="<?php echo base_url(); ?>assets/img/brand/4.png" alt="img"></li>
                    <li><img src="<?php echo base_url(); ?>assets/img/brand/5.png" alt="img"></li>
                    <li><img src="<?php echo base_url(); ?>assets/img/brand/6.png" alt="img"></li>
                    <li><img src="<?php echo base_url(); ?>assets/img/brand/7.png" alt="img"></li>
                    <li><img src="<?php echo base_url(); ?>assets/img/brand/8.png" alt="img"></li>
                </ul>
            </div>
        </div>
        <!--/.row-->
    </div>
    <!--/.section-block-->

</div>
<!--main-container-->

<div class="parallax-section parallax-image-2">
    <div class="w100 parallax-section-overley">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="parallax-content clearfix">
                        <h1 class="xlarge"> Trusted Seller 500+ </h1>
                        <h5 class="parallaxSubtitle"> Lorem ipsum dolor sit amet consectetuer </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/.parallax-section-->

<!-- Product Details Modal  -->
<!-- Modal -->
<div class="modal fade" id="productSetailsModalAjax" tabindex="-1" role="dialog"
     aria-labelledby="productSetailsModalAjaxLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" id="model_content_section">
           
        </div> <!-- /.modal-content -->
    </div> <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- End Modal -->
<?php include "templates/footer.php"; ?>
<?php } ?>
