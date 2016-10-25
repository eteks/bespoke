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
            <a href="#">Add Subategory</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Add Subcategory</h2>

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
            <form role="form" method="POST" action="<?php echo base_url(); ?>index.php/admin/adminindex/add_subcategory" name="subcategory_form" id="add_subcategory" class="form_submit">
                    <div class="form-group">
                        <label for="subcategory_name">Subcategory Name<span class="fill_symbol"> *</span></label>
                        <input type="text" class="form-control" id="subcategory_name" name="subcategory_name" placeholder="Enter subcategory Name" value="<?php echo set_value('subcategory_name');?>">
                    </div>  
                    <p class="attribute_duplicate_message">Duplicate attribute option not allowed</p>
                    <p class="attribute_group_message">Every attribute group must have equal no. of attribute set</p>
                    <div class="attribute_main_block" id="subcategory_status">
                        <div class="attribute_group subcategory_group" id="attribute_group1">
                            <div class="form-group attribute_block">
                                <div class="clone_attribute_group">
                                    <div class="clone_attribute" id="clone_attribute1">
                                        <div class="control-group">
                                            <label class="control-label" for="sel_c">Choose Recipient<span class="fill_symbol">*</span></label>
                                            <div class="controls">
                                            <select name="select_recipient" id="recipient_act" class="product-type-filter form-control fl label-boxes field_validate attribute_option_validate attribute_validate att_equal">
                                                <option value="">Select Recipient</option>
                                                    <?php foreach ($recipient_list as $recipient): ?>
                                                        <option name='select_recipient' id='subcategory_name' value="<?php echo $recipient["recipient_id"] ?>"><?php echo $recipient['recipient_type'] ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                                <span class="product_error_message">The product Category field is required</span>
                                            </div>
                                        </div>
                                <div class="control-group">
                    <label class="control-label" for="sel_c">Choose Category<span class="fill_symbol">*</span></label>
                        <div class="multiple_dropdown"> 
                            <div class="select_multiple_option">
                                <a id="admin_check">
                                    <span id="category_act">Select Category</span><i class="fa fa-caret-down"  aria-hidden="true"></i>  
                                    <p class="multiSel"></p>  
                                </a>
                            </div>
                            <div class="mutliSelect">
                                <ul>
                                <?php foreach ($category_list as $cat):
                                    echo "<li><input type='checkbox' name='select_category[]' class='admin_users_checkbox' id='subcategory_name' value='".$cat["category_id"]."'".set_checkbox('select_category[]', $cat["category_id"], false)."/><span class='multiple_checkbox multple_checkbox_inactive'>".$cat["category_name"]."</span></li>";
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
                        </div> 
                    </div>
                     <div class="control-group">
                        <label class="control-label" for="sel_c">Status<span class="fill_symbol"> *</span></label>
                        <div class="controls">
                            <select id="sel_c" class="product-type-filter form-control city_act" name="subcategory_status">
                                <option value="">Select</option>
                                <option value="1"  <?php echo set_select('subcategory_status', '1', false); ?>>Active</option>
                                <option value="0" <?php echo set_select('subcategory_status', '0', false); ?>>Inactive</option>
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
                    options += '<li><input type="checkbox" name="select_category[]" class="subcategory_name" value="'+obj[i].category_id+'" /><span class="multiple_checkbox multple_checkbox_inactive">'+obj[i].category_name+'</span></li>';
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