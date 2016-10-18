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
            <a href="#">Edit Product Attributes</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Edit Product Attributes</h2>

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
                <form role="form" method="POST" action="<?php echo base_url(); ?>index.php/admin/adminindex/edit_product_attributes/<?php echo $attribute_data['product_attribute_id']; ?>" name="edit_attribute_form">
                    <div class="form-group">
                        <label for="category_name">Product Attributes<span class="fill_symbol"> *</span></label>
                        <input type="text" class="form-control" id="category_name" placeholder="Enter Product attribute Name" value="<?php if(!empty($attribute_data['product_attribute'])) echo $attribute_data['product_attribute']; ?>" name="edit_product_attribute">
                    </div> 
                    <div class="control-group">
                        <label class="control-label" for="sel_c">Input tags<span class="fill_symbol"> *</span></label>
                        <div class="controls">
                            <select name="edit_product_attribute_inputtags" id="sel_c" class="product-type-filter form-control city_act">
                                <option value="">Select</option>
                                <?php foreach (unserialize(INPUT_TAGS) as $key=>$value): ?>
                                <option value="<?php echo $key; ?>" <?php if ($attribute_data['product_attribute_inputtags'] == $key) echo "selected"; ?>>
                                    <span><?php echo $value ?></span>
                                </option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div> 
                   <div class="control-group">
                        <label class="control-label" for="sel_c">Status<span class="fill_symbol"> *</span></label>
                        <div class="controls">
                            <select name="edit_product_attribute_status" id="sel_c" class="product-type-filter form-control">
                                <option value="">Select</option>
                                <option value="1" <?php if ($attribute_data['product_attribute_status'] == 1) echo "selected"; ?>>
                                    <span>Active</span>
                                </option>
                                <option value="0" <?php if ($attribute_data['product_attribute_status'] == 0) echo "selected"; ?>>
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
