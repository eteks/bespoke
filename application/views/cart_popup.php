<button aria-hidden="true" data-dismiss="modal" class="close" type="button"> ×</button>
<div class="col-lg-5 col-md-5 col-sm-5  col-xs-12"> <!-- product Image -->
    <div class="main-image  col-lg-12 no-padding style3">
        <?php
        if(!empty($product_gallery)) :
        ?>
        <a class="product-largeimg-link" href="#">
            <img src="<?php echo base_url().$product_gallery[0]['product_upload_image']; ?>" class="img-responsive product-largeimg" alt="img">
        </a>
        <?php
        endif;
        ?>
    </div> <!--/.main-image-->
    <div class="modal-product-thumb">
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
    </div> <!--/.modal-product-thumb-->
</div> <!--/ product Image-->
<div class="col-lg-7 col-md-7 col-sm-7 col-xs-12 modal-details no-padding">
    <div class="modal-details-inner">
        <?php
        if(!empty($product_details)) :
        ?>
        <h1 class="product-title"> <?php echo $product_details['product_title']; ?> </h1>
        <div class="product-price">
            &#8377; <span class="price-sales prodcut_details_price"> <?php echo $product_details['product_price']; ?> </span>
        </div>
        <div class="details-description">
            <p> <?php echo $product_details['product_description']; ?>
            </p>
        </div>
        <input type="hidden" value="<?php echo $product_details['product_id']; ?>" class="product_id_detail" />
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
        </div> <!-- productFilter -->
        <div class="cart-actions">
            <p><i class="fa fa-check color-in"></i><p class="add_to_cart_status"> </p></p>
            <p><i class="fa fa-times-circle color-out"></i><p class="add_to_cart_status"> </p></p>
            <div class="addto row">
                <div class="col-lg-6">
                    <input type="hidden" class="add_to_cart_button_cond" value="true" />
                    <button onclick="productAddToCartForm.submit(this);" class="button btn-block btn-cart cart first add_to_cart_button add_to_cart_option" data-check="true" title="Add to Cart" type="button"> Add to Cart
                    </button>
                </div>
                <div class="col-lg-6">
                    <!-- <a class="link-wishlist wishlist btn-block ">Add to Wishlist</a> -->
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
            </div>
        </div> <!--/.cart-actions-->
    </div> <!--/.modal-details-inner-->
</div> <!--/.modal-details-->
<div class="clear"></div>