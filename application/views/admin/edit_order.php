<?php if(!$this->input->is_ajax_request()){ ?>
<?php include "templates/header.php" ?>
        <!--/span-->
        <!-- left menu ends -->
<div class="ch-container">
    <div class="row footer_content"> 
        <noscript>
            <div class="alert alert-block col-md-12">
                <h4 class="alert-heading">Warning!</h4>

                <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a>
                    enabled to use this site.</p>
            </div>
        </noscript>

        <div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
            <div>
    <ul class="breadcrumb">
        <li>
            <a href="#">Home</a>
        </li>
        <li>
            <a href="#">Edit Order</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i>Edit Order</h2>
                <div class="box-icon">
                    <a href="#" class="btn btn-setting btn-round btn-default"><i
                            class="glyphicon glyphicon-cog"></i></a>
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    <a href="#" class="btn btn-close btn-round btn-default"><i
                            class="glyphicon glyphicon-remove"></i></a>
                </div>
            </div>
            <div class="box-content">
<?php } ?>
                <?php if (isset($error_message)){ 
                    echo "<p class='error_msg_reg alert alert-info'>".$error_message."</p>";
                }?>
                <?php ?>
                <form role="form" method="POST" action="<?php echo base_url(); ?>index.php/admin/adminindex/edit_order/<?php echo $order_data['order_id']; ?>" class="form_submit" name="edit_order_form" id="edit_order_form">
                 <div class="form-errors"></div>
                    <div class="form-group">
                        <label for="area_name">Customer Name<span class="required">*</span></label>
                        <input type="text" class="form-control" id="order_customer_name" placeholder="Enter Customer Name" name="order_customer_name" value="<?php if(!empty($order_data['order_customer_name'])) echo $order_data['order_customer_name']; ?>">
                    </div>
                    <div class="form-group">
						<label for="last-name">Shipping Address Line1<span class="required">*</span></label>
						<input type="text" class="form-control" id="shippingaddressline1" placeholder="Shipping Address Line1" name="order_shipping_line1" value="<?php echo($order_data['order_shipping_line1']); ?>">
								</div> 
                    <div class="form-group">
                        <label for="area_name">Shipping Address2</label>
                        <input type="text" class="form-control" id="address1" placeholder="Enter Your Address" name="shipping_default_addr2" value="<?php if(!empty($order_data['shipping_default_addr2'])) echo $order_data['shipping_default_addr2']; ?>">
                    </div>
                    <div class="control-group">
                        <label for="sel_a">State</label>
                    <select name="state_name" id="sel_city" class="product-type-filter form-control state_act" disabled="">
                   <option value="" >Select State</option>
                    <?php foreach ($state_list as $state_row): ?>
                         <?php   
                            if($order_data['order_shipping_state_id'] == $state_row['state_id'])  echo "<option selected value='".$state_row['state_id']."'>".$state_row['state_name']."</option>";
                            else
                                echo "<option value='".$state_row['state_id']."'>".$state_row['state_name']."</option>";
                        ?>
                    <?php endforeach; ?>
                    </select>
                    </div>
                    <div class="control-group">
                        <label for="sel_a">City</label>
                    <select name="city_name" id="sel_city" class="product-type-filter form-control city_act" disabled="">
                   <option value="" >Select City</option>
                    <?php foreach ($city_list as $city_row): ?>
                         <?php   
                            if($order_data['order_shipping_city_id'] == $city_row['city_id'])  echo "<option selected value='".$city_row['city_id']."'>".$city_row['city_name']."</option>";
                            else
                                echo "<option value='".$city_row['city_id']."'>".$city_row['city_name']."</option>";
                        ?>
                    <?php endforeach; ?>
                    </select>
                    </div>
                     <div class="control-group">
                        <label for="sel_a">Area</label>
                    <select name="area_name" id="sel_a" class="form-control">
                   <option value="">
                     Select Area 
                    </option>
                   <?php foreach ($area_list as $area_row): ?>
                         <?php   
                            if($order_data['order_shipping_area_id'] == $area_row['area_id'])  echo "<option selected value='".$area_row['area_id']."'>".$area_row['area_name']."</option>";
                            else
                                echo "<option value='".$area_row['area_id']."'>".$area_row['area_name']."</option>";
                        ?>
                    <?php endforeach; ?>
                    </select>
                    </div>
                    <div class="form-group">
					    <label for="last-name">Shipping Email<span class="required">*</span></label>
						<input type="text" class="form-control" id="test" placeholder="Shipping Email" name="order_shipping_email" value="<?php echo($order_data['order_shipping_email']); ?>">
					</div>
					<div class="form-group">
					    <label for="last-name">Shipping Mobile<span class="required">*</span></label>
						<input type="text" class="form-control" id="phone" maxlength="10" placeholder="Shipping Mobile" name="order_shipping_mobile" value="<?php echo($order_data['order_shipping_mobile']); ?>">
					</div>
					<div class="form-group">
					    <label for="last-name">Total Items<span class="required">*</span></label>
						<input type="text" class="form-control" id="totalitems" placeholder="Total Items" name="order_total_items" value="<?php echo($order_data['order_total_items']); ?>">
					</div>
                     <div class="control-group">
                        <label class="control-label" for="sel_c">Status<span class="fill_symbol"> *</span></label>
                        <div class="controls">
                            <select name="order_status" id="sel_c" class="product-type-filter form-control order_act">
                                <option value="">Select</option>
                                <option value="1" <?php if ($order_data['order_status'] == 1) echo "selected"; ?>>
                                    <span>Active</span>
                                </option>
                                <option value="0" <?php if ($order_data['order_status'] == 0) echo "selected"; ?>>
                                    <span>Inactive</span>
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="group">    
                    <button type="submit" class="btn submit-btn btn-default">Submit</button>
                    </div>
                </form>
<?php if(!$this->input->is_ajax_request()){ ?>
            </div>
        </div>
    </div>
    <!--/span-->
</div><!--/row-->
<!-- <script>
$(document).ready(function(){
$('#user_dob').datepicker();
});
</script> -->
    <!-- content ends -->
    </div><!--/#content.col-md-0-->
</div><!--/fluid-row-->\
</div>
<?php include "templates/footer.php" ?>
<?php } ?>

