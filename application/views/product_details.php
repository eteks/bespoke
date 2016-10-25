<?php include "templates/header.php"; ?>
<div class="container main-container headerOffset">
    <div class="row">
        <div class="breadcrumbDiv col-lg-12">
            <ul class="breadcrumb">
                <li><a href="<?php echo base_url(); ?>">Home</a></li>
                <?php
                if(!empty($product_details)) :
                ?>
                <li>
                    <a href="<?php echo base_url(); ?>recipients_view/<?php echo $product_details['recipient_id']; ?>"><?php echo $product_details['recipient_type']; ?>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>products_view/?rec=<?php echo $product_details['recipient_id']; ?>&cat=<?php echo $product_details['category_id']; ?>">
                        <?php echo $product_details['category_name']; ?>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>products_view/?rec=<?php echo $product_details['recipient_id']; ?>&cat=<?php echo $product_details['category_id']; ?>&sub=<?php echo $product_details['subcategory_id']; ?>">
                        <?php echo $product_details['subcategory_name']; ?>
                    </a>
                </li>
                <li class="active">
                    <?php echo $product_details['product_title']; ?>
                </li>
                <?php
                endif;
                ?>
                <?php
                if($this->uri->segment(2)) :
                ?>
                <input type="hidden" value="<?php echo $this->uri->segment(2); ?>" class="product_id_detail" />
                <?php
                endif;
                ?>
            </ul>
        </div>
    </div>
    <div class="row transitionfx">
        <!-- left column -->
        <div class="col-lg-6 col-md-6 col-sm-6">
            <!-- product Image and Zoom -->
            <div class="main-image sp-wrap col-lg-12 no-padding">
                <?php
                if(!empty($product_gallery)) :
                foreach ($product_gallery as $pro_gall) :
                ?>
                <a href="#">
                    <img src="<?php echo base_url().$pro_gall['product_upload_image']; ?>" class="img-responsive" alt="img">
                </a>
                <?php
                endforeach;
                endif;
                ?>
            </div>
        </div>
        <!--/ left column end -->

        <!-- right column -->
        <div class="col-lg-6 col-md-6 col-sm-5">
            <?php
            if(!empty($product_details)) :
            ?>
            <h1 class="product-title"> <?php echo $product_details['product_title']; ?> </h1>
            <div class="rating">
                <p>
                    <span>
                        <i class="fa fa-star"></i>
                    </span> 
                    <span>
                        <i class="fa fa-star"></i>
                    </span> 
                    <span>
                        <i class="fa fa-star"></i>
                    </span> 
                    <span>
                        <i class="fa fa-star"></i>
                    </span> 
                    <span>
                        <i class="fa fa-star-o "></i>
                    </span> 
                    <span class="ratingInfo"> 
                        <span> / </span> 
                        <a data-target="#modal-review" data-toggle="modal"> Write a review </a> 
                    </span>
                </p>
            </div>
            <div class="product-price">
                &#8377; <span class="price-sales prodcut_details_price"> <?php echo $product_details['product_price']; ?> </span>
            </div>
            <div class="details-description">
                <p> <?php echo $product_details['product_description']; ?> </p>
            </div>
            <?php
            endif;
            ?>
            
            <?php
            if(!empty($product_attributes)) :
            foreach ($product_attributes as $attr_key => $pro_attr) :
            if($pro_attr['product_attribute'] == 'color') {
            ?>
            <div class="color-details">
                <span class="selected-color">
                    <strong>  <?php echo $pro_attr['product_attribute']; ?>  </strong>
                </span>
                <ul class="swatches Color">
                    <?php
                    foreach ($pro_attr['product_attribute_value_id'] as $val_key => $val_data) :
                    ?>
                    <li class="color_panel_details">
                        <a class="product_details_color_list" style="background-color:<?php echo $val_data; ?>" data-attr_id="<?php echo $attr_key; ?>" data-val_id="<?php echo $val_key; ?>"> </a>
                    </li>
                    <?php
                    endforeach;
                    ?>
                </ul>
            </div>
            <input type="hidden" class="color_panel product_details_attributes hidden_color_panel" id="hidden_color_panel" value=""/>
            <?php
            }
            endforeach;
            endif;
            ?>
            <div class="productFilter productFilterLook2">
                <div class="row"> 
                    <div class="col-lg-6 col-sm-6 col-xs-6 attribute_section_list">
                        <div class="filterBox">
                            <label> Quantity </label>
                            <select class="form-control" id="quantity_product_details">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                            </select>
                        </div>
                    </div>
                    <?php
                    if(!empty($product_attributes)) :
                    foreach ($product_attributes as $attr_key => $pro_attr) :
                    if($pro_attr['product_attribute'] != 'color') {
                    ?>
                    <div class="col-lg-6 col-sm-6 col-xs-6 attribute_section_list">
                        <div class="filterBox">
                            <label><?php echo $pro_attr['product_attribute']; ?></label>
                            <select class="form-control product_details_attributes_select product_details_attributes" data-attr_id="<?php echo $attr_key; ?>">
                                <?php
                                    foreach ($pro_attr['product_attribute_value_id'] as $val_key => $val_data) :
                                ?>
                                <option value="<?php echo $val_key; ?>"><?php echo $val_data; ?></option>
                                <?php
                                endforeach;
                                ?>   
                            </select>
                        </div>
                    </div>
                    <?php
                    }
                    endforeach;
                    endif;
                    ?>
                    <?php
                    if(!empty($default_group)) :    
                    ?>
                    <input type="hidden" value="<?php echo $default_group['product_attribute_group_id']; ?>" class="ordinary_product_arrtibute_group" />
                    <input type="hidden" value="<?php echo $default_group['product_attribute_group_id']; ?>" class="update_product_arrtibute_group" />
                    <input type="hidden" class="attribute_combination" value="<?php echo $default_group['product_attribute_value_combination_id']; ?>"/>
                    <?php
                    endif;
                    ?>
                </div>
            </div>
            <!-- productFilter -->
            <div class="cart-actions">
                <p class="add_to_cart_status"> </p>
                <div class="addto row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <input type="hidden" class="add_to_cart_button_cond" value="true" />
                        <button onclick="productAddToCartForm.submit(this);" class="button btn-block btn-cart cart first add_to_cart_button add_to_cart_option" data-check="true" title="Add to Cart" type="button"> Add to Cart
                        </button>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <!-- <a class="link-wishlist wishlist btn-block "> 
                            Add to Wishlist
                        </a> -->
                    </div>
                </div>
                <div style="clear:both"></div>
                <h3 class="incaps in_stock">
                    <i class="fa fa fa-check-circle-o color-in" title="Stack Available"></i> In stock
                </h3>
                <h3 style="display:none" class="incaps out_stock" title="Stock Not Available">
                    <i class="fa fa-minus-circle color-out"></i> Out of stock
                </h3>
                <h3 class="incaps">
                    <i class="glyphicon glyphicon-lock"></i> Secure online ordering
                </h3>
            </div> <!--/.cart-actions-->
            <div class="clear"></div>
            <div class="product-tab w100 clearfix">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#details" data-toggle="tab">Details</a></li>
                    <!-- <li><a href="#size" data-toggle="tab">Size</a></li> -->
                    <!-- <li><a href="#shipping" data-toggle="tab">Shipping</a></li> -->
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="details">
                        <?php
                        if(!empty($product_details)) :
                        echo $product_details['product_description'];
                        endif;
                        ?>
                    </div>
                    <div class="tab-pane" id="size"> 
                        16" waist<br>
                        34" inseam<br>
                        10.5" front rise<br>
                        8.5" knee<br>
                        7.5" leg opening<br>
                        <br>
                        Measurements taken from size 30<br>
                        Model wears size 31. Model is 6'2 <br>
                        <br>
                    </div>
                    <div class="tab-pane" id="shipping">
                        <table>
                            <colgroup>
                                <col style="width:33%">
                                <col style="width:33%">
                                <col style="width:33%">
                            </colgroup>
                            <tbody>
                                <tr>
                                    <td>Standard</td>
                                    <td>1-5 business days</td>
                                    <td>$7.95</td>
                                </tr>
                                <tr>
                                    <td>Two Day</td>
                                    <td>2 business days</td>
                                    <td>$15</td>
                                </tr>
                                <tr>
                                    <td>Next Day</td>
                                    <td>1 business day</td>
                                    <td>$30</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3">* Free on orders of $50 or more</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div> <!-- /.tab content -->
            </div> <!--/.product-tab-->
            <div style="clear:both"></div>
                <div class="product-share clearfix">
                    <p> SHARE </p>
                    <div class="socialIcon">
                        <span class='st_facebook_large' displayText='Facebook'></span>
                        <span class='st_googleplus_large' displayText='Google +'></span>
                    </div>
                </div> <!--/.product-share-->
            </div> <!--/ right column end -->
        </div> <!--/.row-->
        <div class="row recommended">
            <?php
            if(!empty($recommanded_products)) :
            ?>
            <h1> YOU MAY ALSO LIKE </h1>
            <div id="SimilarProductSlider">
                <?php
                foreach($recommanded_products as $rec_data) :
                ?>
                <div class="item">
                    <div class="product">
                        <div class="liked_product">
                            <a class="product-image" href="<?php echo base_url(); ?>product_details/<?php echo $rec_data['product_id']; ?>"> 
                                <img src="<?php echo base_url().$rec_data['product_upload_image'] ?>" alt="img" class="liked_product_images"> 
                            </a>
                            <div class="detail_product_name"><a href="<?php echo base_url(); ?>product_details/<?php echo $rec_data['product_id']; ?>"><span><?php echo $rec_data['product_title']; ?> </span></a></div>
                        </div>
                        <div class="description">
                            <h4>
                                <a href="san-remo-spaghetti" href="<?php echo base_url(); ?>product_details/<?php echo $rec_data['product_id']; ?>"> 
                                    <?php echo $rec_data['product_title']; ?> 
                                </a>
                            </h4>
                            <div class="price">
                                <span> <?php echo $rec_data['product_price']; ?> </span>
                            </div>
                        </div>
                    </div>
                </div> <!--/.item-->
                <?php
                endforeach;
                endif;
                ?>
            </div> <!--/.recommended-->
        </div>
        <div style="clear:both"></div>
    </div> <!-- /main-container -->
    <div class="gap"></div>
<?php include "templates/footer.php"; ?>