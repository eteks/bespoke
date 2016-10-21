<?php include "templates/header.php"; ?>
<div class="container main-container headerOffset">
    <!-- Main component call to action -->
    <div class="row">
        <div class="breadcrumbDiv col-lg-12">
            <ul class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li><a href="<?php echo base_url(); ?>category">WOMEN COLLECTION</a></li>
                <li class="active">TSHIRT</li>
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
                                <span class="pull-left"> <i class="fa fa-caret-right"></i></span> Category
                            </a>
                        </h4>
                    </div>
                    <div id="collapseCategory" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <ul class="nav nav-pills nav-stacked tree">
                                <li class="active dropdown-tree open-tree"><a class="dropdown-tree-a"> <span
                                        class="badge pull-right">42</span> WOMEN COLLECTION </a>
                                    <ul class="category-level-2 dropdown-menu-tree">
                                        <li class="dropdown-tree open-tree"><a class="dropdown-tree-a" href="#">
                                            Tshirt</a>
                                            <ul class="category-level-2 dropdown-menu-tree">
                                                <li><a href="sub-<?php echo base_url(); ?>category">New</a></li>
                                                <li><a href="sub-<?php echo base_url(); ?>category">Denim</a></li>
                                                <li><a href="sub-<?php echo base_url(); ?>category">Fragrances</a></li>
                                                <li><a href="sub-<?php echo base_url(); ?>category">Scarf</a></li>
                                                <li><a href="sub-<?php echo base_url(); ?>category">Sandal</a></li>
                                                <li><a href="sub-<?php echo base_url(); ?>category">Winter Collection</a></li>
                                                <li><a href="sub-<?php echo base_url(); ?>category"> Accessories</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="sub-<?php echo base_url(); ?>category"> Shirt</a></li>
                                        <li><a href="sub-<?php echo base_url(); ?>category"> Fragrances</a></li>
                                        <li><a href="sub-<?php echo base_url(); ?>category">Scarf</a></li>
                                        <li><a href="sub-<?php echo base_url(); ?>category">Sandal</a></li>
                                        <li><a href="sub-<?php echo base_url(); ?>category">Winter Collection</a></li>
                                        <li><a href="sub-<?php echo base_url(); ?>category">Men Accessories</a></li>
                                    </ul>
                                </li>
                                <li><a href="#"> <span class="badge pull-right">42</span> MEN COLLECTION </a></li>
                                <li><a href="#"> <span class="badge pull-right">42</span> Baby & Kids </a></li>
                                <li><a href="#"> <span class="badge pull-right">42</span> Home & Kitchen </a></li>
                                <li><a href="#"> <span class="badge pull-right">42</span> Baby & Kids </a></li>
                                <li><a href="#"> <span class="badge pull-right">42</span> More Stores </a></li>
                                <li><a href="#"> <span class="badge pull-right">42</span> Offers Zone </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--/Category menu end-->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"><a class="collapseWill active " data-toggle="collapse"
                                                   href="#collapsePrice">
                            Price <span class="pull-left"> <i class="fa fa-caret-right"></i></span> </a> <span
                                class="pull-right clearFilter  label-danger"> Clear </span></h4>
                    </div>
                    <div id="collapsePrice" class="panel-collapse collapse in">
                        <div class="panel-body priceFilterBody">
                            <!-- -->
                            <label>
                                <input type="radio" name="agree" value="0"/>
                                100$ - 500$</label>
                            <br>
                            <label>
                                <input type="radio" name="agree" value="1"/>
                                500$ - 1000$</label>
                            <br>
                            <label>
                                <input type="radio" name="agree" value="2"/>
                                1000$ - 1500$</label>
                            <br>
                            <label>
                                <input type="radio" name="agree" value="3"/>
                                1500$ - 2000$</label>
                            <br>
                            <label>
                                <input type="radio" name="agree" value="4"/>
                                2000$ - 2500$</label>
                            <br>
                            <label>
                                <input type="radio" name="agree" value="5"/>
                                2500$ - 3000$</label>
                            <br>
                            <label>
                                <input type="radio" name="agree" value="6" disabled checked/>
                                Don't know</label>
                            <hr>
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
                            </form>
                        </div>
                    </div>
                </div>
                <!--/price panel end-->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"><a data-toggle="collapse" href="#collapseBrand" class="collapseWill active ">
                            Brand <span class="pull-left"> <i class="fa fa-caret-right"></i></span> </a></h4>
                    </div>
                    <div id="collapseBrand" class="panel-collapse collapse in">
                        <div class="panel-body smoothscroll maxheight300">
                            <div class="block-element">
                                <label>
                                    <input type="checkbox" name="tour" value="0"/>
                                    Armani </label>
                            </div>
                            <div class="block-element">
                                <label>
                                    <input type="checkbox" name="tour" value="1"/>
                                    Gucci </label>
                            </div>
                            <div class="block-element">
                                <label>
                                    <input type="checkbox" name="tour" value="2"/>
                                    Louis Vuitton </label>
                            </div>
                            <div class="block-element">
                                <label>
                                    <input type="checkbox" name="tour" value="3"/>
                                    Chanel </label>
                            </div>
                            <div class="block-element">
                                <label>
                                    <input type="checkbox" name="tour" value="3"/>
                                    Roberto Cavalli </label>
                            </div>
                            <div class="block-element">
                                <label>
                                    <input type="checkbox" name="tour" value="3"/>
                                    Valentino </label>
                            </div>
                            <div class="block-element">
                                <label>
                                    <input type="checkbox" name="tour" value="3"/>
                                    Ralph Lauren </label>
                            </div>
                            <div class="block-element">
                                <label>
                                    <input type="checkbox" name="tour" value="3"/>
                                    Miu Miu </label>
                            </div>
                            <div class="block-element">
                                <label>
                                    <input type="checkbox" name="tour" value="3"/>
                                    McQueen </label>
                            </div>
                            <div class="block-element">
                                <label>
                                    <input type="checkbox" name="tour" value="3"/>
                                    adidas </label>
                            </div>
                            <div class="block-element">
                                <label>
                                    <input type="checkbox" name="tour" value="3"/>
                                    Nike </label>
                            </div>
                            <div class="block-element">
                                <label>
                                    <input type="checkbox" name="tour" value="3"/>
                                    Jimmy Choo </label>
                            </div>
                            <div class="block-element">
                                <label>
                                    <input type="checkbox" name="tour" value="3"/>
                                    Bottega Veneta </label>
                            </div>
                            <div class="block-element">
                                <label>
                                    <input type="checkbox" name="tour" value="3"/>
                                    Donna Karan </label>
                            </div>
                            <div class="block-element">
                                <label>
                                    <input type="checkbox" name="tour" value="3"/>
                                    Oscar de la Renta </label>
                            </div>
                            <div class="block-element">
                                <label>
                                    <input type="checkbox" name="tour" value="3"/>
                                    Tods </label>
                            </div>
                            <div class="block-element">
                                <label>
                                    <input type="checkbox" name="tour" value="3"/>
                                    Burberry </label>
                            </div>
                            <div class="block-element">
                                <label>
                                    <input type="checkbox" name="tour" value="3"/>
                                    Michael Kors </label>
                            </div>
                            <div class="block-element">
                                <label>
                                    <input type="checkbox" name="tour" value="3"/>
                                    Mulberry </label>
                            </div>
                            <div class="block-element">
                                <label> &nbsp; </label> <!-- keep it blank // -->
                            </div>

                        </div>
                    </div>
                </div>
                <!--/brand panel end-->

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"><a data-toggle="collapse" href="#collapseColor"
                                                   class="collapseWill active ">
                            Color <span class="pull-left"> <i class="fa fa-caret-right"></i></span> </a></h4>
                    </div>
                    <div id="collapseColor" class="panel-collapse collapse in">
                        <div class="panel-body smoothscroll maxheight300 color-filter">
                            <div class="block-element">
                                <label>
                                    <input type="checkbox" name="tour" value="0"/>
                                    <small style="background-color:#333333"></small>
                                    Black <span>(123)</span> </label>
                            </div>
                            <div class="block-element">
                                <label>
                                    <input type="checkbox" name="tour" value="1"/>
                                    <small style="background-color:#1664c4"></small>
                                    Blue (434) </label>
                            </div>
                            <div class="block-element">
                                <label>
                                    <input type="checkbox" name="tour" value="2"/>
                                    <small style="background-color:#c00707"></small>
                                    Red (338) </label>
                            </div>
                            <div class="block-element">
                                <label>
                                    <input type="checkbox" name="tour" value="3"/>
                                    <small style="background-color:#6fcc14"></small>
                                    Green (253) </label>
                            </div>
                            <div class="block-element">
                                <label>
                                    <input type="checkbox" name="tour" value="3"/>
                                    <small style="background-color:#943f00"></small>
                                    Brown (240) </label>
                            </div>
                            <div class="block-element">
                                <label>
                                    <input type="checkbox" name="tour" value="3"/>
                                    <small style="background-color:#ff1cae"></small>
                                    Pink (212) </label>
                            </div>
                            <div class="block-element">
                                <label>
                                    <input type="checkbox" name="tour" value="3"/>
                                    <small style="background-color:#f5f5dc"></small>
                                    Beige (176) </label>
                            </div>
                            <div class="block-element">
                                <label>
                                    <input type="checkbox" name="tour" value="3"/>
                                    <small style="background-color:#adadad"></small>
                                    Grey (154) </label>
                            </div>
                            <div class="block-element">
                                <label>
                                    <input type="checkbox" name="tour" value="3"/>
                                    <small style="background-color:#5d00dc"></small>
                                    Purple (132) </label>
                            </div>
                            <div class="block-element">
                                <label>
                                    <input type="checkbox" name="tour" value="3"/>
                                    <small style="background-color:#f1f40e"></small>
                                    Yellow (104) </label>
                            </div>
                            <div class="block-element">
                                <label>
                                    <input type="checkbox" name="tour" value="3"/>
                                    <small style="background-color:#ffc600"></small>
                                    Orange (77) </label>
                            </div>
                            <div class="block-element">
                                <label>
                                    <input type="checkbox" name="tour" value="3"/>
                                    <small style="background-color:#9b1d00"></small>
                                    Maroon (76) </label>
                            </div>
                            <div class="block-element">
                                <label>
                                    <input type="checkbox" name="tour" value="3"/>
                                    <small style="background-color:#0a43a3"></small>
                                    Navy Blue (68) </label>
                            </div>
                            <div class="block-element">
                                <label>
                                    <input type="checkbox" name="tour" value="3"/>
                                    <small style="background-color:#ede4b2"></small>
                                    Tan (67) </label>
                            </div>
                            <div class="block-element">
                                <label>
                                    <input type="checkbox" name="tour" value="3"/>
                                    <small style="background-color:#ecf1ef"></small>
                                    Silver (49) </label>
                            </div>
                            <div class="block-element">
                                <label>
                                    <input type="checkbox" name="tour" value="3"/>
                                    <small style="background-color:#f3f1e7"></small>
                                    Off White (44) </label>
                            </div>
                            <div class="block-element">
                                <label> &nbsp; </label>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/color panel end-->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"><a data-toggle="collapse" href="#collapseThree"
                                                   class="collapseWill active ">
                            Discount <span class="pull-left"> <i class="fa fa-caret-right"></i></span> </a></h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <div class="block-element">
                                <label>
                                    <input type="checkbox" name="tour" value="3"/>
                                    Non-Discounted items </label>
                            </div>
                            <div class="block-element">
                                <label>
                                    <input type="checkbox" name="tour" value="3"/>
                                    Discounted items </label>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/discount  panel end-->
            </div>
        </div>


        <!--right column-->
        <div class="col-lg-9 col-md-9 col-sm-12">

            <div class="w100 clearfix category-top">
                <h2> TSHIRT </h2>

                <div class="categoryImage"><img src="<?php echo base_url(); ?>assets/img/site/subcategory.jpg" class="img-responsive" alt="img">
                </div>
            </div>
            <!--/.category-top-->

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
                    <div class="change-view pull-right">
                        <a href="#" title="Grid" class="grid-view"> <i class="fa fa-th-large"></i> </a>
                        <a href="#" title="List" class="list-view "><i class="fa fa-th-list"></i></a></div>
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

                        <div class="image">
                            <a href="<?php echo base_url(); ?>product_details"><img src="<?php echo base_url(); ?>assets/img/product/30.jpg" alt="img" class="img-responsive"></a>
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

                        <div class="image">
                            <a href="<?php echo base_url(); ?>product_details"><img src="<?php echo base_url(); ?>assets/img/product/31.jpg" alt="img"
                                                                class="img-responsive"></a>
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

                        <div class="image">
                            <a href="<?php echo base_url(); ?>product_details"><img src="<?php echo base_url(); ?>assets/img/product/34.jpg" alt="img"
                                                                class="img-responsive"></a>
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

                        <div class="image">
                            <a href="<?php echo base_url(); ?>product_details"><img src="<?php echo base_url(); ?>assets/img/product/35.jpg" alt="img"
                                                                class="img-responsive"></a>
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

                        <div class="image">
                            <a href="<?php echo base_url(); ?>product_details"><img src="<?php echo base_url(); ?>assets/img/product/33.jpg" alt="img"
                                                                class="img-responsive"></a>
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

                        <div class="image">
                            <a href="<?php echo base_url(); ?>product_details"><img src="<?php echo base_url(); ?>assets/img/product/10.jpg" alt="img"
                                                                class="img-responsive"></a>
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

                        <div class="image">
                            <a href="<?php echo base_url(); ?>product_details"><img src="<?php echo base_url(); ?>assets/img/product/37.jpg" alt="img"
                                                                class="img-responsive"></a>
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

                        <div class="image">
                            <a href="<?php echo base_url(); ?>product_details"><img src="<?php echo base_url(); ?>assets/img/product/16.jpg" alt="img"
                                                                class="img-responsive"></a>
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

                        <div class="image">
                            <a href="<?php echo base_url(); ?>product_details"><img src="<?php echo base_url(); ?>assets/img/product/19.jpg" alt="img"
                                                                class="img-responsive"></a>
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

                        <div class="image">
                            <a href="<?php echo base_url(); ?>product_details"><img src="<?php echo base_url(); ?>assets/img/product/15.jpg" alt="img"
                                                                class="img-responsive"></a>
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

                        <div class="image">
                            <a href="<?php echo base_url(); ?>product_details"><img src="<?php echo base_url(); ?>assets/img/product/14.jpg" alt="img"
                                                                class="img-responsive"></a>
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

                        <div class="image">
                            <a href="<?php echo base_url(); ?>product_details"><img src="<?php echo base_url(); ?>assets/img/product/17.jpg" alt="img"
                                                                class="img-responsive"></a>
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
                <div class="pull-right pull-right  col-sm-4 col-xs-12 no-padding text-right text-left-xs">
                    <p>Showing 1–450 of 12 results</p>
                </div>
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
<!-- Modal -->
<div class="modal fade" id="productSetailsModalAjax" tabindex="-1" role="dialog"
     aria-labelledby="productSetailsModalAjaxLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- End Modal -->
<?php include "templates/footer.php"; ?>
