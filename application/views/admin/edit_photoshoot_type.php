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
            <a href="#">Edit Photo Shoot type</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Edit Photo Shoot type</h2>

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
                <form role="form" method="POST" action="<?php echo base_url(); ?>admin/photography/edit_photoshoot_type/<?php echo $photoshoot_type_data['display_id']; ?>" enctype="multipart/form-data" name="edit_photoshoot_type_form" class="form_submit">
                    <div class="form-group">
                        <label for="category_name">PhotoShoot Type<span class="fill_symbol"> *</span></label>
                        <input type="text" class="form-control product_lables" id="category_name" placeholder="Enter Category Name" value="<?php if(!empty($photoshoot_type_data['display_title'])) echo $photoshoot_type_data['display_title']; ?>" name="photoshoot_type">
                    </div>  
                    <div class="form-group">
                        <label for="description">PhotoShoot Type Description<span class="fill_symbol"> *</span></label>
                        <textarea type="text" class="form-control product_lables" id="description" placeholder="Enter PhotoShoot Type description" name="photoshoot_description"><?php if(!empty($photoshoot_type_data['display_description'])) echo $photoshoot_type_data['display_description']; ?></textarea>
                        <!-- <span class="product_error_message">The Product Desciption field is required</span> -->
                    </div> 
                    <div class="control-group">
                        <label class="control-label" for="sel_c">Status<span class="fill_symbol"> *</span></label>
                        <div class="controls">
                            <select name="photoshoot_type_status" id="sel_c" class="product-type-filter form-control city_act product_lables">
                                <option value="">Select</option>
                                <option value="1" <?php if ($photoshoot_type_data['display_status'] == 1) echo "selected"; ?>>
                                    <span>Active</span>
                                </option>
                                <option value="0" <?php if ($photoshoot_type_data['display_status'] == 0) echo "selected"; ?>>
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
