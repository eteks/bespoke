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
                    <img src="<?php echo base_url(); ?>assets/img/slider/slider1.jpg" class="img-responsive parallaximg sliderImg" alt="img">
                </div> <!--/.slider-item-->
                <div class="slider-item slider-item-img2 ">
                    <img src="<?php echo base_url(); ?>assets/img/slider/slider3.jpg" class="img-responsive parallaximg sliderImg" alt="img">
                </div> <!--/.slider-item-->
            </div> <!--/.slider slider-v1-->
        </div> <!--/.slider-content-->
    </div> <!--/.full-container-->
</div> <!--/.banner style1-->

    <!-- ************  New Arrivals Start  ***************  -->
<div class="container main-container">
        <!-- Main component call to action -->
        

    <!-- Demo Features Content end -->

    <!-- Main component call to action -->

    <!-- ************  Featured products Start  ***************  -->

    <div class="morePost row featuredPostContainer style2 globalPaddingTop ">
        <h3 class="section-title style2 text-center recipient_title"><span>Categories for name</span></h3>

        <div class="container">
            <div class="row xsResponse">
                <div class="item recipient_product col-lg-3 col-md-3 col-sm-4 col-xs-6">
                    <div class="product">
                        <a class="add-fav tooltipHere" data-toggle="tooltip" data-original-title="Add to Wishlist"
                           data-placement="left">
                            <i class="glyphicon glyphicon-heart"></i>
                        </a>

                        <div class="image product_images">
                            <a href="<?php echo base_url(); ?>product_details"><img src="<?php echo base_url(); ?>assets/img/product/30.jpg" alt="img"
                                                                class="img-responsive images_alignment"></a>
                             <div class="product_name"><a><span>Product Name</span></a></div>
                            <!-- <div class="promotion"><span class="new-product"> NEW</span> <span
                                    class="discount">15% OFF</span></div> -->
                        </div>
                        <div class="description description_height">
                            <h4><a href="<?php echo base_url(); ?>product_details">aliquam erat volutpat</a></h4>
                       </div>
                    </div>
                </div>
                <!--/.item-->
                <div class="item recipient_product col-lg-3 col-md-3 col-sm-4 col-xs-6">
                    <div class="product">
                        <a class="add-fav tooltipHere" data-toggle="tooltip" data-original-title="Add to Wishlist"
                           data-placement="left">
                            <i class="glyphicon glyphicon-heart"></i>
                        </a>

                        <div class="image product_images">
                            <a href="<?php echo base_url(); ?>product_details"><img src="<?php echo base_url(); ?>assets/img/product/31.jpg" alt="img"
                                                                class="img-responsive images_alignment"></a>
 							<div class="product_name"><a><span>Product Name</span></a></div>
                            <!-- <div class="promotion"><span class="discount">15% OFF</span></div> -->
                        </div>
                        <div class="description description_height">
                            <h4><a href="<?php echo base_url(); ?>product_details">ullamcorper suscipit lobortis </a></h4>
                       </div>
                    </div>
                </div>
                <!--/.item-->
                <div class="item recipient_product col-lg-3 col-md-3 col-sm-4 col-xs-6">
                    <div class="product">
                        <a class="add-fav tooltipHere" data-toggle="tooltip" data-original-title="Add to Wishlist"
                           data-placement="left">
                            <i class="glyphicon glyphicon-heart"></i>
                        </a>
                        <div class="image product_images">
                            <a href="<?php echo base_url(); ?>product_details"><img src="<?php echo base_url(); ?>assets/img/product/34.jpg" alt="img"
                                                                class="img-responsive images_alignment"></a>
							<div class="product_name"><a><span>Product Name</span></a></div>
                            <!-- <div class="promotion"><span class="new-product"> NEW</span></div> -->
                        </div>
                        <div class="description description_height">
                            <h4><a href="<?php echo base_url(); ?>product_details">demonstraverunt lectores </a></h4>
                        </div>
                    </div>
                </div>
                <!--/.item-->
                <div class="item recipient_product col-lg-3 col-md-3 col-sm-4 col-xs-6">
                    <div class="product">
                        <a class="add-fav tooltipHere" data-toggle="tooltip" data-original-title="Add to Wishlist"
                           data-placement="left">
                            <i class="glyphicon glyphicon-heart"></i>
                        </a>
                        <div class="image product_images">
                            <a href="<?php echo base_url(); ?>product_details"><img src="<?php echo base_url(); ?>assets/img/product/12.jpg" alt="img" class="img-responsive images_alignment"></a>
                            <div class="product_name"><a><span>Product Name</span></a></div>
                        </div>
                        <div class="description description_height">
                            <h4><a href="<?php echo base_url(); ?>product_details">humanitatis per</a></h4>
                        </div>
                    </div>
                </div>
                <!--/.item-->
                <div class="item recipient_product col-lg-3 col-md-3 col-sm-4 col-xs-6">
                    <div class="product">
                        <a class="add-fav tooltipHere" data-toggle="tooltip" data-original-title="Add to Wishlist"
                           data-placement="left">
                            <i class="glyphicon glyphicon-heart"></i>
                        </a>
                        <div class="image product_images">
                            <a href="<?php echo base_url(); ?>product_details"><img src="<?php echo base_url(); ?>assets/img/product/33.jpg" alt="img" class="img-responsive images_alignment"></a>
                            <div class="product_name"><a><span>Product Name</span></a></div>
                        </div>
                        <div class="description description_height">
                            <h4><a href="<?php echo base_url(); ?>product_details">Eodem modo typi</a></h4>
                       </div>
                    </div>
                </div>
                <!--/.item-->
                <div class="item recipient_product col-lg-3 col-md-3 col-sm-4 col-xs-6">
                    <div class="product">
                        <a class="add-fav tooltipHere" data-toggle="tooltip" data-original-title="Add to Wishlist"
                           data-placement="left">
                            <i class="glyphicon glyphicon-heart"></i>
                        </a>

                        <div class="image product_images">
                            <a href="<?php echo base_url(); ?>product_details"><img src="<?php echo base_url(); ?>assets/img/product/10.jpg" alt="img" class="img-responsive images_alignment"></a>
                            <div class="product_name"><a><span>Product Name</span></a></div>
                         </div>
                        <div class="description description_height">
                            <h4><a href="<?php echo base_url(); ?>product_details">sequitur mutationem </a></h4>
                        </div>
                    </div>
                </div>
                <!--/.item-->
                <div class="item recipient_product col-lg-3 col-md-3 col-sm-4 col-xs-6">
                    <div class="product">
                        <a class="add-fav tooltipHere" data-toggle="tooltip" data-original-title="Add to Wishlist"
                           data-placement="left">
                            <i class="glyphicon glyphicon-heart"></i>
                        </a>

                        <div class="image product_images">
                            <a href="<?php echo base_url(); ?>product_details"><img src="<?php echo base_url(); ?>assets/img/product/37.jpg" alt="img" class="img-responsive images_alignment"></a>
                            <div class="product_name"><a><span>Product Name</span></a></div>
                        </div>
                        <div class="description description_height">
                            <h4><a href="<?php echo base_url(); ?>product_details">consuetudium lectorum.</a></h4>
                       </div>
                    </div>
                </div>
                <!--/.item-->
                <div class="item recipient_product col-lg-3 col-md-3 col-sm-4 col-xs-6">
                    <div class="product">
                        <a class="add-fav tooltipHere" data-toggle="tooltip" data-original-title="Add to Wishlist"
                           data-placement="left">
                            <i class="glyphicon glyphicon-heart"></i>
                        </a>
                        <div class="image product_images">
                            <a href="<?php echo base_url(); ?>product_details"><img src="<?php echo base_url(); ?>assets/img/product/35.jpg" alt="img" class="img-responsive images_alignment"></a>
                        	<div class="product_name"><a><span>Product Name</span></a></div>
                        </div>
                        <div class="description description_height">
                            <h4><a href="<?php echo base_url(); ?>product_details">parum claram</a></h4>
                        </div>
                    </div>
                </div>
                <!--/.item-->
                <div class="item recipient_product col-lg-3 col-md-3 col-sm-4 col-xs-6">
                    <div class="product">
                        <a class="add-fav tooltipHere" data-toggle="tooltip" data-original-title="Add to Wishlist"
                           data-placement="left">
                            <i class="glyphicon glyphicon-heart"></i>
                        </a>

                        <div class="image product_images">
                            <a href="<?php echo base_url(); ?>product_details"><img src="<?php echo base_url(); ?>assets/img/product/13.jpg" alt="img" class="img-responsive images_alignment"></a>
                        	<div class="product_name"><a><span>Product Name</span></a></div>
                        </div>
                        <div class="description description_height">
                            <h4><a href="<?php echo base_url(); ?>product_details">duis dolore </a></h4>
                        </div>
                    </div>
                </div>
                <!--/.item-->
                <div class="item recipient_product col-lg-3 col-md-3 col-sm-4 col-xs-6">
                    <div class="product">
                        <a class="add-fav tooltipHere" data-toggle="tooltip" data-original-title="Add to Wishlist"
                           data-placement="left">
                            <i class="glyphicon glyphicon-heart"></i>
                        </a>
                        <div class="image product_images">
                            <a href="<?php echo base_url(); ?>product_details"><img src="<?php echo base_url(); ?>assets/img/product/21.jpg" alt="img" class="img-responsive images_alignment"></a>
                            <div class="product_name"><a><span>Product Name</span></a></div>
                            <!-- <div class="promotion"><span class="new-product"> NEW</span> <span class="discount">15% OFF</span></div> -->
                        </div>
                        <div class="description description_height">
                            <h4><a href="<?php echo base_url(); ?>product_details">aliquam erat volutpat</a></h4>
						</div>
                    </div>
                </div>
                <!--/.item-->
                <div class="item recipient_product col-lg-3 col-md-3 col-sm-4 col-xs-6">
                    <div class="product">
                        <a class="add-fav tooltipHere" data-toggle="tooltip" data-original-title="Add to Wishlist" data-placement="left">
                            <i class="glyphicon glyphicon-heart"></i>
                        </a>

                        <div class="image product_images">
                            <a href="<?php echo base_url(); ?>product_details"><img src="<?php echo base_url(); ?>assets/img/product/14.jpg" alt="img" class="img-responsive images_alignment"></a>
							<div class="product_name"><a><span>Product Name</span></a></div>
                            <!-- <div class="promotion"><span class="discount">15% OFF</span></div> -->
                        </div>
                        <div class="description description_height">
                            <h4><a href="<?php echo base_url(); ?>product_details">ullamcorper suscipit lobortis </a></h4>
                       </div>
                    </div>
                </div>
                <!--/.item-->
                <div class="item recipient_product col-lg-3 col-md-3 col-sm-4 col-xs-6">
                    <div class="product">
                        <a class="add-fav tooltipHere" data-toggle="tooltip" data-original-title="Add to Wishlist" data-placement="left">
                            <i class="glyphicon glyphicon-heart"></i>
                        </a>

                        <div class="image product_images">
                            <a href="<?php echo base_url(); ?>product_details"><img src="<?php echo base_url(); ?>assets/img/product/17.jpg" alt="img" class="img-responsive images_alignment"></a>
                            <div class="product_name"><a><span>Product Name</span></a></div>
                            <!-- <div class="promotion"><span class="new-product"> NEW</span></div> -->
                        </div>
                        <div class="description description_height">
                            <h4><a href="<?php echo base_url(); ?>product_details">demonstraverunt lectores </a></h4>
                        </div>
                     </div>
                </div>
                <!--/.item-->
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="load-more-block text-center"><a class="btn btn-thin" href="#"> <i
                        class="fa fa-plus-sign">+</i> load more products</a></div>
            </div>
        </div>
        <!--/.container-->
    </div> <!--/.featuredPostContainer-->

    <!-- ************  Featured products End  ***************  -->
