<?php include "templates/header.php"; ?>
<div class="container main-container headerOffset">
    <div class="row">
        <div class="breadcrumbDiv col-lg-12">
            <ul class="breadcrumb">
                <li><a href="<?php echo base_url(); ?>">Home</a></li>
                <li class="active">Cart</li>
            </ul>
        </div>
    </div> <!--/.row-->
    <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-7 col-xs-6 col-xxs-12 text-center-xs">
            <h1 class="section-title-inner">
                <span>
                    <i class="glyphicon glyphicon-shopping-cart"></i> Shopping cart 
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
        <div class="col-lg-9 col-md-9 col-sm-7">
            <div class="row userInfo">
                <div class="col-xs-12 col-sm-12">
                    <div class="cartContent w100">
                    	<p><i class="fa fa-check color-in"></i> <p class="updations_status"> </p></p>
                        <p><i class="fa fa-times-circle color-out"></i> <p class="updations_status"> </p></p>
                        <table class="cartTable table-responsive" style="width:100%">
                            <tbody>
                                <tr class="CartProduct cartTableHeader">
                                    <td style="width:15%"> Product</td>
                                    <td style="width:40%">Details</td>
                                    <td style="width:10%" class="delete">&nbsp;</td>
                                    <td style="width:10%">QNT</td>
                                    <td style="width:10%">Discount</td>
                                    <td style="width:15%">Total</td>
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
                                                <img src="<?php echo base_url().$pro_val['product_upload_image']; ?>" alt="img">
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="CartDescription">
                                            <h4>
                                                <a href="<?php echo base_url(); ?>product_details/<?php echo $pro_val['product_id']; ?>">
                                                    <?php echo $pro_val['product_title']; ?>
                                                </a>
                                            </h4>
                                            <div class="price">
                                                &#8377; <span class="orderitem_price"> <?php echo number_format($pro_val['orderitem_price'],2); ?>
                                                <input type="hidden" value="<?php echo $pro_val['orderitem_price']; ?>" class="ordinary_orderitem_price" />
                                            </div>
                                        </div>
                                    </td>
                                    <td class="delete">
                                        <a class="delete_item_cart_list" data-pro_id="<?php echo $pro_val['product_id']; ?>" data-grp_id="<?php echo $pro_val['orderitem_product_attribute_group_id']; ?>"> 
                                            <i class="glyphicon glyphicon-trash fa-2x"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <input type="text" value="<?php echo $pro_val['orderitem_quantity']; ?>" class="form-control product_quantity" maxlength="3" required />
                                        <input type="hidden" data-productid="<?php echo $pro_val['product_id']; ?>" data-quantity="<?php echo $pro_val['orderitem_quantity']; ?>" class="update_basket_details" />
                                    </td>
                                    <td>  &#8377; 0.00 </td>
                                    <td class="price"> 
                                        <?php 
                                        $product_total = number_format($pro_val['orderitem_quantity']*$pro_val['orderitem_price'],2); 
                                        ?>
                                        &#8377; <span class="product_total"> <?php echo $product_total; ?>  </span>
                                        <input type="hidden" class="ordinary_product_total" value="<?php echo $product_total; ?>" />
                                        <input type="hidden" class="updated_product_total" value="<?php echo $product_total; ?>" />
                                    </td>
                                </tr>
                                <?php 
                                    $total +=  $pro_val['orderitem_quantity']*$pro_val['orderitem_price'];
                                ?> 
                                <?php
                                endforeach;
                                endif;
                                ?>
                                <input type="hidden" value="<?php echo number_format($total,2); ?>" class="overall_total_product_amount">
                            </tbody>
                        </table>
                    </div> <!--cartContent-->
                    <div class="cartFooter w100">
                        <div class="box-footer">
                            <div class="pull-left">
                                <a href="<?php echo base_url(); ?>" class="btn btn-default"> 
                                    <i class="fa fa-arrow-left"></i> &nbsp; Continue shopping 
                                </a>
                            </div>
                            <div class="pull-right">
                                <button type="submit" class="btn btn-default basket_section_button" id="updation_button">
                                    <i class="fa fa-undo"></i> &nbsp; Update cart
                                </button>
                            </div>
                        </div>
                    </div> <!--/ cartFooter -->
                </div>
            </div> <!--/row end-->
        </div>
        <div class="col-lg-3 col-md-3 col-sm-5 rightSidebar">
            <div class="contentBox">
                <div class="w100 costDetails">
                    <div class="table-block" id="order-detail-content">
                        <a class="btn btn-primary btn-lg btn-block basket_section_button" id="checkout_button" title="checkout" href="<?php echo base_url(); ?>checkout" style="margin-bottom:20px"> 
                            Proceed to checkout &nbsp; 
                            <i class="fa fa-arrow-right"></i> 
                        </a>
                        <div class="w100 cartMiniTable">
                            <table id="cart-summary" class="std table">
                                <tbody>
                                <tr>
                                    <td>Total products</td>
                                    <td class="price">
                                        &#8377; <span class="product_subtotal product_overall_total"> <?php echo number_format(ceil($total),2); ?>    
                                    </td>
                                </tr>
                                <tr style="">
                                    <td>Shipping</td>
                                    <td class="price">
                                    &#8377; <?php 
                                            $shipping_amount = 0.00 ;
                                            echo number_format($shipping_amount,2); 
                                            ?>
                                        <input type="hidden" value="<?php echo number_format($shipping_amount,2); ?>" class="ordinary_shipping_amount" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>Total tax</td>
                                    <td class="price" id="total-tax"> &#8377; 0.00 </td>
                                </tr>
                                <tr>
                                    <td> Total</td>
                                    <td class=" site-color" id="total-price">
                                        &#8377; 
                                        <span class="product_final_amount"> <?php echo number_format(ceil(($shipping_amount+$total)),2); ?> </span>
                                        <input type="hidden" value="<?php echo number_format($shipping_amount+$total,2); ?>" class="ordinary_final_amount" />
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div class="input-append couponForm">
                                            <input class="col-lg-8" id="appendedInputButton" type="text"
                                                   placeholder="Coupon code">
                                            <button class="col-lg-4 btn btn-success" type="button">Apply!</button>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End popular -->

        </div>
        <!--/rightSidebar-->

    </div>
    <!--/row-->

    <div style="clear:both"></div>
</div>
<!-- /.main-container -->
<div class="gap"></div>
<input type="hidden" id="total_amount" value="<?php echo $total; ?>">
<?php include "templates/footer.php"; ?>