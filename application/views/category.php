<?php if(!$this->input->is_ajax_request()){ ?>
<?php include "templates/header.php"; ?>
<section class="listing_page_section">
<?php } ?>
<div class="container main-container headerOffset">
    <!-- Main component call to action -->
    <div class="row">
        <div class="breadcrumbDiv col-lg-12">
            <ul class="breadcrumb">
                <li><a href="<?php echo base_url(); ?>index.php">Home</a></li>
                <?php
                if(!empty($cat_name)) :
                ?>
                <li class="">
                   <?php echo $cat_name['category_name']; ?>
                </li>
                <?php
                endif;
                ?>
                <?php
                if(!empty($subcategory_name)) :
                ?>
                <li class="">
                    <?php echo $subcategory_name['subcategory_name']; ?>
                </li>
                <?php
                endif;
                ?>  
            </ul>
        </div>
    </div>
    <!-- /.row  -->
    <div class="row">
        <!--left column-->
        <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="panel-group" id="accordionNo">
                <!--Category-->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#collapseCategory" class="collapseWill active ">
                                <span class="pull-left"> 
                                    <i class="fa fa-caret-right"></i>
                                </span> 
                                Category 
                            </a>
                        </h4>
                    </div>
                    <div id="collapseCategory" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <ul class="nav nav-pills nav-stacked tree">
                                <li class="active dropdown-tree open-tree">
                                    <?php
                                    if(!empty($cat_name) && !empty($rec_name)) :
                                    ?> 
                                    <a class="dropdown-tree-a category_section_ajax" data-id="<?php echo $cat_name['category_id']; ?>" href="<?php echo base_url(); ?>products_view/?rec=<?php echo $rec_name['recipient_id']; ?>&cat=<?php echo $cat_name['category_id']; ?>" >
                                        <?php
                                        if(!empty($product_list)) :
                                        ?>
                                        <span class="badge pull-right"><?php echo count($product_list); ?></span>  
                                        <?php
                                        endif;
                                        ?>
                                        <?php echo $cat_name['category_name']; ?> 
                                     </a>
                                    <?php
                                    endif;
                                    ?>
                                    <ul class="category-level-2 dropdown-menu-tree">
                                        <?php
                                        if(!empty($subcategory_list)) :
                                        foreach($subcategory_list as $sub_data) :
                                        ?>
                                        <?php
                                        if($this->input->get('sub') && $this->input->get('sub')==$sub_data['subcategory_id']) {
                                        ?>
                                        <li>
                                            <a id="sub_selected" class="active_sub_cat" data-id="<?php echo $sub_data['subcategory_id']; ?>">
                                                <?php echo $sub_data['subcategory_name']; ?>
                                            </a>
                                        </li>
                                        <?php
                                        }
                                        else
                                        {
                                        ?>
                                        <li>
                                            <a class="subcategory_section_ajax" data-id="<?php echo $sub_data['subcategory_id']; ?>">
                                                <?php echo $sub_data['subcategory_name']; ?>
                                            </a>
                                        </li>
                                        <?php
                                        }
                                        endforeach;
                                        endif;
                                        ?>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--/Category menu end-->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="collapseWill active " data-toggle="collapse" href="#collapsePrice"> Price 
                                <span class="pull-left"> 
                                    <i class="fa fa-caret-right"></i>
                                </span> 
                            </a> 
                            <span class="pull-right clearFilter  label-danger"> Clear </span>
                        </h4>
                    </div>
                    <div id="collapsePrice" class="panel-collapse collapse in">
                        <div class="panel-body priceFilterBody" id="product_list_price_section">
                            <div id="double_number_range"></div>
                            <?php
                            if(!empty($product_list)) :
                                $start_val = current($product_list);
                                $end_val = end($product_list);
            
                                if(!empty($start_val['product_attribute_group_price']) && !empty($end_val['product_attribute_group_price'])) :       
                                    $start_value = $start_val['product_attribute_group_price'];
                                    $end_value = $end_val['product_attribute_group_price'];
                                else :
                                    $start_value = $start_val['product_price'];
                                    $end_value = $end_val['product_price'];
                                endif;
                            ?>
                            <input type="hidden" value="<?php echo $start_value; ?>,<?php echo $end_value; ?>" id="price_range_filter_value" />
                            <?php
                            endif;
                            ?>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default" id="attribute_clone_section">
                <?php
                if(!empty($attribute_list)):
                foreach ($attribute_list as $attr_key => $attr_val) :
                ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#collapseColor" class="collapseWill active "> <?php echo $attr_val['product_attribute']; ?>
                                <span class="pull-left"> 
                                    <i class="fa fa-caret-right"></i>
                                </span> 
                            </a>
                        </h4>
                    </div>
                    <div id="collapseColor" class="panel-collapse collapse in">
                        <div class="panel-body smoothscroll maxheight300 color-filter">
                            <?php
                            foreach ($attr_val['product_attribute_value_id'] as $val_key => $val_data) :
                            ?>
                            <div class="block-element">
                                <label>
                                    <input type="checkbox" name="tour" value="<?php echo $val_key; ?>" class="attribute_section_ajax" />
                                    <?php
                                    if($attr_val['product_attribute']=='color'):
                                    ?>
                                        <small style="background-color:<?php echo $val_data; ?>"></small>
                                    <?php
                                    endif;
                                    ?>
                                    <?php echo $val_data; ?>
                                    <!-- <span>(123)</span>  -->
                                </label>
                            </div>
                            <?php
                            endforeach;
                            ?>
                        </div>
                    </div>
                </div>
                <?php
                endforeach;
                endif;
                ?>  
                </div>           
            </div>
        </div>

        <!--right column-->
        <div class="col-lg-9 col-md-9 col-sm-12">
            <div class="w100 clearfix category-top">
                <?php
                if(!empty($rec_name)) :
                ?>
                <h2> 
                    <a class="recipient_section_ajax" data-id="<?php echo $rec_name['recipient_id']; ?>" href="<?php echo base_url(); ?>recipient_category/<?php echo $rec_name['recipient_id']; ?>" >
                        <?php echo strtoupper($rec_name['recipient_type']); ?> COLLECTION 
                    </a>
                </h2>
                <?php
                endif;
                ?>
                <div class="categoryImage"><img src="<?php echo base_url(); ?>assets/img/site/category.jpg" class="img-responsive" alt="img"></div>
            </div>
            <!--/.category-top-->

            <div class="row subCategoryList clearfix">
                <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4  text-center ">
                    <div class="thumbnail equalheight"><a class="subCategoryThumb" href="sub-<?php echo base_url(); ?>category"><img
                            src="<?php echo base_url(); ?>assets/img/product/3.jpg" class="img-rounded " alt="img"> </a> <a class="subCategoryTitle"><span> T shirt </span></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4  text-center">
                    <div class="thumbnail equalheight"><a class="subCategoryThumb" href="sub-<?php echo base_url(); ?>category"><img
                            src="<?php echo base_url(); ?>assets/img/site/casual.jpg" class="img-rounded " alt="img"> </a> <a
                            class="subCategoryTitle"><span> Shirt </span></a></div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4  text-center">
                    <div class="thumbnail equalheight"><a class="subCategoryThumb" href="sub-<?php echo base_url(); ?>category"><img
                            src="<?php echo base_url(); ?>assets/img/site/shoe.jpg" class="img-rounded " alt="img"> </a> <a class="subCategoryTitle"><span> shoes </span></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4  text-center">
                    <div class="thumbnail equalheight"><a class="subCategoryThumb" href="sub-<?php echo base_url(); ?>category"><img
                            src="<?php echo base_url(); ?>assets/img/site/jewelry.jpg" class="img-rounded " alt="img"> </a> <a
                            class="subCategoryTitle"><span> Accessories </span></a></div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4  text-center">
                    <div class="thumbnail equalheight"><a class="subCategoryThumb" href="sub-<?php echo base_url(); ?>category"><img
                            src="<?php echo base_url(); ?>assets/img/site/winter.jpg" class="img-rounded  " alt="img"> </a> <a
                            class="subCategoryTitle"><span> Winter Collection </span></a></div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4  text-center">
                    <div class="thumbnail equalheight"><a class="subCategoryThumb" href="sub-<?php echo base_url(); ?>category"><img
                            src="<?php echo base_url(); ?>assets/img/site/Male-Fragrances.jpg" class="img-rounded " alt="img"> </a> <a
                            class="subCategoryTitle"><span> Fragrances </span></a></div>
                </div>
            </div>
            <!--/.subCategoryList-->

            <div class="w100 productFilter clearfix">
                <p class="pull-left"> Showing <strong>12</strong> products </p>

                <div class="pull-right ">
                    <div class="change-order pull-right">
                        <select class="form-control" name="orderby">
                            <option selected="selected">Default sorting</option>
                            <option value="popularity">Sort by popularity</option>
                            <option value="rating">Sort by average rating</option>
                            <option value="date">Sort by newness</option>
                            <option value="price">Sort by price: low to high</option>
                            <option value="price-desc">Sort by price: high to low</option>
                        </select>
                    </div>
                    <div class="change-view pull-right"><a href="#" title="Grid" class="grid-view"> <i
                            class="fa fa-th-large"></i> </a> <a href="#" title="List" class="list-view "><i
                            class="fa fa-th-list"></i></a></div>
                </div>
            </div>
            <!--/.productFilter-->
            <div class="row  categoryProduct xsResponse clearfix"> 

                <?php
                if(!empty($product_list)) :
                foreach ($product_list as $pro_val) :
                ?>
                <div class="item col-sm-4 col-lg-4 col-md-4 col-xs-6">
                    <div class="product">
                        <a class="add-fav tooltipHere" data-toggle="tooltip" data-original-title="Add to Wishlist" data-placement="left">
                            <i class="glyphicon glyphicon-heart"></i>
                        </a>
                        <div class="image product_images">
                            <a href="#">
                                <img src="<?php echo base_url().$pro_val['product_upload_image']; ?>"  alt="img" class="img-responsive images_alignment">
                            </a>
                            <div class="product_name">
                                <a href="<?php echo base_url(); ?>product_details/<?php echo $pro_val['product_id']; ?>">
                                    <?php echo $pro_val['product_title']; ?>
                                </a>
                            </div>
                        </div>
                        <div class="description">
                            <h4>
                                <a href="<?php echo base_url(); ?>product_details/<?php echo $pro_val['product_id']; ?>"><?php echo $pro_val['product_title']; ?> </a>
                            </h4>
                            <p> <?php echo $pro_val['product_description']; ?> </p>
                        </div>
                        <div class="price">
                            <span> &#8377; 
                            <?php 
                            if(!empty($pro_val['product_attribute_group_price'])) :       
                                echo $pro_val['product_attribute_group_price'];
                            else :
                                echo $pro_val['product_price'];
                            endif;
                           ?> 
                           </span>
                        </div>
                        <div class="action-control">
                            <a data-toggle="modal" class="btn btn-primary add_to_cart_popup" href="#" data-target="#productSetailsModalAjax" data-pro_id="<?php echo $pro_val['product_id']; ?>"> 
                                <span class="add2cart">
                                    <i class="glyphicon glyphicon-shopping-cart"> </i> Add to cart 
                                </span> 
                            </a>
                        </div>
                    </div>
                </div>
                <!--/.item-->

                <?php
                endforeach;
                endif;
                ?>



            </div>
            <!--/.categoryProduct || product content end-->

            <div class="w100 categoryFooter">
                <div class="pagination pull-left no-margin-top">
                    <ul class="pagination no-margin-top">
                        <li><a href="#">«</a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">»</a></li>
                    </ul>
                </div>
                <div class="pull-right pull-right col-sm-4 col-xs-12 no-padding text-right text-left-xs">
                    <p>Showing 1–450 of 12 results</p>
                </div>
            </div>
            <!--/.categoryFooter-->
        </div>
        <!--/right column end-->
    </div>
    <!-- /.row  -->
</div>
<!-- /main container -->

<div class="gap"></div>

<!-- Product Details Modal  -->
<div class="modal fade" id="productSetailsModalAjax" tabindex="-1" role="dialog" aria-labelledby="productSetailsModalAjaxLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" id="model_content_section">

        </div> <!-- /.modal-content -->
    </div> <!-- /.modal-dialog -->
</div> <!-- /.modal -->
<?php if(!$this->input->is_ajax_request()){ ?>
</section>
<?php include "templates/footer.php"; ?>
<?php } ?>