</div>
<!--main-container-->

<!-- Product Details Modal  -->
<!-- Modal -->
<div class="modal fade" id="productSetailsModalAjax" tabindex="-1" role="dialog"
     aria-labelledby="productSetailsModalAjaxLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
          <button aria-hidden="true" data-dismiss="modal" class="close" type="button"> ×</button>
<div class="col-lg-5 col-md-5 col-sm-5  col-xs-12">

    <!-- product Image -->

    <div class="main-image  col-lg-12 no-padding style3">
        <a class="product-largeimg-link" href="<?php echo base_url(); ?>product_details"><img
                src="<?php echo base_url(); ?>assets/img/product_details/low-res-white/1.jpg" class="img-responsive product-largeimg"
                alt="img">
        </a>
    </div>
    <!--/.main-image-->

    <div class="modal-product-thumb">
        <a class="thumbLink selected"><img data-large="<?php echo base_url(); ?>assets/img/product_details/low-res-white/1.jpg" alt="img"
                                           class="img-responsive" src="<?php echo base_url(); ?>assets/img/product_details/low-res-white/1.jpg">
        </a>
        <a class="thumbLink"><img data-large="<?php echo base_url(); ?>assets/img/product_details/low-res-white/2.jpg" alt="img"
                                  class="img-responsive"
                                  src="<?php echo base_url(); ?>assets/img/product_details/low-res-white/2.jpg">
        </a>
        <a class="thumbLink"><img data-large="<?php echo base_url(); ?>assets/img/product_details/low-res-white/3.jpg" alt="img"
                                  class="img-responsive"
                                  src="<?php echo base_url(); ?>assets/img/product_details/low-res-white/3.jpg">
        </a>
    </div>
    <!--/.modal-product-thumb-->
