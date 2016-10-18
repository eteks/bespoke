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
            <a href="#">Add Gift Product</a>
        </li>
    </ul>
</div>
<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Add Gift Product</h2>

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
             <span class="product_error"></span>
             <span class="photo_labelError">Invalid file type</span> 
             <p class="error_msg_reg test_product"><?php if (isset($error_message)) echo $error_message; ?></p>
             <?php 
                // echo "<pre>";
                // print_r($giftproduct_data);
                // echo "</pre>";
             // echo "<pre>";
             // print_r($giftproduct_image);
             // echo "</pre>";
             ?>
             <form role="form" method="POST" action="<?php echo base_url(); ?>index.php/admin/adminindex/edit_giftproduct/<?php echo $giftproduct_data["product_id"]; ?>" enctype="multipart/form-data" name="product_form" id="edit_giftproduct" class="form_submit">
             <input type="hidden" value="0">
             <input type="hidden" class="attribute_check_status" name="attribute_check_status" value="<?php if(sizeof($product_attribute_list) > 0) 
                echo "1"; ?>">
             <p class="product_tab">Basic Product Details</p>
                    <div class="form-group">
                        <label for="titlename">Product Title<span class="fill_symbol"> *</span></label>
                        <input type="text" class="form-control product_default_field product_lables" id="titlename" placeholder="Enter title Name" name="product_title" value="<?php if(!empty($giftproduct_data['product_title'])) echo $giftproduct_data['product_title']; ?>">
                        <span class="product_error_message">The Product Title field is required</span>
                    </div>  
                     <div class="form-group">
                        <label for="description">Description<span class="fill_symbol"> *</span></label>
                        <textarea type="text" class="form-control product_default_field product_lables" id="description" placeholder="Enter description" name="product_description"><?php if(!empty($giftproduct_data['product_description'])) echo $giftproduct_data['product_description']; ?></textarea>
                        <span class="product_error_message">The Product Desciption field is required</span>
                    </div> 
                    <div class="control-group">
                        <label class="control-label" for="sel_c">Choose Category<span class="fill_symbol"> *</span></label>
                        <div class="controls">
                            <select id="sel_c" class="product-type-filter form-control category_act product_default_field product_lables" name="select_category">
                            <option value="">Select Category</option>
                                <?php foreach ($category_list as $cat): ?>
                                    <option value="<?php echo $cat["category_id"] ?>" <?php if($cat["category_id"]== $giftproduct_data['product_category_id']) echo "selected"; ?>><?php echo $cat["category_name"] ?></option>
                                <?php endforeach ?>
                            </select>
                            <span class="product_error_message">The product Category field is required</span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="sel_c">Choose SubCategory<span class="fill_symbol"> *</span></label>
                        <div class="controls">
                            <select id="sel_c" class="product-type-filter form-control subcategory_act product_default_field product_lables" name="select_subcategory">
                                <option value="">Select Subcategory</option>
                                <?php foreach ($subcategory_list as $subcat): ?>
                                    <option value="<?php echo $subcat["subcategory_id"] ?>" <?php if($subcat["subcategory_id"]== $giftproduct_data['product_subcategory_id']) echo "selected"; ?>><?php echo $subcat["subcategory_name"] ?></option>
                                <?php endforeach ?>
                            </select>
                            <span class="product_error_message">The Product Subcategory field is required</span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="sel_c">Choose Recipient<span class="fill_symbol"> *</span></label>
                        <div class="controls">
                            <select id="sel_c" class="product-type-filter form-control recipient_act product_default_field product_lables" name="select_recipient">
                            <option value="">Select Recipient</option>
                                <?php foreach ($recipient_list as $rec): ?>
                                    <option value="<?php echo $rec["recipient_id"] ?>" <?php if($rec["recipient_id"]== $giftproduct_data['product_recipient_id']) echo "selected"; ?>><?php echo $rec["recipient_type"] ?></option>
                                <?php endforeach ?>
                            </select>
                            <span class="product_error_message">The Product Recipient field is required</span>
                        </div>
                    </div>
                         <div class="form-group price_group" style="<?php if(sizeof($product_attribute_list) > 0) echo 'display:none'; ?>">
                            <label for="price">Price<span class="fill_symbol"> *</span></label>
                            <input type="text" class="form-control price product_default_field product_lables" id="product_price" placeholder="Enter price" value="<?php if(!empty($giftproduct_data['product_price'])) echo $giftproduct_data['product_price']; ?>">
                            <span class="product_error_message">The Product Price field is required</span>
                        </div> 
                        <input type="hidden" name="product_price" id="product_price_hidden">
                        <div class="form-group items_group" style="<?php if(sizeof($product_attribute_list) > 0) echo 'display:none'; ?>">
                            <label for="total_iteams">Total Items<span class="fill_symbol"> *</span></label>
                            <input type="text" class="form-control totalitem product_default_field product_lables" id="product_totalitems" placeholder="Enter total items" value="<?php if(!empty($giftproduct_data['product_totalitems'])) echo $giftproduct_data['product_totalitems']; ?>">
                            <span class="product_error_message">The Product Totalitems field is required</span>
                        </div> 
                        <input type="hidden" name="product_totalitems" id="product_totalitems_hidden">
                    <!-- <div class="form-group">
                        <label for="sold">Sold</label>
                        <input type="text" class="form-control" id="sold" placeholder="Enter Sold" disabled="">
                        <input type="hidden" name="product_sold">
                    </div>  -->
                    <div class="control-group">
                        <label class="control-label" for="sel_c">Status<span class="fill_symbol"> *</span></label>
                        <div class="controls">
                            <select name="product_status" id="sel_c" class="product-type-filter form-control city_act product_default_field product_lables">
                                <option value="">Select</option>
                                <option value="1" <?php if($giftproduct_data['product_status'] == 1) echo "selected"; ?>>Active</option>
                                <option value="0" <?php if($giftproduct_data['product_status'] == 0) echo "selected"; ?>>Inactive</option>
                            </select>
                            <span class="product_error_message">The Product Status field is required</span>
                        </div>
                    </div>
                    <p class="product_tab"><input type="checkbox" class="attribute_status" <?php if(sizeof($product_attribute_list) > 0) echo "checked"; ?>> Want to Add Product Attributes?</p>
                    <p class="attribute_duplicate_message">Duplicate attribute option not allowed</p>
                    <p class="attribute_group_message">Every attribute group must have equal no. of attribute set</p>
                    <?php
                    // echo sizeof($product_attribute_list);
                    // echo "<pre>";
                    // print_r($product_attribute_list);
                    // echo "</pre>";
                    ?>
                    <?php if(sizeof($product_attribute_list) == 0){ ?>
                        <div class="attribute_main_block">
                        <div class="attribute_group" id="attribute_group1">
                            <div class="form-group attribute_block">
                                <div class="clone_attribute_group">
                                    <div class="clone_attribute" id="clone_attribute1">
                                        <label for="total_iteams" class="attribute_label fl">Attribute Option</label>
                                        <select name="select_attribute[]" id="sel_c" class="product-type-filter form-control fl label-boxes field_validate attribute_option_validate attribute_validate att_equal">
                                                <option value="">Select Attribute</option>
                                                <?php foreach ($attribute_list as $att): ?>
                                                    <option value="<?php echo $att["product_attribute_id"] ?>"><?php echo $att["product_attribute"] ?></option>
                                                <?php endforeach ?>
                                        </select>
                                        <input class="form-control fl label-boxes field_validate attribute_option_validate attribute_validate" id="total_iteams" placeholder="Enter Attribute value" name="attribute_value[]" type="text">
                                        <div class="add-rmv-btn">
                                            <input value="Add" class="btn submit-btn btn-default attibute_add_btn attribute_action_btn" type="button">
                                            <input value="Remove" class="btn submit-btn btn-default attibute_remove_btn attribute_action_btn attribute_btn_disabled" type="button">
                                        </div>
                                    </div> <!--  clone_attribute -->
                               </div> <!-- clone_attribute_group -->
                                 <div class="clr-screen"></div>
                            </div>
                            <div class="form-group attribute_block">
                                <label for="price" class="fl">Price</label>
                                <input type="text" class="form-control label-boxes attribute_validate price" id="product_attribute_price" placeholder="Enter price" name="product_attribute_price[]">
                            </div> 
                             <div class="form-group attribute_block">
                                <label for="total_iteams" class="fl">Total Items</label>
                                <input type="text" class="form-control label-boxes attribute_validate" id="product_attribute_totalitems" placeholder="Enter total items" name="product_attribute_totalitems[]">
                            </div> 
                            <div class="group group_action">
                                <input type="button" value="Add" class="btn submit-btn btn-default attibute_add product-btns">
                                <input type="button" value="Remove" class="btn submit-btn btn-default attibute_remove product-btns attribute_btn_disabled">      
                            </div>  
                        </div> 
                    </div>   
                    <?php } else { ?>
                    <div class="attribute_main_block" style="<?php if(sizeof($product_attribute_list) > 0) echo 'display:block'; ?>">
                        <?php 
                        $i=1;
                        foreach ($product_attribute_list as $key => $value) { 
                            // echo sizeof($value['product_attribute_id']); ?>
                            <input type="hidden" name="product_attribute_group_id[]" value="<?php echo $value['product_attribute_group_id']; ?>">
                            <div class="attribute_group" id="<?php echo "attribute_group".$i; ?>">
                                <div class="form-group attribute_block">
                                    <div class="clone_attribute_group">
                                    <?php for($i = 0; $i < sizeof($value['product_attribute_id']); $i++){ ?>
                                        <div class="clone_attribute" id="<?php echo "clone_attribute".$i; ?>">
                                            <label for="total_iteams" class="attribute_label fl">Attribute Option</label>
                                            <select name="select_attribute[]" id="sel_c" class="product-type-filter form-control fl label-boxes field_validate attribute_option_validate attribute_validate att_equal">
                                                    <option value="">Select Attribute</option>
                                                    <?php foreach ($attribute_list as $att): 
                                                    if(is_array($value['product_attribute_id'])){ ?>
                                                        <option value="<?php echo $att["product_attribute_id"] ?>" <?php if($value['product_attribute_id'][$i] == $att["product_attribute_id"] ) echo "selected"; ?>><?php echo $att["product_attribute"] ?></option>
                                                    <?php }else {?>
                                                        <option value="<?php echo $att["product_attribute_id"] ?>" <?php if($value['product_attribute_id'] == $att["product_attribute_id"] ) echo "selected"; ?>><?php echo $att["product_attribute"] ?></option>
                                                    <?php }endforeach ?>
                                            </select>
                                            <input class="form-control fl label-boxes field_validate attribute_option_validate attribute_validate" id="total_iteams" placeholder="Enter Attribute value" name="attribute_value[]" type="text" value="<?php if(is_array($value['product_attribute_id'])) echo $value['product_attribute_value'][$i]; else echo $value['product_attribute_value'];?>">
                                            <div class="add-rmv-btn">
                                                <input value="Add" class="btn submit-btn btn-default attibute_add_btn attribute_action_btn" type="button">
                                                <input value="Remove" class="btn submit-btn btn-default attibute_remove_btn attribute_action_btn attribute_btn_disabled" type="button">
                                            </div>
                                        </div> <!--  clone_attribute -->
                                    <?php } ?>
                                   </div> <!-- clone_attribute_group -->
                                     <div class="clr-screen"></div>
                                </div>
                                <div class="form-group attribute_block">
                                    <label for="price" class="fl">Price</label>
                                    <input type="text" class="form-control label-boxes attribute_validate price" id="product_attribute_price" placeholder="Enter price" name="product_attribute_price[]" value="<?php echo $value['product_attribute_group_price'];?>">
                                </div> 
                                 <div class="form-group attribute_block">
                                    <label for="total_iteams" class="fl">Total Items</label>
                                    <input type="text" class="form-control label-boxes attribute_validate" id="product_attribute_totalitems" placeholder="Enter total items" name="product_attribute_totalitems[]" value="<?php echo $value['product_attribute_group_totalitems'];?>">
                                </div> 
                                <div class="group group_action">
                                    <input type="button" value="Add" class="btn submit-btn btn-default attibute_add product-btns">
                                    <input type="button" value="Remove" class="btn submit-btn btn-default attibute_remove product-btns attribute_btn_disabled">      
                                </div>  
                            </div>
                        <?php 
                        $i++;
                        } ?> 
                        </div>   
                    <?php } ?>            
                    <div class="group_values_block">
                        <input type="hidden" class="group_values" name="group_values" value="<?php if(sizeof($product_attribute_list) > 0) echo sizeof($product_attribute_list); else echo "1"; ?>"> 
                    </div> <!-- group_values_block -->
                    <button type="submit" class="btn submit-btn btn-default submiit">Submit</button>
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