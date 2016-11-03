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
            <a href="#">Edit Subcategory</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Edit Subcategory</h2>

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
                <form role="form" method="POST" action="<?php echo base_url(); ?>index.php/admin/adminindex/edit_subcategory/<?php echo $subcategory_data['subcategory_id']; ?>" name="edit_subcategory_form" class="form_submit">
                    <div class="form-group">
                        <label for="subcategory_name">Subcategory Name<span class="fill_symbol"> *</span></label>
                        <input type="text" class="form-control" id="subcategory_name" name="edit_subcategory_name" placeholder="Enter SubCategory Name"
                        value="<?php if(!empty($subcategory_data['subcategory_name'])) echo $subcategory_data['subcategory_name']; ?>" >
                    </div>  
                    <div class="attribute_main_block" id="subcategory_status">
                        <?php foreach ($subcategory_split as $rec_cat):?>                        
                        <div class="attribute_group subcategory_group" id="attribute_group1">
                            <div class="form-group attribute_block">
                                <div class="clone_attribute_group">
                                    <div class="clone_attribute" id="clone_attribute1">
                                        <div class="control-group">
                                            <label class="control-label" for="sel_c">Choose Recipient<span class="fill_symbol">*</span></label>
                                            <div class="controls">
                                            <select name="select_recipient[]" id="select_recipient" class="product-type-filter form-control fl label-boxes field_validate attribute_option_validate attribute_validate att_equal recipient_checkbox">
                                                <option value="">Select Recipient</option>
                                                    <?php foreach ($recipient_list as $rec): ?>
                                                     <?php   
                                                        if($rec['recipient_id'] == $rec_cat["recipient_mapping_id"])  echo "<option selected value='".$rec["recipient_id"]."'>".$rec['recipient_type']."</option>";
                                                        else
                                                            echo "<option value='".$rec["recipient_id"]."'>".$rec['recipient_type']."</option>";
                                                    ?>
                                                    <?php endforeach; ?>
                                                </select>
                                                <span class="product_error_message">The product Category field is required</span>
                                            </div>
                                        </div>
                                <div class="control-group">
                    <label class="control-label" for="sel_c">Choose Category<span class="fill_symbol">*</span></label>
                        <div class="multiple_dropdown"> 
                            <div class="select_multiple_option">
                                <a class="attribute_validate_category">
                                    <span id="category_act">Select Category</span><i class="fa fa-caret-down"  aria-hidden="true"></i>  
                                    <p class="multiSel"></p>  
                                </a>
                            </div>
                            <div class="mutliSelect">
                                <ul>
                                <!-- <?php 
                                    $condition = is_array($rec_cat["category_mapping_id"]) || str_split("",$rec_cat["category_mapping_id"]);
                                    echo "<pre>";
                                    print_r($condition);
                                    echo "</pre>";
                                ?> -->
                                <?php foreach ($category_list as $cat):
                                    $condition = in_array($cat["category_id"],$rec_cat["category_mapping_id"])?"checked":"";
                                    echo "<li><input type='checkbox' name='select_category[]' id='subcategory_name' class='edit_multiple_checkbox' 
                                    value='".$cat["category_id"]."'".$condition."/><span class='multiple_checkbox multple_checkbox_inactive edit_multiple_checkbox' value='".$cat["category_id"]."'".$condition.">".$cat["category_name"]."</span></li>";
                                endforeach ?>
                                </ul>
                            </div>
                                    </div>
                                    </div>
                                    </div> <!--  clone_attribute -->
                               </div> <!-- clone_attribute_group -->
                                 <div class="clr-screen"></div>

                            </div>
                            <div class="group group_action">
                                <input type="button" value="Add" class="btn submit-btn btn-default attibute_add product-btns">
                                <input type="button" value="Remove" class="btn submit-btn btn-default attibute_remove product-btns attribute_btn_disabled">      
                            </div>  
                            <input type="hidden" class="multiple_checkbox_hidden" name="multiple_checkbox_hidden[]" value=""> 
                        </div> 
                        <?php endforeach; ?>
                    </div>


                    <div class="control-group">
                        <label class="control-label" for="sel_c">Status<span class="fill_symbol"> *</span></label>
                        <div class="controls">
                            <select name="edit_subcategory_status" id="sel_c" class="product-type-filter form-control city_act">
                                <option value="">Select</option>
                                <option value="1" <?php if ($subcategory_data['subcategory_status'] == 1) echo "selected"; ?>>
                                    <span>Active</span>
                                </option>
                                <option value="0" <?php if ($subcategory_data['subcategory_status'] == 0) echo "selected"; ?>>
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
     <script>
// Load area based on recipient
 $(document).delegate(".attribute_validate",'change',function(){
        var selected_val =$(this);
        selected_recipient = $.trim($('option:selected',this).text());
        selected_recipient_id = $('option:selected',this).val();
        form_data = {'selected_recipient_id':selected_recipient_id};
        if(selected_recipient != 'Select Recipient'){
            $.ajax({
               type: "POST",
               url: "<?php echo base_url(); ?>" + "admin/adminindex/ajax_subcategory",
               data: form_data,
               cache: false,
               success: function(data) { 
                var obj = JSON.parse(data);
                var options = '';   
                if(obj.length!=0){               
                  $.each(obj, function(i){
                    options += '<li><input type="checkbox" name="select_category[]" class="subcategory_name subcategory_checkbox" value="'+obj[i].category_id+'" /><span class="multiple_checkbox multple_checkbox_inactive">'+obj[i].category_name+'</span></li>';
                  });  
                }   
                else{
                    alert('No Category added for '+selected_recipient);    
                }  
                 selected_val.parents('.attribute_group').find('.mutliSelect ul').html(options);       
               }
           });
       }        
    });
     </script>
</div><!--/row-->
    <!-- content ends -->
    </div><!--/#content.col-md-0-->
</div><!--/fluid-row-->
</div>
<?php include "templates/footer.php" ?>
<?php } ?>