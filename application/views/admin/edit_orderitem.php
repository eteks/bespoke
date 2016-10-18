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
            <a href="#">Edit Order </a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Edit Order</h2>

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
                <form role="form" method="POST" action="<?php echo base_url(); ?>index.php/admin/adminindex/edit_orderitem/<?php echo $orderitem_data['orderitem_id']; ?>" class="form_submit" name="edit_orderitem_form" id="edit_orderitem_form"> 
                    <div class="form-group">
                        <label for="exampleInputEmail1">Order Id<span class="fill_symbol">*</span></label>
                        <input type="text" class="form-control" id="orderid" placeholder="Enter Order Id" name="orderitem_order_id" value="<?php echo($orderitem_data['orderitem_order_id']); ?>">
                    </div> 
                    <div class="form-group">
                        <label for="last-name">Product Name<span class="fill_symbol">*</span></label>
                        <input type="text" class="form-control" id="quantity" placeholder="Enter Product Name" name="orderitem_product_id" value="<?php echo($orderitem_data['orderitem_product_id']); ?>">
                    </div>
                    <div class="form-group">
                        <label for="last-name">Quantity<span class="fill_symbol">*</span></label>
                        <input type="text" class="form-control" id="quantity" placeholder="Enter quantity" name="orderitem_quantity" value="<?php echo($orderitem_data['orderitem_quantity']); ?>">
                    </div>
                    <div class="form-group">
                        <label for="last-name">Price<span class="fill_symbol">*</span></label>
                        <input type="text" class="form-control" id="price" placeholder="Enter price" name="orderitem_price" value="<?php echo($orderitem_data['orderitem_price']); ?>">
                    </div>
                     <div class="control-group">
                        <label class="control-label" for="sel_c">Status<span class="fill_symbol"> *</span></label>
                        <div class="controls">
                            <select name="order_status" id="sel_c" class="product-type-filter form-control orderitem_act">
                                <option value="">Select</option>
                                <option value="1" <?php if ($orderitem_data['orderitem_status'] == 1) echo "selected"; ?>>
                                    <span>Active</span>
                                </option>
                                <option value="0" <?php if ($orderitem_data['orderitem_status'] == 0) echo "selected"; ?>>
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

    <!-- content ends -->
    </div><!--/#content.col-md-0-->
</div><!--/fluid-row-->
</div>
<?php include "templates/footer.php" ?>
<?php } ?>
