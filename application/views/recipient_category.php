<?php include "templates/header.php"; ?>

<?php
if(!empty($recipient_slider)) :
?>
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
            <div class="slider slider-v1" data-cycle-swipe=true data-cycle-prev=".prevControl" data-cycle-next=".nextControl" data-cycle-loader="wait">
                <?php
                foreach ($recipient_slider as $slider_img) :
                ?>
                <div class="slider-item slider-item-img1">
                    <img src="<?php echo base_url().$slider_img['slider_upload_image']; ?>" class="img-responsive parallaximg sliderImg" alt="img">
                </div>
                <?php
                endforeach;
                ?>
            </div> <!--/.slider slider-v1-->
        </div> <!--/.slider-content-->
    </div> <!--/.full-container-->
</div> <!--/.banner style1-->
<?php
endif;
?>
<div class="container main-container">
    <div class="morePost row featuredPostContainer style2 globalPaddingTop ">
        <h3 class="section-title style2 text-center recipient_title">
            <span>Categories for name</span>
        </h3>
        <div class="container">
            <div class="row xsResponse">
                <?php
                if(!empty($recipient_category)) :
                foreach ($recipient_category as $rec_cat) :
                ?>
                <div class="item recipient_product col-lg-3 col-md-3 col-sm-4 col-xs-6">
                    <div class="product">
                        <a class="add-fav tooltipHere" data-toggle="tooltip" data-original-title="Add to Wishlist" data-placement="left">
                            <i class="glyphicon glyphicon-heart"></i>
                        </a>
                        <div class="image product_images">
                            <a href="<?php echo base_url(); ?>products_view/?rec=<?php echo $rec_cat['recipient_id']; ?>&cat=<?php echo $rec_cat['category_id']; ?>">
                                <img src="<?php echo base_url().$rec_cat['category_image']; ?>" alt="img" class="img-responsive images_alignment">
                            </a>
                            <div class="product_name">
                                <a href="<?php echo base_url(); ?>products_view/?rec=<?php echo $rec_cat['recipient_id']; ?>&cat=<?php echo $rec_cat['category_id']; ?>">
                                    <span> 
                                        <?php echo $rec_cat['category_name']; ?> 
                                    </span>
                                </a>
                            </div>
                        </div>
                        <div class="description description_height">
                            <h4>
                                <a href="<?php echo base_url(); ?>products_view/?rec=<?php echo $rec_cat['recipient_id']; ?>&cat=<?php echo $rec_cat['category_id']; ?>">       
                                    <?php echo $rec_cat['category_name']; ?> 
                                </a>
                            </h4>
                        </div>
                     </div>
                </div> <!--/.item-->
                <?php
                endforeach;
                endif;
                ?>
            </div> <!-- /.row -->
        </div> <!--/.container-->
    </div> <!--/.featuredPostContainer-->
</div> <!--main-container-->

<?php include "templates/footer.php"; ?>
