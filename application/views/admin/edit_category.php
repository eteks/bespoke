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
            <a href="#">Edit Category</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Edit Category</h2>

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
                <form role="form" method="POST" action="<?php echo base_url(); ?>index.php/admin/adminindex/edit_category/<?php echo $category_data['category_id']; ?>" enctype="multipart/form-data" name="edit_category_form" class="form_submit">
                    <div class="form-group">
                        <label for="category_name">Category Name<span class="fill_symbol"> *</span></label>
                        <input type="text" class="form-control" id="category_name" placeholder="Enter Category Name" value="<?php if(!empty($category_data['category_name'])) echo $category_data['category_name']; ?>" name="edit_category_name">
                    </div>  
                    <div class="form-group">
                        <label for="category_image">Category Image<span class="fill_symbol"> *</span></label>
                     <div class="category-product-image">
                        <input type="file" id="category_image" class="select-category-images" name="edit_category_image">
                        <?php
                            $img_source = $category_data['category_image']; 
                        ?>
                         <!-- <img class='edit_category_image' src="<?php echo base_url(); ?>assets/admin/img/uploads/print1.jpeg"/> -->
                            <?php if($img_source != '') {?>
                             <a class='dispaly_hide_offer' href='<?php echo $img_source; ?>' target='_blank'>
                             <img class='edit_category_image' src='<?php echo base_url().$img_source; ?>'/>
                             </a>
                            <?php } ?>
                            <!-- <span class="close-icon"><a href="#"><i class="glyphicon glyphicon-remove"></i></a></span> -->
                            <input type="hidden" name="hidden_category_image" value="<?php echo $img_source; ?>">
                            <input type="hidden" value="<?php echo $img_source; ?>" name="old_path_name" />
                       </div>
                       <span class="upload_limit">(Maximum Upload size 1MB and Max Upload dimensions 450px * 600px)</span>
                    </div>
                   <div class="control-group">
                        <label class="control-label" for="sel_c">Status<span class="fill_symbol"> *</span></label>
                        <div class="controls">
                            <select name="edit_category_status" id="sel_c" class="product-type-filter form-control city_act">
                                <option value="">Select</option>
                                <option value="1" <?php if ($category_data['category_status'] == 1) echo "selected"; ?>>
                                    <span>Active</span>
                                </option>
                                <option value="0" <?php if ($category_data['category_status'] == 0) echo "selected"; ?>>
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
