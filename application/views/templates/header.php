<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Fav and touch icons -->
    <!-- <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="assets/ico/favicon.png"> -->
    <title>Bespoke</title>
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
    <!-- styles needed by smoothproducts.js for product zoom  -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/smoothproducts.css">
    <link href="<?php echo base_url(); ?>assets/plugins/rating/bootstrap-rating.css" rel="stylesheet">
    
    <link href="<?php echo base_url(); ?>assets/css/ion.checkRadio.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/ion.checkRadio.cloudy.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/jquery.minimalect.min.css" media="screen"/>

    <!-- styles needed by footable  -->
    <link href="<?php echo base_url(); ?>assets/css/footable-0.1.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url(); ?>assets/css/footable.sortable-0.1.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url(); ?>assets/css/front-end.css" rel="stylesheet">
    <!-- include pace script for automatic web page progress bar  -->
</head>
<body>
    <!-- Modal Login start -->
    <div class="modal signUpContent fade" id="ModalLogin" tabindex="-1" role="dialog">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times; </button>
                    <h3 class="modal-title-site text-center"> Login to Bespoke </h3>
                </div>
                <div class="modal-body">
                    <form action="ajax_controller/login" method="POST" id="login_section" class="registration_login">
                        <p class="registration_status"> </p>
                        <div class="form-group login-username">
                            <div>
                                <input name="email" id="login-user" class="form-control input" size="20" placeholder="Enter Email" type="text">
                            </div>
                        </div>
                        <div class="form-group login-password">
                            <div>
                                <input name="password" id="login-password" class="form-control input" size="20" placeholder="Password" type="password">
                            </div>
                        </div>
                        <div class="form-group">
                            <div>
                                <div class="checkbox login-remember">
                                    <label>
                                        <input name="rememberme" value="forever" checked="checked" type="checkbox"> Remember Me 
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div>
                                <input name="submit" class="btn  btn-block btn-lg btn-primary" value="LOGIN" type="submit">
                            </div>
                        </div> 
                    </form> <!--userForm-->
                </div>
                <div class="modal-footer">
                    <p class="text-center"> Not here before? 
                        <a data-toggle="modal" data-dismiss="modal" href="#ModalSignup"> Sign Up. </a> <br>
                        <a href="forgot-password.html"> Lost your password? </a>
                    </p>
                </div>
            </div> <!-- /.modal-content -->
        </div> <!-- /.modal-dialog -->
    </div>
    <!-- Modal Signup start -->
    <div class="modal signUpContent fade" id="ModalSignup" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times; </button>
                    <h3 class="modal-title-site text-center"> REGISTER </h3>
                </div>
                <div class="modal-body">
                    <div class="control-group">
                        <a class="fb_button btn  btn-block btn-lg " href="<?php if(!empty($login_url)): echo $login_url; endif; ?>"> SIGNUP WITH
                        FACEBOOK </a>
                    </div>
                    <h5 style="padding:10px 0 10px 0;" class="text-center"> OR </h5>

                    <div class="control-group">
                        <a class="gplus_button btn  btn-block btn-lg " href="<?php echo $authUrl; ?>"> SIGNUP WITH
                        GOOGLE + </a>
                    </div>
                    <h5 style="padding:10px 0 10px 0;" class="text-center"> OR </h5>

                    <form action="ajax_controller/registration" method="POST" id="registration_section" class="registration_login">
                        <p class="registration_status"> </p>
                        <div class="form-group reg-username">
                            <div>
                                <input name="username" class="form-control input" size="20" placeholder="Enter Username" type="text">
                           </div>
                        </div>
                        <div class="form-group reg-email">
                            <div>
                                <input name="email" class="form-control input" size="20" placeholder="Enter Email" type="text">
                            </div>
                        </div>
                        <div class="form-group reg-password">
                            <div>
                                <input name="password" class="form-control input" size="20" placeholder="Password" type="password">
                            </div>
                        </div>
                        <div class="form-group">
                            <div>
                                <div class="checkbox login-remember">
                                    <label>
                                        <input name="rememberme" id="rememberme" value="forever" checked="checked" type="checkbox"> Remember Me 
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div>
                                <input name="submit" class="btn  btn-block btn-lg btn-primary" value="REGISTER" type="submit">
                            </div>
                        </div>
                    </form> <!--userForm-->
                </div>
                <div class="modal-footer">
                    <p class="text-center"> Already member? 
                        <a data-toggle="modal" data-dismiss="modal" href="#ModalLogin"> Sign in </a>
                    </p>
                </div>
            </div> <!-- /.modal-content -->
        </div> <!-- /.modal-dialog -->
    </div> <!-- /.ModalSignup End -->
   <!-- Fixed navbar start -->
