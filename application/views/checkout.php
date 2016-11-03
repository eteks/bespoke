<?php if(!$this->input->is_ajax_request()){ ?>
<?php include "templates/header.php"; ?>
<div class="container main-container headerOffset">
    <div class="row">
        <div class="breadcrumbDiv col-lg-12">
            <ul class="breadcrumb">
                <li><a href="<?php echo base_url(); ?>">Home</a></li>
                <li><a href="<?php echo base_url(); ?>cart">Cart</a></li>
                <li class="active"> Checkout</li>
            </ul>
        </div>
    </div> <!--/.row-->
    <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-7 col-xs-6 col-xxs-12 text-center-xs">
            <h1 class="section-title-inner">
            	<span>
            		<i class="glyphicon glyphicon-shopping-cart"></i> Checkout
            	</span>
            </h1>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-5 rightSidebar col-xs-6 col-xxs-12 text-center-xs">
            <h4 class="caps">
            	<a href="<?php echo base_url(); ?>">
            		<i class="fa fa-chevron-left"></i> Back to shopping 
            	</a>
            </h4>
        </div>
    </div> <!--/.row-->

    <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-12">
            <div class="row userInfo">
                <div class="col-xs-12 col-sm-12">
                    <div class="w100 clearfix">
                        <ul class="orderStep orderStepLook2">
                            <li class="active address_label">
                            	<a href="#"> 
                            		<i class="fa fa-map-marker "></i> 
                            		<span> address</span>
                            	</a>
                            </li>
                            <li class="disabled order_label">
                            	<a href="#"> 
                            		<i class="fa fa-check-square  "></i>
                                	<span> order review </span>
                                </a>
                            </li>
                        </ul> <!--/.orderStep end-->
                    </div>
                   <div id="checkout_section">
                        <div id="checkout_address">
                        <?php
                        if(!empty($this->session->userdata("login_status"))): 
                        ?>
                        <p> 
                        	<input type="checkbox" id="checkout_profile_details"> Use my profile details 
                        </p>
                        <?php
                        endif;
                        ?>
                        <?php } ?>
	                    	<div class="checkout_content">
	                    	<p class="error_msg">  </p>
	                    	<div class="w100 clearfix">
	                        <div class="row userInfo">
	                            <div class="col-lg-12">
	                                <h2 class="block-title-2"> To add a new address, please fill out the form below. </h2>
	                            </div>
	                            <form method="POST" id="checkout_form" action="#" >
	                                <div class="col-xs-12 col-sm-6">
	                                    <div class="form-group required">
	                                        <label for="InputName">First Name <sup>*</sup> </label>
	                                        <input required type="text" class="form-control" id="InputName" placeholder="First Name" maxlength="20" value="<?php if(!empty($profile_details['user_first_name'])) : echo $profile_details['user_first_name']; endif;?>">
	                                    </div>
	                                    <div class="form-group required">
	                                        <label for="InputLastName">Last Name <sup>*</sup> </label>
	                                        <input for="InputLastName" class="form-control" id="InputLastName" placeholder="Last Name" maxlength="20" value="<?php if(!empty($profile_details['user_last_name'])) : echo $profile_details['user_last_name']; endif;?>">
	                                    </div>
	                                    <div class="form-group required">
	                                        <label for="InputAddress"> Address (Line 1) <sup>*</sup> </label>
	                                        <input required type="text" class="form-control" id="InputAddress" placeholder="Address" maxlength="20" value="<?php if(!empty($profile_details['user_default_address1'])) : echo $profile_details['user_default_address1']; endif;?>">
	                                    </div>
	                                    <div class="form-group">
	                                        <label for="InputAddress2">Address (Line 2) </label>
	                                        <input type="text" class="form-control" id="InputAddress2" placeholder="Address" maxlength="30" value="<?php if(!empty($profile_details['user_default_address2'])) : echo $profile_details['user_default_address2']; endif;?>">
	                                    </div>	                                    
	                                    <div class="form-group required">
	                                        <label for="InputState">State <sup>*</sup> </label>
	                                        <select class="form-control che_state" required aria-required="true" id="InputState" name="InputState">
	                                           	<option value=""> Please select state </option>
                                                <?php 
                                                if(!empty($state)) : 
                                                foreach($state as $state_row): 
                                                if(!empty($profile_details)) { 
                                                    if($state_row['state_id'] == $profile_details['user_state_id']) {
                                                ?>  
                                                        <option selected value="<?php echo $state_row['state_id']; ?>"> <?php echo $state_row['state_name']; ?> </option>
                                                <?php
                                                        }
                                                    else 
                                                        {
                                                ?>
                                                        <option value="<?php echo $state_row['state_id']; ?>"> <?php echo $state_row['state_name']; ?> </option>
                                                <?php
                                                        }
                                                    }
                                                else 
                                                    {
                                                ?>
                                                    <option value="<?php echo $state_row['state_id']; ?>"> <?php echo $state_row['state_name']; ?> </option>
                                                <?php 
                                                    }
                                                endforeach; 
                                                endif;
                                                ?> 
											</select>
	                                    </div>
	                                </div>
	                                <div class="col-xs-12 col-sm-6">
	                                	<div class="form-group required">
	                                        <label for="InputCity">City <sup>*</sup> </label>
	                                        <select class="form-control che_city" required aria-required="true" id="InputCity" name="InputCity">
	                                        	<option value=""> Please select city </option>
	                                            <?php 
                                                if(!empty($profile_get_city) && !empty($profile_details)) : 
                                                foreach($profile_get_city as $city_row): 
                                                if($city_row['city_id'] == $profile_details['user_city_id']) {
                                                ?>  
                                                <option selected value="<?php echo $city_row['city_id']; ?>"> <?php echo $city_row['city_name']; ?> </option>
                                                <?php
                                                }
                                                else {
                                                ?>
                                                <option value="<?php echo $city_row['city_id']; ?>"> <?php echo $city_row['city_name']; ?> </option>
                                                <?php
                                                }
                                                endforeach; 
                                                endif;
                                                ?>	
	                                        </select>
	                                    </div>                               
	                                    <div class="form-group required">
	                                        <label for="InputArea">Area <sup>*</sup> </label>
	                                        <select class="form-control che_area" required aria-required="true" id="InputArea" name="InputArea">
	                                        <option value=""> Please select area </option>
                                    	      	<?php 
                                                if(!empty($profile_get_area) && !empty($profile_details)) : 
                                                foreach($profile_get_area as $area_row): 
                                                	if($area_row['area_id'] == $profile_details['user_area_id']) :
                                                ?>  
                                                		<option selected value="<?php echo $area_row['area_id']; ?>"> <?php echo $area_row['area_name']; ?> </option>
                                                <?php
                                                    else :
                                                ?>
                                                    	<option value="<?php echo $area_row['area_id']; ?>"> <?php echo $area_row['area_name']; ?> </option>
                                                <?php
                                                	endif;
                                                endforeach; 
                                                endif;
                                                ?>                                        
	                                        </select>
	                                    </div>
	                                    <div class="form-group required">
	                                        <label for="InputZip">Zip / Postal Code <sup>*</sup> </label>
	                                        <input required type="text" class="form-control" id="InputZip"
	                                               placeholder="Zip / Postal Code" maxlength="6" value="<?php if(!empty($profile_details['user_zip'])) : echo $profile_details['user_zip']; endif;?>">
	                                    </div>
	                                    <div class="form-group required">
	                                        <label for="InputMobile">Mobile phone <sup>*</sup></label>
	                                        <input required type="tel" name="InputMobile" class="form-control" id="InputMobile" maxlength="10" value="<?php if(!empty($profile_details['user_mobile'])) : echo $profile_details['user_mobile']; endif;?>">
	                                    </div>
	                                    <div class="form-group">
	                                        <label for="InputEmail"> Email </label>
	                                        <input type="text" class="form-control" id="InputEmail" placeholder="Email" value="<?php if(!empty($profile_details['user_email'])) : echo $profile_details['user_email']; endif;?>">
	                                    </div>
	                                </div>
	                        </div> <!--/row end-->
	                        <input type="hidden" value="<?php if(!empty($shipping_amount)) : echo $shipping_amount['area_delivery_charge']; endif;?>" class="shipping_checkout_area" />
	                    </div>
	                    <div class="cartFooter w100">
                        <div class="box-footer">
                            <div class="pull-left">
                            	<a class="btn btn-default" href="index.php"> 
                            		<i class="fa fa-arrow-left"></i> &nbsp; Back to Shop 
                            	</a>
                            </div>
                            <div id="checkout_address_submit" class="pull-right">
                            	<a class="btn btn-primary btn-small"> Continue &nbsp; 
                            		<i class="fa fa-arrow-circle-right"></i> 
                            	</a>
                            </div>
                        </div>
                    </div> <!--/ cartFooter -->
                    </div> <!--/ checkout_content -->
                    <?php if(!$this->input->is_ajax_request()){ ?>
	                </div> <!--End of checkout address-->
	                <div id="checkout_order">
	                	<p class="error_msg">  </p>
                       <div class="w100 clearfix">
                        <div class="row userInfo">
                            <div class="col-lg-12">
                                <h2 class="block-title-2"> Review Order </h2>
                            </div>
                            <div class="col-xs-12 col-sm-12">
                            	<p class="oreder_status_error"> </p>
                                <div class="cartContent w100 checkoutReview ">
                                    <table class="cartTable table-responsive" style="width:100%">
                                        <tbody>
                                        <tr class="CartProduct cartTableHeader">
                                            <th style="width:15%"> Product</th>
                                            <th class="checkoutReviewTdDetails">Details</th>
                                            <th style="width:10%">Unit Price</th>
                                            <th class="hidden-xs" style="width:5%">QNT</th>
                                            <th class="hidden-xs" style="width:10%">Discount</th>
                                            <th style="width:15%">Total</th>
                                        </tr>
                                        <?php
		                                $total = 0;
		                                if(!empty($product_details)) :
		                                foreach ($product_details as $pro_val) :
		                                ?>
                                        <tr class="CartProduct amount_structure">
                                            <td class="CartProductThumb">
                                                <div>
                                                	<a>
                                                		<img src="<?php echo base_url().$pro_val['product_upload_image']; ?>" alt="img" />
                                            		</a>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="CartDescription">
                                                    <h4>
	                                                    <?php echo $pro_val['product_title']; ?>
                                                    </h4>
                                                </div>
                                            </td>
                                            <td class="delete">
                                                <div class="price">
                                                	&#8377; <span class="orderitem_price"> <?php echo number_format($pro_val['orderitem_price'],2); ?>

                                            	</div>
                                            </td>
                                            <td class="hidden-xs"> 
                                            	<span class="quantity"> <?php echo $pro_val['orderitem_quantity']; ?> </span>
                                        	</td>

                                            <td class="hidden-xs"> &#8377; 0.00 </td>
                                            <td class="price"> 
                                            	<?php 
		                                        $product_total = number_format($pro_val['orderitem_quantity']*$pro_val['orderitem_price'],2); 
		                                        ?>
                                        		&#8377; <span class="product_total"> <?php echo $product_total; ?>  </span>
                                        		<input type="hidden" class="basket_product_items" value="<?php echo $pro_val['product_id']; ?>" />
                                        	</td>
                                        	<input type="hidden" class="delete_item_cart_list" data-pro_id="<?php echo $pro_val['product_id']; ?>" data-grp_id="<?php echo $pro_val['orderitem_product_attribute_group_id']; ?>" value="<?php echo $pro_val['orderitem_quantity']; ?>" /> 
                                        </tr>
                                        <?php 
                                    	$total +=  $pro_val['orderitem_quantity']*$pro_val['orderitem_price'];
                                		?> 
              							<?php
		                                endforeach;
		                                ?>
		                                <input type="hidden" name="udf1" class="order_session_id_checkout"  value="<?php if(empty($orderitem_session_id_checkout)) : echo $orderitem_session_id_checkout; endif; ?>">
                                        <input type="hidden" name="amount" class="total_amount_hidden" id="total_amount_hidden" value="">
                                        <?php
		                                endif;
		                                ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!--cartContent-->
                               <div class="w100 costDetails">
                                    <div class="table-block" id="order-detail-content">
                                        <table class="std table" id="cart-summary">
                                            <tr>
                                                <td> Total products </td>
                                                <td class="price">
                                                	<span class="product_overall_total" data-value="<?php echo $total; ?>">  
                                                		<?php echo number_format(ceil($total),2); ?> 
                                                	</span>
                                                    	<input type="hidden" value="<?php echo number_format($total,2); ?>" class="overall_total_product_amount">
                                                </td>
                                            </tr>
                                            <tr style="">
                                                <td>Shipping</td>
                                                <td class="price">
                                                	<span class="ordinary_shipping_amount">
	                                                	<?php 
	                                                    $shipping_amount = 0.00 ;
	                                                    echo number_format($shipping_amount,2);
	                                                	?>
                                            		</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td> Total tax</td>
                                                <td id="total-tax" class="price"> &#8377; 0.00 </td>
                                            </tr>
                                            <tr>
                                                <td> Total</td>
                                                <td id="total-price" class="price"> 
                                                	&#8377; 
                                            		<span class="product_final_amount"> 
                                                		<?php echo number_format(ceil($shipping_amount+$total),2); ?> 
                                            		</span>
                                            	</td>
                                            </tr>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!--/costDetails-->
                                <!--/row-->
                            </div>
                        </div>
                    </div>
                    <!--/row end-->
                    <div class="cartFooter w100">
                        <div class="box-footer">
                            <div class="pull-left"><a id="checkout_order_submit" class="btn btn-default">
                                <i class="fa fa-arrow-left"></i> &nbsp; Back to Address </a>
                            </div>
                            <div class="pull-right">
                                <button class="btn btn-primary btn-small" type="submit">
                                    Confirm Order &nbsp; <i class="fa fa-check"></i>
                                </button>
                            </div>
                          </form>
                        </div>
                    </div>
                    <!--/ cartFooter -->
                 </div><!-- End of checkout order-->
               </div><!-- End of checkout section-->
              </div>
            </div>
            <!--/row end-->

        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 rightSidebar">
            <div class="w100 cartMiniTable">
                <table id="cart-summary" class="std table">
                    <tbody>
                    <tr>
                        <td>Total products</td>
                        <td class="price"> 
                        	&#8377; 
                        	<?php echo number_format(ceil($total),2); ?>
                             <input type="hidden" value="<?php echo number_format($total,2); ?>" class="ordinary_total_amount" />
                        </td>
                    </tr>
                    <tr style="">
                        <td>Shipping</td>
                        <td class="price">
                        	&#8377; 
                            <span class="ordinary_shipping_amount">
                                <?php 
                                $shipping_amount = 0.00 ;
                                echo number_format($shipping_amount,2); 
           		                ?>
                	        </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Total tax</td>
                        <td class="price" id="total-tax">  &#8377; 0.00 </td>
                    </tr>
                    <tr>
                        <td> Total</td>
                        <td class=" site-color" id="total-price"> 
                        	&#8377; 
                            <span class="product_final_amount"> 
                            	<?php echo number_format(ceil($shipping_amount+$total),2); ?> 
                            </span>
                        </td>
                    </tr>
                    </tbody>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <!--  /cartMiniTable-->

        </div>
        <!--/rightSidebar-->

    </div>
    <!--/row-->

    <div style="clear:both"></div>
</div>
<!-- /.main-container-->
<div class="gap"></div>

<?php include "templates/footer.php"; ?>
 <?php } ?>