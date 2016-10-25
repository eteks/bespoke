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
                <?php if (isset($error_message)){ 
                    echo "<p class='error_msg_reg alert alert-info'>".$error_message."</p>";
                }?>
                <form role="form" method="POST" action="<?php echo base_url(); ?>admin/adminindex/add_category" enctype="multipart/form-data" class="form_submit" name="category_form">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Person Name<span class="fill_symbol"> *</span></label>
                        <input type="text" class="form-control" id="category_name" placeholder="Enter Person Name" name="person_name" value="<?php echo set_value('person_name');?>">
                    </div>  
                    <div class="control-group">
                        <label class="control-label" for="selectError">Relationship Status<span class="fill_symbol"> *</span></label>
                        <div class="controls">
                            <select name="relationship_status" id="sel_a" class="product-type-filter form-control city_act">
                                <option value="">Select</option>
                                <?php foreach (unserialize(RELATIONSHIP_STATUS) as $key=>$value): ?>
                                    <option value="<?php echo $key; ?>" <?php echo set_select('relationship_status', $key ,false); ?>><?php echo $value; ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group address_form_group">
                        <label for="description">Person Address<span class="fill_symbol"> *</span></label>
                        <textarea type="text" class="form-control product_default_field" id="description" placeholder="Enter Person address" name="person_address"><?php echo set_value('person_address');?></textarea>
                    </div> 
                    <div class="form-group couple_form_group">
                        <label for="exampleInputEmail1">Couple Name<span class="fill_symbol"> *</span></label>
                        <input type="text" class="form-control" id="category_name" placeholder="Mr." name="person_bride_name" value="<?php echo set_value('person_bride_name');?>">
                        <input type="text" class="form-control" id="category_name" placeholder="Mrs." name="person_groom_name" value="<?php echo set_value('person_groom_name');?>">
                    </div>  <!-- couple_form_group -->
                    <div class="form-group">
                        <label for="exampleInputFile">Upload Image<span class="fill_symbol"> *</span></label>
                        <input type="file" id="category_image" name="category_image">
                        <span class="upload_limit">(Maximum Upload size 1MB and Max Upload dimensions 450px * 600px)</span>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="selectError">Status<span class="fill_symbol"> *</span></label>
                        <div class="controls">
                            <select name="category_status" id="sel_a" class="product-type-filter form-control city_act">
                                <option value="">Select</option>
                                <option value="1" <?php echo set_select('category_status', '1',false); ?>>Active</option>
                                <option value="0" <?php echo set_select('category_status', '0',false); ?>>Inactive</option>
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
