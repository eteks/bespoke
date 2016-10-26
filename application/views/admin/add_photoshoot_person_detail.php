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
            <a href="#">Add Photoshoot Person Detail</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Add Photoshoot Person Detail</h2>

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
				<span class="person_error"></span>
                <span class="photo_labelError">Invalid file type</span>
                <?php if (isset($error_message)){ 
                    echo "<p class='error_msg_reg alert alert-info'>".$error_message."</p>";
                }?>
                <form role="form" method="POST" action="<?php echo base_url(); ?>admin/photography/add_photoshoot_person_detail" enctype="multipart/form-data" class="form_submit" name="photoshoot_person_detail_form" id="photoshoot_person_detail">
                    <div class="form-group person_field">
                        <label for="exampleInputEmail1">Person Name<span class="fill_symbol"> *</span></label>
                        <input type="text" class="form-control person_default_field" id="category_name" placeholder="Enter Person Name" name="person_name" value="<?php echo set_value('person_name');?>">
                        <span class="person_error_message">The Person Name field is required</span>
                    </div>  
                    <div class="control-group person_field">
                        <label class="control-label" for="selectError">Relationship Status<span class="fill_symbol"> *</span></label>
                        <div class="controls">
                            <select name="relationship_status" id="sel_a" class="product-type-filter form-control person_default_field">
                                <option value="">Select</option>
                                <?php foreach (unserialize(RELATIONSHIP_STATUS) as $key=>$value): ?>
                                    <option value="<?php echo $key; ?>" <?php echo set_select('relationship_status', $key ,false); ?>><?php echo $value; ?></option>
                                <?php endforeach ?>
                            </select>
                            <span class="person_error_message">The Person Relationship status field is required</span>
                        </div>
                    </div>
                    <div class="form-group couple_form_group person_field">
                        <label for="exampleInputEmail1">Couple Name<span class="fill_symbol"> *</span></label>
                        <input type="text" class="form-control" id="category_name" placeholder="Mr." name="person_bride_name" value="<?php echo set_value('person_bride_name');?>">
                        <input type="text" class="form-control" id="category_name" placeholder="Mrs." name="person_groom_name" value="<?php echo set_value('person_groom_name');?>">
                    </div>  <!-- couple_form_group -->
                    <div class="form-group address_form_group person_field">
                        <label for="description">Person Address<span class="fill_symbol"> *</span></label>
                        <textarea type="text" class="form-control person_default_field" id="description" placeholder="Enter Person address" name="person_address"><?php echo set_value('person_address');?></textarea>
                        <span class="person_error_message">The Person Address field is required</span>
                    </div> 
                    <div class="form-group person_field">
                        <label for="exampleInputFile">Upload Photo<span class="fill_symbol"> *</span></label>
                        <!-- <input type="file" id="category_image" name="category_image"> -->
                        <div class="photoshoot_image_group">
                        	<div class="photoshoot_image_clone" id="photoshoot_image_clone1">
		                  		<input type='file' id='image_upload' name='person_image[]' class="photoshoot_image_group_file person_default_field" /> 
		                        <select name="photoshoot_person_status[]" id="sel_a" class="product-type-filter form-control photoshoot_image_group_status person_default_field">
	                                <option value="">Select</option>
	                                <option value="1" <?php echo set_select('photoshoot_person_status', '1',false); ?>>Active</option>
	                                <option value="0" <?php echo set_select('photoshoot_person_status', '0',false); ?>>Inactive</option>
	                            </select>
	                            <div class="add-rmv-btn">
	                                <input value="Add" class="btn submit-btn btn-default photoshoot_image_add_btn photoshoot_image_action_btn" type="button">
	                                <input value="Remove" class="btn submit-btn btn-default photoshoot_image_remove_btn photoshoot_image_action_btn photoshoot_image_btn_disabled" type="button">
                                </div>
                                <div class="clr-screen"></div>                  
                            </div>                            
	                    </div> <!--  photoshoot_image_group -->
	                    <span class="person_photo_error_message">The Person Photo field is required</span>
                        <span class="person_error_message">The Person Photo Status field is required</span>
                        <span class="upload_limit">(Maximum Upload size 1MB and Max Upload dimensions 450px * 600px)</span>   
                    </div>
                    <div class="control-group person_field">
                        <label class="control-label" for="selectError">PhotoShoot Type<span class="fill_symbol"> *</span></label>
                        <div class="controls">
                            <select name="photoshoot_type" id="sel_a" class="product-type-filter form-control person_default_field">
                                <option value="">Select</option>
                                <?php foreach ($photoshoot_type_list as $ptype): ?>
                                    <option value="<?php echo $ptype["display_id"]; ?>" <?php echo set_select('photoshoot_type', $key ,false); ?>><?php echo $ptype["display_title"]; ?></option>
                                <?php endforeach ?>
                            </select>
                            <span class="person_error_message">The Person PhotoShoot Type field is required</span>
                        </div>
                    </div>
                    <div class="control-group person_field">
                        <label class="control-label" for="selectError">Status<span class="fill_symbol"> *</span></label>
                        <div class="controls">
                            <select name="person_status" id="sel_a" class="product-type-filter form-control person_default_field">
                                <option value="">Select</option>
                                <option value="1" <?php echo set_select('person_status', '1',false); ?>>Active</option>
                                <option value="0" <?php echo set_select('person_status', '0',false); ?>>Inactive</option>
                            </select>
                            <span class="person_error_message">The Person Status field is required</span>
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
