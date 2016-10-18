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
            <a href="#">Add Category</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Add Category</h2>

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
                <form role="form" method="POST" action="<?php echo base_url(); ?>index.php/admin/adminindex/add_category" enctype="multipart/form-data" class="form_submit" name="category_form">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Category Name<span class="fill_symbol"> *</span></label>
                        <input type="text" class="form-control" id="category_name" placeholder="Enter Category Name" name="category_name" value="<?php echo set_value('category_name');?>">
                    </div>  
                    <div class="form-group">
                        <label for="exampleInputFile">Category Image<span class="fill_symbol"> *</span></label>
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