</div>
<!--/ product Image-->


<div class="col-lg-7 col-md-7 col-sm-7 col-xs-12 modal-details no-padding">
    <div class="modal-details-inner">
        <h1 class="product-title"> Lorem ipsum dolor sit amet</h2>

            <h3 class="product-code">Product Code : DEN1098</h3>

            <div class="product-price"><span class="price-sales"> $70</span> <span
                    class="price-standard">$95</span></div>
            <div class="details-description">
                <p>In scelerisque libero ut elit porttitor commodo Suspendisse laoreet magna. </p>
            </div>
            <div class="color-details"><span class="selected-color"><strong>COLOR</strong></span>
                <ul class="swatches Color">
                    <li class="selected">
                        <a style="background-color:#f1f40e"> </a>
                    </li>
                    <li>
                        <a style="background-color:#adadad"> </a>
                    </li>
                    <li>
                        <a style="background-color:#4EC67F"> </a>
                    </li>
                </ul>
            </div>
            <!--/.color-details-->

            <div class="productFilter productFilterLook2">
                <div class="row">
                    <div class="col-lg-6 col-sm-6 col-xs-6">
                        <div class="filterBox">
                            <select class="form-control">
                                <option value="strawberries" selected>Quantity</option>
                                <option value="mango">1</option>
                                <option value="bananas">2</option>
                                <option value="watermelon">3</option>
                                <option value="grapes">4</option>
                                <option value="oranges">5</option>
                                <option value="pineapple">6</option>
                                <option value="peaches">7</option>
                                <option value="cherries">8</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-xs-6">
                        <div class="filterBox">
                            <select class="form-control">
                                <option value="strawberries" selected>Size</option>
                                <option value="mango">XL</option>
                                <option value="bananas">XXL</option>
                                <option value="watermelon">M</option>
                                <option value="apples">L</option>
                                <option value="apples">S</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <!-- productFilter -->
            <div class="cart-actions">
                <div class="addto row">
                    <div class="col-lg-6">
                        <button onclick="productAddToCartForm.submit(this);"
                                class="button btn-block btn-cart cart first" title="Add to Cart"
                                type="button">
                            Add to Cart
                        </button>
                    </div>
                    <div class="col-lg-6"><a class="link-wishlist wishlist btn-block ">Add to Wishlist</a>
                    </div>
                </div>
            </div>
            <!--/.cart-actions-->

            <div class="product-share clearfix">
                <p> SHARE </p>

                <div class="socialIcon">
                    <a href="#"> <i class="fa fa-facebook"></i>
                    </a>
                    <a href="#"> <i class="fa fa-twitter"></i>
                    </a>
                    <a href="#"> <i class="fa fa-google-plus"></i>
                    </a>
                    <a href="#"> <i class="fa fa-pinterest"></i>
                    </a>
                </div>
            </div>
            <!--/.product-share-->
    </div>
    <!--/.modal-details-inner-->
</div>
<!--/.modal-details-->
<div class="clear"></div>
         </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- End Modal -->
<?php include "templates/footer.php"; ?>
<?php } ?>