<div class="navbar navbar-tshop navbar-fixed-top megamenu" role="navigation">
    <div class="navbar-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-6 col-xs-6 col-md-6">
                    <div class="pull-left ">
                        <ul class="userMenu ">
                            <li><a href="#"> <span class="hidden-xs">HELP</span><i
                                    class="glyphicon glyphicon-info-sign hide visible-xs "></i> </a></li>
                            <li class="phone-number"><a href="callto:+12025550151"> <span> <i
                                    class="glyphicon glyphicon-phone-alt "></i></span> <span class="hidden-xs" style="margin-left:5px"> +1-202-555-0151 </span>
                            </a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-xs-6 col-md-6 no-margin no-padding">
                    <div class="pull-right">
                        <ul class="userMenu">
                            <?php if(!empty($this->session->userdata("login_status"))): 
                                    $session_data = $this->session->userdata("login_session");
                            ?>
                            <li>
                                <a href="">
                                    <span class="hidden-xs"> Welcome <?php echo $session_data['user_name']; ?></span> 
                                    <i class="glyphicon glyphicon-user hide visible-xs "></i>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>account">
                                    <span class="hidden-xs"> My Account</span> 
                                    <i class="glyphicon glyphicon-user hide visible-xs "></i>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>index/logout/"> 
                                    <span class="hidden-xs">Sign Out</span>
                                    <i class="glyphicon glyphicon-log-in hide visible-xs "></i> 
                                </a>
                            </li>
                            <?php 
                            else :
                            ?>
                            <li>
                                <a href="#" data-toggle="modal" data-target="#ModalLogin"> 
                                    <span class="hidden-xs">Sign In</span>
                                    <i class="glyphicon glyphicon-log-in hide visible-xs "></i> 
                                </a>
                            </li>
                            <li class="hidden-xs">
                                <a href="#" data-toggle="modal" data-target="#ModalSignup">         Create Account 
                                </a>
                            </li>

                            <?php
                            endif;
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/.navbar-top-->

    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span
                    class="sr-only"> Toggle navigation </span> <span class="icon-bar"> </span> <span
                    class="icon-bar"> </span> <span class="icon-bar"> </span></button>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-cart"><i
                    class="fa fa-shopping-cart colorWhite"> </i> <span
                    class="cartRespons colorWhite"> Cart ($210.00) </span></button>
            <a class="navbar-brand " href="<?php echo base_url(); ?>"> 
                <img src="<?php echo base_url(); ?>assets/img/logo.png" alt="Bespoke"> 
            </a>

            <!-- this part for mobile -->
            <div class="search-box pull-right hidden-lg hidden-md hidden-sm">
                <div class="input-group">
                    <button class="btn btn-nobg getFullSearch" type="button"><i class="fa fa-search"> </i></button>
                </div>
                <!-- /input-group -->

            </div>
        </div>

        <!-- this part is duplicate from cartMenu  keep it for mobile -->
        <div class="navbar-cart  collapse">
            <div class="cartMenu  col-lg-4 col-xs-12 col-md-4 ">
                <div class="w100 miniCartTable scroll-pane">
                    <table>
                        <tbody>
                        <tr class="miniCartProduct">
                            <td style="width:20%" class="miniCartProductThumb">
                                <div><a href="<?php echo base_url(); ?>product_details"> <img src="<?php echo base_url(); ?>assets/img/product/3.jpg" alt="img"> </a>
                                </div>
                            </td>
                            <td style="width:40%">
                                <div class="miniCartDescription">
                                    <h4><a href="<?php echo base_url(); ?>product_details"> T shirt Black </a></h4>
                                    <span class="size"> 12 x 1.5 L </span>

                                    <div class="price"><span> $8.80 </span></div>
                                </div>
                            </td>
                            <td style="width:10%" class="miniCartQuantity"><a> X 1 </a></td>
                            <td style="width:15%" class="miniCartSubtotal"><span> $8.80 </span></td>
                            <td style="width:5%" class="delete"><a> x </a></td>
                        </tr>
                        <tr class="miniCartProduct">
                            <td style="width:20%" class="miniCartProductThumb">
                                <div><a href="<?php echo base_url(); ?>product_details"> <img src="<?php echo base_url(); ?>assets/img/product/2.jpg" alt="img"> </a>
                                </div>
                            </td>
                            <td style="width:40%">
                                <div class="miniCartDescription">
                                    <h4><a href="<?php echo base_url(); ?>product_details"> T shirt Black </a></h4>
                                    <span class="size"> 12 x 1.5 L </span>

                                    <div class="price"><span> $8.80 </span></div>
                                </div>
                            </td>
                            <td style="width:10%" class="miniCartQuantity"><a> X 1 </a></td>
                            <td style="width:15%" class="miniCartSubtotal"><span> $8.80 </span></td>
                            <td style="width:5%" class="delete"><a> x </a></td>
                        </tr>
                        <tr class="miniCartProduct">
                            <td style="width:20%" class="miniCartProductThumb">
                                <div><a href="<?php echo base_url(); ?>product_details"> <img src="<?php echo base_url(); ?>assets/img/product/5.jpg" alt="img"> </a>
                                </div>
                            </td>
                            <td style="width:40%">
                                <div class="miniCartDescription">
                                    <h4><a href="<?php echo base_url(); ?>product_details"> T shirt Black </a></h4>
                                    <span class="size"> 12 x 1.5 L </span>

                                    <div class="price"><span> $8.80 </span></div>
                                </div>
                            </td>
                            <td style="width:10%" class="miniCartQuantity"><a> X 1 </a></td>
                            <td style="width:15%" class="miniCartSubtotal"><span> $8.80 </span></td>
                            <td style="width:5%" class="delete"><a> x </a></td>
                        </tr>
                        <tr class="miniCartProduct">
                            <td style="width:20%" class="miniCartProductThumb">
                                <div><a href="<?php echo base_url(); ?>product_details"> <img src="<?php echo base_url(); ?>assets/img/product/3.jpg" alt="img"> </a>
                                </div>
                            </td>
                            <td style="width:40%">
                                <div class="miniCartDescription">
                                    <h4><a href="<?php echo base_url(); ?>product_details"> T shirt Black </a></h4>
                                    <span class="size"> 12 x 1.5 L </span>

                                    <div class="price"><span> $8.80 </span></div>
                                </div>
                            </td>
                            <td style="width:10%" class="miniCartQuantity"><a> X 1 </a></td>
                            <td style="width:15%" class="miniCartSubtotal"><span> $8.80 </span></td>
                            <td style="width:5%" class="delete"><a> x </a></td>
                        </tr>
                        <tr class="miniCartProduct">
                            <td style="width:20%" class="miniCartProductThumb">
                                <div><a href="<?php echo base_url(); ?>product_details"> <img src="<?php echo base_url(); ?>assets/img/product/3.jpg" alt="img"> </a>
                                </div>
                            </td>
                            <td style="width:40%">
                                <div class="miniCartDescription">
                                    <h4><a href="<?php echo base_url(); ?>product_details"> T shirt Black </a></h4>
                                    <span class="size"> 12 x 1.5 L </span>

                                    <div class="price"><span> $8.80 </span></div>
                                </div>
                            </td>
                            <td style="width:10%" class="miniCartQuantity"><a> X 1 </a></td>
                            <td style="width:15%" class="miniCartSubtotal"><span> $8.80 </span></td>
                            <td style="width:5%" class="delete"><a> x </a></td>
                        </tr>
                        <tr class="miniCartProduct">
                            <td style="width:20%" class="miniCartProductThumb">
                                <div><a href="<?php echo base_url(); ?>product_details"> <img src="<?php echo base_url(); ?>assets/img/product/4.jpg" alt="img"> </a>
                                </div>
                            </td>
                            <td style="width:40%">
                                <div class="miniCartDescription">
                                    <h4><a href="<?php echo base_url(); ?>product_details"> T shirt Black </a></h4>
                                    <span class="size"> 12 x 1.5 L </span>

                                    <div class="price"><span> $8.80 </span></div>
                                </div>
                            </td>
                            <td style="width:10%" class="miniCartQuantity"><a> X 1 </a></td>
                            <td style="width:15%" class="miniCartSubtotal"><span> $8.80 </span></td>
                            <td style="width:5%" class="delete"><a> x </a></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!--/.miniCartTable-->

                <div class="miniCartFooter  miniCartFooterInMobile text-right">
                    <h3 class="text-right subtotal"> Subtotal: $210 </h3>
                    <a class="btn btn-sm btn-danger" href="<?php echo base_url(); ?>cart"> <i class="fa fa-shopping-cart"> </i> VIEW CART
                    </a> <a href="checkout-0.html"
                            class="btn btn-sm btn-primary"> CHECKOUT </a></div>
                <!--/.miniCartFooter-->

            </div>
            <!--/.cartMenu-->
        </div>
        <!--/.navbar-cart-->

        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="<?php echo base_url(); ?>"> Home </a></li>
                <!-- change width of megamenu = use class > megamenu-fullwidth, megamenu-60width, megamenu-40width -->
                <?php
                if(!empty($menubar_fields)):
                foreach ($menubar_fields as $rec_key => $rec_value) :
                ?>
                <li class="dropdown megamenu-80width ">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="<?php echo base_url(); ?>recipients_view/<?php echo $rec_key; ?>"> 
                        <?php echo $rec_value['recipient_type']; ?>
                        <b class="caret"> </b> 
                    </a>
                    <ul class="dropdown-menu">
                        <li class="megamenu-content">
                            <?php
                            foreach ($rec_value['category_id'] as $cat_key => $cat_value) :
                            ?>
                            <ul class="col-lg-2  col-sm-2 col-md-2  unstyled noMarginLeft">
                                <li>
                                    <p>
                                        <strong> 
                                            <a href="<?php echo base_url(); ?>products_view/?rec=<?php echo $rec_key; ?>&cat=<?php echo $cat_key; ?>">
                                                <?php echo $cat_value['category_name']; ?> 
                                            </a>
                                        </strong></p>
                                </li>
                                <?php
                                foreach ($cat_value['subcategory_id'] as $sub_key => $sub_value) :
                                ?>
                                <li><a href="<?php echo base_url(); ?>products_view/?rec=<?php echo $rec_key; ?>&cat=<?php echo $cat_key; ?>&sub=<?php echo $sub_key; ?>"> <?php echo $sub_value; ?> </a></li>
                                <?php
                                endforeach;
                                ?>
                            </ul>
                            <?php
                            endforeach;
                            ?>
                        </li>
                    </ul>
                </li>
                <?php
                endforeach;
                endif;
                ?>
                <li><a href="#"> PHOTO SHOOT </a></li>
            </ul>
            </ul>

            <!--- this part will be hidden for mobile version -->
            <div class="nav navbar-nav navbar-right hidden-xs">
                <div class="dropdown  cartMenu "><a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i
                        class="fa fa-shopping-cart"> </i> <span class="cartRespons"> Cart ($210.00) </span> <b
                        class="caret"> </b> </a>

                    <div class="dropdown-menu col-lg-4 col-xs-12 col-md-4 ">
                        <div class="w100 miniCartTable scroll-pane">
                            <table>
                                <tbody>
                                <tr class="miniCartProduct">
                                    <td style="width:20%" class="miniCartProductThumb">
                                        <div><a href="<?php echo base_url(); ?>product_details"> <img src="<?php echo base_url(); ?>assets/img/product/3.jpg" alt="img">
                                        </a></div>
                                    </td>
                                    <td style="width:40%">
                                        <div class="miniCartDescription">
                                            <h4><a href="<?php echo base_url(); ?>product_details"> TSHOP Tshirt DO9 </a></h4>
                                            <span class="size"> 12 x 1.5 L </span>

                                            <div class="price"><span> $22 </span></div>
                                        </div>
                                    </td>
                                    <td style="width:10%" class="miniCartQuantity"><a> X 1 </a></td>
                                    <td style="width:15%" class="miniCartSubtotal"><span> $33 </span></td>
                                    <td style="width:5%" class="delete"><a> x </a></td>
                                </tr>
                                <tr class="miniCartProduct">
                                    <td style="width:20%" class="miniCartProductThumb">
                                        <div><a href="<?php echo base_url(); ?>product_details"> <img src="<?php echo base_url(); ?>assets/img/product/2.jpg" alt="img">
                                        </a></div>
                                    </td>
                                    <td style="width:40%">
                                        <div class="miniCartDescription">
                                            <h4><a href="<?php echo base_url(); ?>product_details"> TShir TSHOP 09 </a></h4>
                                            <span class="size"> 12 x 1.5 L </span>

                                            <div class="price"><span> $15 </span></div>
                                        </div>
                                    </td>
                                    <td style="width:10%" class="miniCartQuantity"><a> X 1 </a></td>
                                    <td style="width:15%" class="miniCartSubtotal"><span> $120 </span></td>
                                    <td style="width:5%" class="delete"><a> x </a></td>
                                </tr>
                                <tr class="miniCartProduct">
                                    <td style="width:20%" class="miniCartProductThumb">
                                        <div><a href="<?php echo base_url(); ?>product_details"> <img src="<?php echo base_url(); ?>assets/img/product/5.jpg" alt="img">
                                        </a></div>
                                    </td>
                                    <td style="width:40%">
                                        <div class="miniCartDescription">
                                            <h4><a href="<?php echo base_url(); ?>product_details"> Tshir 2014 </a></h4>
                                            <span class="size"> 12 x 1.5 L </span>

                                            <div class="price"><span> $30 </span></div>
                                        </div>
                                    </td>
                                    <td style="width:10%" class="miniCartQuantity"><a> X 1 </a></td>
                                    <td style="width:15%" class="miniCartSubtotal"><span> $80 </span></td>
                                    <td style="width:5%" class="delete"><a> x </a></td>
                                </tr>
                                <tr class="miniCartProduct">
                                    <td style="width:20%" class="miniCartProductThumb">
                                        <div><a href="<?php echo base_url(); ?>product_details"> <img src="<?php echo base_url(); ?>assets/img/product/3.jpg" alt="img">
                                        </a></div>
                                    </td>
                                    <td style="width:40%">
                                        <div class="miniCartDescription">
                                            <h4><a href="<?php echo base_url(); ?>product_details"> TSHOP T shirt DO20 </a></h4>
                                            <span class="size"> 12 x 1.5 L </span>

                                            <div class="price"><span> $15 </span></div>
                                        </div>
                                    </td>
                                    <td style="width:10%" class="miniCartQuantity"><a> X 1 </a></td>
                                    <td style="width:15%" class="miniCartSubtotal"><span> $55 </span></td>
                                    <td style="width:5%" class="delete"><a> x </a></td>
                                </tr>
                                <tr class="miniCartProduct">
                                    <td style="width:20%" class="miniCartProductThumb">
                                        <div><a href="<?php echo base_url(); ?>product_details"> <img src="<?php echo base_url(); ?>assets/img/product/4.jpg" alt="img">
                                        </a></div>
                                    </td>
                                    <td style="width:40%">
                                        <div class="miniCartDescription">
                                            <h4><a href="<?php echo base_url(); ?>product_details"> T shirt Black </a></h4>
                                            <span class="size"> 12 x 1.5 L </span>

                                            <div class="price"><span> $44 </span></div>
                                        </div>
                                    </td>
                                    <td style="width:10%" class="miniCartQuantity"><a> X 1 </a></td>
                                    <td style="width:15%" class="miniCartSubtotal"><span> $40 </span></td>
                                    <td style="width:5%" class="delete"><a> x </a></td>
                                </tr>
                                <tr class="miniCartProduct">
                                    <td style="width:20%" class="miniCartProductThumb">
                                        <div><a href="<?php echo base_url(); ?>product_details"> <img src="<?php echo base_url(); ?>assets/img/site/winter.jpg"
                                                                                  alt="img"> </a></div>
                                    </td>
                                    <td style="width:40%">
                                        <div class="miniCartDescription">
                                            <h4><a href="<?php echo base_url(); ?>product_details"> G Star T shirt </a></h4>
                                            <span class="size"> 12 x 1.5 L </span>

                                            <div class="price"><span> $80 </span></div>
                                        </div>
                                    </td>
                                    <td style="width:10%" class="miniCartQuantity"><a> X 1 </a></td>
                                    <td style="width:15%" class="miniCartSubtotal"><span> $8.80 </span></td>
                                    <td style="width:5%" class="delete"><a> x </a></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <!--/.miniCartTable-->

                        <div class="miniCartFooter text-right">
                            <h3 class="text-right subtotal"> Subtotal: $210 </h3>
                            <a class="btn btn-sm btn-danger" href="<?php echo base_url(); ?>cart"> <i class="fa fa-shopping-cart"> </i> VIEW
                                CART </a><a
                                class="btn btn-sm btn-primary"> CHECKOUT </a></div>
                        <!--/.miniCartFooter-->

                    </div>
                    <!--/.dropdown-menu-->
                </div>
                <!--/.cartMenu-->

                <div class="search-box">
                    <div class="input-group">
                        <button class="btn btn-nobg getFullSearch" type="button"><i class="fa fa-search search-icon"> </i></button>
                    </div>
                    <!-- /input-group -->

                </div>
                <!--/.search-box -->
            </div>
            <!--/.navbar-nav hidden-xs-->
        </div>
        <!--/.nav-collapse -->

    </div>
    <!--/.container -->

    <div class="search-full text-right"><a class="pull-right search-close"> <i class=" fa fa-times-circle"> </i> </a>

        <div class="searchInputBox pull-right">
            <input type="search" data-searchurl="search?=" name="q" placeholder="start typing and hit enter to search"
                   class="search-input">
            <button class="btn-nobg search-btn" type="submit"><i class="fa fa-search"> </i></button>
        </div>
    </div>
    <!--/.search-full-->

</div>
<!-- /.Fixed navbar  -->