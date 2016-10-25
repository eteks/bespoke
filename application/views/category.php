<?php include "templates/header.php"; ?>
<div class="container main-container headerOffset">
    <!-- Main component call to action -->
    <div class="row">
        <div class="breadcrumbDiv col-lg-12">
            <ul class="breadcrumb">
                <li><a href="index.php">Home</a></li>
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
                                    if(!empty($cat_name)) :
                                    ?> 
                                    <a class="dropdown-tree-a" href="<?php echo base_url(); ?>products_view/?rec=<?php echo $this->input->get('rec'); ?>&cat=<?php echo $this->input->get('cat'); ?>" >
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
                                        <li class="active_sub_cat">
                                            <a href="<?php echo base_url(); ?>products_view/?rec=<?php echo $sub_data['recipient_mapping_id']; ?>&cat=<?php echo $sub_data['category_mapping_id']; ?>&sub=<?php echo $sub_data['subcategory_id']; ?>">
                                                <?php echo $sub_data['subcategory_name']; ?>
                                            </a>
                                        </li>
                                        <?php
                                        }
                                        else
                                        {
                                        ?>
                                        <li>
                                            <a href="<?php echo base_url(); ?>products_view/?rec=<?php echo $sub_data['recipient_mapping_id']; ?>&cat=<?php echo $sub_data['category_mapping_id']; ?>&sub=<?php echo $sub_data['subcategory_id']; ?>">
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
                        <div class="panel-body priceFilterBody">
                            <div id="double_number_range"></div>
                            <?php
                            if(!empty($product_list)) :
                                $start_value = current($product_list)['product_price'];
                                $end_value = end($product_list)['product_price'];
                            ?>
                            <input type="hidden" value="<?php echo $start_value; ?>,<?php echo $end_value; ?>" id="price_range_filter_value" />
                            <?php
                            endif;
                            ?>
                           <!--  <hr>
                            <p>Enter a Price range </p>
                            <form class="form-inline " role="form">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="exampleInputEmail2"
                                           placeholder="2000 $">
                                </div>
                                <div class="form-group sp"> -</div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="exampleInputPassword2"
                                           placeholder="3000 $">
                                </div>
                                <button type="submit" class="btn btn-default pull-right">check</button>
                            </form> -->
                        </div>
                    </div>
                </div>
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
                                    <input type="checkbox" name="tour" value="0"  data-attr_id="<?php echo $attr_key; ?>" data-val_id="<?php echo $val_key; ?>" />
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

        <!--right column-->
        <div class="col-lg-9 col-md-9 col-sm-12">
            <div class="w100 clearfix category-top">
                <?php
                if(!empty($rec_name)) :
                ?>
                <h2> <?php echo strtoupper($rec_name['recipient_type']); ?> COLLECTION </h2>
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
                <div class="item col-sm-4 col-lg-4 col-md-4 col-xs-6">
                    <div class="product">
                        <a class="add-fav tooltipHere" data-toggle="tooltip" data-original-title="Add to Wishlist"
                           data-placement="left">
                            <i class="glyphicon glyphicon-heart"></i>
                        </a>
                       <div class="image product_images">
                            <a href="<?php echo base_url(); ?>product_details"><img src="<?php echo base_url(); ?>assets/img/product/30.jpg" alt="img" class="img-responsive images_alignment"></a>
							<div class="product_name"><a><span>Product Name</span></a></div>
                        </div>
                        <div class="description">
                            <h4><a href="<?php echo base_url(); ?>product_details">aliquam erat volutpat</a></h4>

                            <div class="grid-description">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                            </div>
                            <div class="list-description">
                                <p> Sed sed rutrum purus. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Pellentesque risus lacus, iaculis in ante vitae, viverra hendrerit ante. Aliquam vel
                                    fermentum elit. Morbi rhoncus, neque in vulputate facilisis, leo tortor sollicitudin
                                    odio, quis pellentesque lorem nisi quis enim. In dolor mi, hendrerit at blandit
                                    vulputate, congue a purus. Sed eget turpis sit amet orci euismod accumsan. Praesent
                                    sit amet placerat elit. </p>
                            </div>
                            <span class="size">XL / XXL / S </span></div>
                        <div class="price"><span>$25</span></div>
                        <div class="action-control"><a data-toggle="modal" class="btn btn-primary" data-target="#productSetailsModalAjax"> <span class="add2cart"><i class="glyphicon glyphicon-shopping-cart"> </i> Add to cart </span> </a></div>
                    </div>
                </div>
                <!--/.item-->
                <div class="item col-sm-4 col-lg-4 col-md-4 col-xs-6">
                    <div class="product">
                        <a class="add-fav tooltipHere" data-toggle="tooltip" data-original-title="Add to Wishlist"
                           data-placement="left">
                            <i class="glyphicon glyphicon-heart"></i>
                        </a>

                        <div class="image product_images">
                            <a href="<?php echo base_url(); ?>product_details"><img src="<?php echo base_url(); ?>assets/img/product/31.jpg" alt="img"
                                                                class="img-responsive images_alignment"></a>
                            <div class="product_name"><a><span>Product Name</span></a></div>
                        </div>
                        <div class="description">
                            <h4><a href="<?php echo base_url(); ?>product_details">ullamcorper suscipit lobortis </a></h4>

                            <div class="grid-description">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                            </div>
                            <div class="list-description">
                                <p> Sed sed rutrum purus. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Pellentesque risus lacus, iaculis in ante vitae, viverra hendrerit ante. Aliquam vel
                                    fermentum elit. Morbi rhoncus, neque in vulputate facilisis, leo tortor sollicitudin
                                    odio, quis pellentesque lorem nisi quis enim. In dolor mi, hendrerit at blandit
                                    vulputate, congue a purus. Sed eget turpis sit amet orci euismod accumsan. Praesent
                                    sit amet placerat elit. </p>
                            </div>
                            <span class="size">XL / XXL / S </span></div>
                        <div class="price"><span>$25</span></div>
                        <div class="action-control"><a data-toggle="modal" class="btn btn-primary" data-target="#productSetailsModalAjax"> <span class="add2cart"><i class="glyphicon glyphicon-shopping-cart"> </i> Add to cart </span> </a></div>
                    </div>
                </div>
                <!--/.item-->
                <div class="item col-sm-4 col-lg-4 col-md-4 col-xs-6">
                    <div class="product">
                        <a class="add-fav tooltipHere" data-toggle="tooltip" data-original-title="Add to Wishlist"
                           data-placement="left">
                            <i class="glyphicon glyphicon-heart"></i>
                        </a>

                        <div class="image product_images">
                            <a href="<?php echo base_url(); ?>product_details"><img src="<?php echo base_url(); ?>assets/img/product/34.jpg" alt="img"
                                                                class="img-responsive images_alignment"></a>
                            <div class="product_name"><a><span>Product Name</span></a></div>
                        </div>
                        <div class="description">
                            <h4><a href="<?php echo base_url(); ?>product_details">demonstraverunt lectores </a></h4>

                            <div class="grid-description">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                            </div>
                            <div class="list-description">
                                <p> Sed sed rutrum purus. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Pellentesque risus lacus, iaculis in ante vitae, viverra hendrerit ante. Aliquam vel
                                    fermentum elit. Morbi rhoncus, neque in vulputate facilisis, leo tortor sollicitudin
                                    odio, quis pellentesque lorem nisi quis enim. In dolor mi, hendrerit at blandit
                                    vulputate, congue a purus. Sed eget turpis sit amet orci euismod accumsan. Praesent
                                    sit amet placerat elit. </p>
                            </div>
                            <span class="size">XL / XXL / S </span></div>
                        <div class="price"><span>$25</span> <span class="old-price">$75</span></div>
                        <div class="action-control"><a data-toggle="modal" class="btn btn-primary" data-target="#productSetailsModalAjax"> <span class="add2cart"><i class="glyphicon glyphicon-shopping-cart"> </i> Add to cart </span> </a></div>
                    </div>
                </div>
                <!--/.item-->
                <div class="item col-sm-4 col-lg-4 col-md-4 col-xs-6">
                    <div class="product">
                        <a class="add-fav tooltipHere" data-toggle="tooltip" data-original-title="Add to Wishlist"
                           data-placement="left">
                            <i class="glyphicon glyphicon-heart"></i>
                        </a>

                        <div class="image product_images">
                            <a href="<?php echo base_url(); ?>product_details"><img src="<?php echo base_url(); ?>assets/img/product/35.jpg" alt="img"
                                                                class="img-responsive images_alignment"></a>
                        	<div class="product_name"><a><span>Product Name</span></a></div>
                        </div>
                        <div class="description">
                            <h4><a href="<?php echo base_url(); ?>product_details">humanitatis per</a></h4>

                            <div class="grid-description">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                            </div>
                            <div class="list-description">
                                <p> Sed sed rutrum purus. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Pellentesque risus lacus, iaculis in ante vitae, viverra hendrerit ante. Aliquam vel
                                    fermentum elit. Morbi rhoncus, neque in vulputate facilisis, leo tortor sollicitudin
                                    odio, quis pellentesque lorem nisi quis enim. In dolor mi, hendrerit at blandit
                                    vulputate, congue a purus. Sed eget turpis sit amet orci euismod accumsan. Praesent
                                    sit amet placerat elit. </p>
                            </div>
                            <span class="size">XL / XXL / S </span></div>
                        <div class="price"><span>$25</span></div>
                        <div class="action-control"><a data-toggle="modal" class="btn btn-primary" data-target="#productSetailsModalAjax"> <span class="add2cart"><i class="glyphicon glyphicon-shopping-cart"> </i> Add to cart </span> </a></div>
                    </div>
                </div>
                <!--/.item-->
                <div class="item col-sm-4 col-lg-4 col-md-4 col-xs-6">
                    <div class="product">
                        <a class="add-fav tooltipHere" data-toggle="tooltip" data-original-title="Add to Wishlist"
                           data-placement="left">
                            <i class="glyphicon glyphicon-heart"></i>
                        </a>

                        <div class="image product_images">
                            <a href="<?php echo base_url(); ?>product_details"><img src="<?php echo base_url(); ?>assets/img/product/33.jpg" alt="img"
                                                                class="img-responsive images_alignment"></a>
                     		<div class="product_name"><a><span>Product Name</span></a></div>
                         </div>
                        <div class="description">
                            <h4><a href="<?php echo base_url(); ?>product_details">Eodem modo typi</a></h4>

                            <div class="grid-description">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                            </div>
                            <div class="list-description">
                                <p> Sed sed rutrum purus. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Pellentesque risus lacus, iaculis in ante vitae, viverra hendrerit ante. Aliquam vel
                                    fermentum elit. Morbi rhoncus, neque in vulputate facilisis, leo tortor sollicitudin
                                    odio, quis pellentesque lorem nisi quis enim. In dolor mi, hendrerit at blandit
                                    vulputate, congue a purus. Sed eget turpis sit amet orci euismod accumsan. Praesent
                                    sit amet placerat elit. </p>
                            </div>
                            <span class="size">XL / XXL / S </span></div>
                        <div class="price"><span>$25</span></div>
                        <div class="action-control"><a data-toggle="modal" class="btn btn-primary" data-target="#productSetailsModalAjax"> <span class="add2cart"><i class="glyphicon glyphicon-shopping-cart"> </i> Add to cart </span> </a></div>
                    </div>
                </div>
                <!--/.item-->
                <div class="item col-sm-4 col-lg-4 col-md-4 col-xs-6">
                    <div class="product">
                        <a class="add-fav tooltipHere" data-toggle="tooltip" data-original-title="Add to Wishlist"
                           data-placement="left">
                            <i class="glyphicon glyphicon-heart"></i>
                        </a>

                        <div class="image product_images">
                            <a href="<?php echo base_url(); ?>product_details"><img src="<?php echo base_url(); ?>assets/img/product/10.jpg" alt="img"
                                                                class="img-responsive images_alignment"></a>
                        	<div class="product_name"><a><span>Product Name</span></a></div>
                        </div>
                        <div class="description">
                            <h4><a href="<?php echo base_url(); ?>product_details">sequitur mutationem </a></h4>

                            <div class="grid-description">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                            </div>
                            <div class="list-description">
                                <p> Sed sed rutrum purus. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Pellentesque risus lacus, iaculis in ante vitae, viverra hendrerit ante. Aliquam vel
                                    fermentum elit. Morbi rhoncus, neque in vulputate facilisis, leo tortor sollicitudin
                                    odio, quis pellentesque lorem nisi quis enim. In dolor mi, hendrerit at blandit
                                    vulputate, congue a purus. Sed eget turpis sit amet orci euismod accumsan. Praesent
                                    sit amet placerat elit. </p>
                            </div>
                            <span class="size">XL / XXL / S </span></div>
                        <div class="price"><span>$25</span></div>
                        <div class="action-control"><a data-toggle="modal" class="btn btn-primary" data-target="#productSetailsModalAjax"> <span class="add2cart"><i class="glyphicon glyphicon-shopping-cart"> </i> Add to cart </span> </a></div>
                    </div>
                </div>
                <!--/.item-->
                <div class="item col-sm-4 col-lg-4 col-md-4 col-xs-6">
                    <div class="product">
                        <a class="add-fav tooltipHere" data-toggle="tooltip" data-original-title="Add to Wishlist"
                           data-placement="left">
                            <i class="glyphicon glyphicon-heart"></i>
                        </a>

                        <div class="image product_images">
                            <a href="<?php echo base_url(); ?>product_details"><img src="<?php echo base_url(); ?>assets/img/product/37.jpg" alt="img"
                                                                class="img-responsive images_alignment"></a>
                        	<div class="product_name"><a><span>Product Name</span></a></div>
                        </div>
                        <div class="description">
                            <h4><a href="<?php echo base_url(); ?>product_details">consuetudium lectorum.</a></h4>

                            <div class="grid-description">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                            </div>
                            <div class="list-description">
                                <p> Sed sed rutrum purus. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Pellentesque risus lacus, iaculis in ante vitae, viverra hendrerit ante. Aliquam vel
                                    fermentum elit. Morbi rhoncus, neque in vulputate facilisis, leo tortor sollicitudin
                                    odio, quis pellentesque lorem nisi quis enim. In dolor mi, hendrerit at blandit
                                    vulputate, congue a purus. Sed eget turpis sit amet orci euismod accumsan. Praesent
                                    sit amet placerat elit. </p>
                            </div>
                            <span class="size">XL / XXL / S </span></div>
                        <div class="price"><span>$25</span> <span class="old-price">$75</span></div>
                        <div class="action-control"><a data-toggle="modal" class="btn btn-primary" data-target="#productSetailsModalAjax"> <span class="add2cart"><i class="glyphicon glyphicon-shopping-cart"> </i> Add to cart </span> </a></div>
                    </div>
                </div>
                <!--/.item-->
                <div class="item col-sm-4 col-lg-4 col-md-4 col-xs-6">
                    <div class="product">
                        <a class="add-fav tooltipHere" data-toggle="tooltip" data-original-title="Add to Wishlist"
                           data-placement="left">
                            <i class="glyphicon glyphicon-heart"></i>
                        </a>

                        <div class="image product_images">
                            <a href="<?php echo base_url(); ?>product_details"><img src="<?php echo base_url(); ?>assets/img/product/16.jpg" alt="img"
                                                                class="img-responsive images_alignment"></a>
                        	<div class="product_name"><a><span>Product Name</span></a></div>
                        </div>
                        <div class="description">
                            <h4><a href="<?php echo base_url(); ?>product_details">parum claram</a></h4>

                            <div class="grid-description">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                            </div>
                            <div class="list-description">
                                <p> Sed sed rutrum purus. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Pellentesque risus lacus, iaculis in ante vitae, viverra hendrerit ante. Aliquam vel
                                    fermentum elit. Morbi rhoncus, neque in vulputate facilisis, leo tortor sollicitudin
                                    odio, quis pellentesque lorem nisi quis enim. In dolor mi, hendrerit at blandit
                                    vulputate, congue a purus. Sed eget turpis sit amet orci euismod accumsan. Praesent
                                    sit amet placerat elit. </p>
                            </div>
                            <span class="size">XL / XXL / S </span></div>
                        <div class="price"><span>$25</span> <span class="old-price">$75</span></div>
                        <div class="action-control"><a data-toggle="modal" class="btn btn-primary" data-target="#productSetailsModalAjax"> <span class="add2cart"><i class="glyphicon glyphicon-shopping-cart"> </i> Add to cart </span> </a></div>
                    </div>
                </div>
                <!--/.item-->
                <div class="item col-sm-4 col-lg-4 col-md-4 col-xs-6">
                    <div class="product">
                        <a class="add-fav tooltipHere" data-toggle="tooltip" data-original-title="Add to Wishlist"
                           data-placement="left">
                            <i class="glyphicon glyphicon-heart"></i>
                        </a>

                        <div class="image product_images">
                            <a href="<?php echo base_url(); ?>product_details"><img src="<?php echo base_url(); ?>assets/img/product/19.jpg" alt="img"
                                                                class="img-responsive images_alignment"></a>
                        	<div class="product_name"><a><span>Product Name</span></a></div>
                        </div>
                        <div class="description">
                            <h4><a href="<?php echo base_url(); ?>product_details">duis dolore </a></h4>

                            <div class="grid-description">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                            </div>
                            <div class="list-description">
                                <p> Sed sed rutrum purus. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Pellentesque risus lacus, iaculis in ante vitae, viverra hendrerit ante. Aliquam vel
                                    fermentum elit. Morbi rhoncus, neque in vulputate facilisis, leo tortor sollicitudin
                                    odio, quis pellentesque lorem nisi quis enim. In dolor mi, hendrerit at blandit
                                    vulputate, congue a purus. Sed eget turpis sit amet orci euismod accumsan. Praesent
                                    sit amet placerat elit. </p>
                            </div>
                            <span class="size">XL / XXL / S </span></div>
                        <div class="price"><span>$25</span></div>
                        <div class="action-control"><a data-toggle="modal" class="btn btn-primary" data-target="#productSetailsModalAjax"> <span class="add2cart"><i class="glyphicon glyphicon-shopping-cart"> </i> Add to cart </span> </a></div>
                    </div>
                </div>
                <!--/.item-->
                <div class="item col-sm-4 col-lg-4 col-md-4 col-xs-6">
                    <div class="product">
                        <a class="add-fav tooltipHere" data-toggle="tooltip" data-original-title="Add to Wishlist"
                           data-placement="left">
                            <i class="glyphicon glyphicon-heart"></i>
                        </a>

                        <div class="image product_images">
                            <a href="<?php echo base_url(); ?>product_details"><img src="<?php echo base_url(); ?>assets/img/product/15.jpg" alt="img"
                                                                class="img-responsive images_alignment"></a>
                            <div class="product_name"><a><span>Product Name</span></a></div>
                        </div>
                        <div class="description">
                            <h4><a href="<?php echo base_url(); ?>product_details">aliquam erat volutpat</a></h4>

                            <div class="grid-description">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                            </div>
                            <div class="list-description">
                                <p> Sed sed rutrum purus. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Pellentesque risus lacus, iaculis in ante vitae, viverra hendrerit ante. Aliquam vel
                                    fermentum elit. Morbi rhoncus, neque in vulputate facilisis, leo tortor sollicitudin
                                    odio, quis pellentesque lorem nisi quis enim. In dolor mi, hendrerit at blandit
                                    vulputate, congue a purus. Sed eget turpis sit amet orci euismod accumsan. Praesent
                                    sit amet placerat elit. </p>
                            </div>
                            <span class="size">XL / XXL / S </span></div>
                        <div class="price"><span>$25</span></div>
                        <div class="action-control"><a data-toggle="modal" class="btn btn-primary" data-target="#productSetailsModalAjax"> <span class="add2cart"><i class="glyphicon glyphicon-shopping-cart"> </i> Add to cart </span> </a></div>
                    </div>
                </div>
                <!--/.item-->
                <div class="item col-sm-4 col-lg-4 col-md-4 col-xs-6">
                    <div class="product">
                        <a class="add-fav tooltipHere" data-toggle="tooltip" data-original-title="Add to Wishlist"
                           data-placement="left">
                            <i class="glyphicon glyphicon-heart"></i>
                        </a>

                        <div class="image product_images">
                            <a href="<?php echo base_url(); ?>product_details"><img src="<?php echo base_url(); ?>assets/img/product/14.jpg" alt="img"
                                                                class="img-responsive images_alignment"></a>
                            <div class="product_name"><a><span>Product Name</span></a></div>
                        </div>
                        <div class="description">
                            <h4><a href="<?php echo base_url(); ?>product_details">ullamcorper suscipit lobortis </a></h4>

                            <div class="grid-description">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                            </div>
                            <div class="list-description">
                                <p> Sed sed rutrum purus. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Pellentesque risus lacus, iaculis in ante vitae, viverra hendrerit ante. Aliquam vel
                                    fermentum elit. Morbi rhoncus, neque in vulputate facilisis, leo tortor sollicitudin
                                    odio, quis pellentesque lorem nisi quis enim. In dolor mi, hendrerit at blandit
                                    vulputate, congue a purus. Sed eget turpis sit amet orci euismod accumsan. Praesent
                                    sit amet placerat elit. </p>
                            </div>
                            <span class="size">XL / XXL / S </span></div>
                        <div class="price"><span>$25</span></div>
                        <div class="action-control"><a data-toggle="modal" class="btn btn-primary" data-target="#productSetailsModalAjax"> <span class="add2cart"><i class="glyphicon glyphicon-shopping-cart"> </i> Add to cart </span> </a></div>
                    </div>
                </div>
                <!--/.item-->
                <div class="item col-sm-4 col-lg-4 col-md-4 col-xs-6">
                    <div class="product">
                        <a class="add-fav tooltipHere" data-toggle="tooltip" data-original-title="Add to Wishlist"
                           data-placement="left">
                            <i class="glyphicon glyphicon-heart"></i>
                        </a>

                        <div class="image product_images">
                            <a href="<?php echo base_url(); ?>product_details"><img src="<?php echo base_url(); ?>assets/img/product/17.jpg" alt="img"
                                                                class="img-responsive images_alignment"></a>
                            <div class="product_name"><a><span>Product Name</span></a></div>
                        </div>
                        <div class="description">
                            <h4><a href="<?php echo base_url(); ?>product_details">demonstraverunt lectores </a></h4>

                            <div class="grid-description">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                            </div>
                            <div class="list-description">
                                <p> Sed sed rutrum purus. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Pellentesque risus lacus, iaculis in ante vitae, viverra hendrerit ante. Aliquam vel
                                    fermentum elit. Morbi rhoncus, neque in vulputate facilisis, leo tortor sollicitudin
                                    odio, quis pellentesque lorem nisi quis enim. In dolor mi, hendrerit at blandit
                                    vulputate, congue a purus. Sed eget turpis sit amet orci euismod accumsan. Praesent
                                    sit amet placerat elit. </p>
                            </div>
                            <span class="size">XL / XXL / S </span></div>
                        <div class="price"><span>$25</span></div>
                        <div class="action-control"><a data-toggle="modal" class="btn btn-primary" data-target="#productSetailsModalAjax"> <span class="add2cart"><i class="glyphicon glyphicon-shopping-cart"> </i> Add to cart </span> </a></div>
                    </div>
                </div>
                <!--/.item-->
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
<div class="modal fade" id="productSetailsModalAjax" tabindex="-1" role="dialog"
     aria-labelledby="productSetailsModalAjaxLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <button aria-hidden="true" data-dismiss="modal" class="close" type="button"> ×</button>
<div class="col-lg-5 col-md-5 col-sm-5  col-xs-12">

    <!-- product Image -->

    <div class="main-image  col-lg-12 no-padding style3">
        <a class="product-largeimg-link" href="<?php echo base_url(); ?>product_details"><img
                src="<?php echo base_url(); ?>assets/img/product_details/low-res-white/1.jpg"
                class="img-responsive product-largeimg"
                alt="img">
        </a>
    </div>
    <!--/.main-image-->

    <div class="modal-product-thumb">
        <a class="thumbLink selected"><img data-large="<?php echo base_url(); ?>assets/img/product_details/low-res-white/1.jpg" alt="img"
                                           class="img-responsive" src="<?php echo base_url(); ?>assets/img/product_details/low-res-white/1.jpg">
        </a>
        <a class="thumbLink"><img data-large="<?php echo base_url(); ?>assets/img/product_details/low-res-white/2.jpg" alt="img"
                                  class="img-responsive"
                                  src="<?php echo base_url(); ?>assets/img/product_details/low-res-white/2.jpg">
        </a>
        <a class="thumbLink"><img data-large="<?php echo base_url(); ?>assets/img/product_details/low-res-white/3.jpg" alt="img"
                                  class="img-responsive"
                                  src="<?php echo base_url(); ?>assets/img/product_details/low-res-white/3.jpg">
        </a>
    </div>
    <!--/.modal-product-thumb-->
</div>
<!--/ product Image-->


<div class="col-lg-7 col-md-7 col-sm-7 col-xs-12 modal-details no-padding">
    <div class="modal-details-inner">
        <h1 class="product-title"> Lorem ipsum dolor sit amet</h2>

            <h3 class="product-code">Product Code : DEN1098</h3>

            <div class="product-price"><span class="price-sales"> $70</span> <span
                    class="price-standard">$95</span></div>
            <div class="details-description">
                <p>In scelerisque libero ut elit porttitor commodo Suspendisse laoreet magna. </p>
            </div>
            <div class="color-details"><span class="selected-color"><strong>COLOR</strong></span>
                <ul class="swatches Color">
                    <li class="selected">
                        <a style="background-color:#f1f40e"> </a>
                    </li>
                    <li>
                        <a style="background-color:#adadad"> </a>
                    </li>
                    <li>
                        <a style="background-color:#4EC67F"> </a>
                    </li>
                </ul>
            </div>
            <!--/.color-details-->

            <div class="productFilter productFilterLook2">
                <div class="row">
                    <div class="col-lg-6 col-sm-6 col-xs-6">
                        <div class="filterBox">
                            <select class="form-control">
                                <option value="strawberries" selected>Quantity</option>
                                <option value="mango">1</option>
                                <option value="bananas">2</option>
                                <option value="watermelon">3</option>
                                <option value="grapes">4</option>
                                <option value="oranges">5</option>
                                <option value="pineapple">6</option>
                                <option value="peaches">7</option>
                                <option value="cherries">8</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-xs-6">
                        <div class="filterBox">
                            <select class="form-control">
                                <option value="strawberries" selected>Size</option>
                                <option value="mango">XL</option>
                                <option value="bananas">XXL</option>
                                <option value="watermelon">M</option>
                                <option value="apples">L</option>
                                <option value="apples">S</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <!-- productFilter -->
            <div class="cart-actions">
                <div class="addto row">
                    <div class="col-lg-6">
                        <button onclick="productAddToCartForm.submit(this);"
                                class="button btn-block btn-cart cart first" title="Add to Cart"
                                type="button">
                            Add to Cart
                        </button>
                    </div>
                    <div class="col-lg-6"><a class="link-wishlist wishlist btn-block ">Add to Wishlist</a>
                    </div>
                </div>
            </div>
            <!--/.cart-actions-->

            <div class="product-share clearfix">
                <p> SHARE </p>

                <div class="socialIcon">
                    <a href="#"> <i class="fa fa-facebook"></i>
                    </a>
                    <a href="#"> <i class="fa fa-twitter"></i>
                    </a>
                    <a href="#"> <i class="fa fa-google-plus"></i>
                    </a>
                    <a href="#"> <i class="fa fa-pinterest"></i>
                    </a>
                </div>
            </div>
            <!--/.product-share-->
    </div>
    <!--/.modal-details-inner-->
</div>
<!--/.modal-details-->
<div class="clear"></div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?php include "templates/footer.php"; ?>
