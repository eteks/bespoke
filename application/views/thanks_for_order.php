<?php include "templates/header.php"; ?>
<div class="container main-container headerOffset">
    <div class="row">
        <div class="breadcrumbDiv col-lg-12">
            <ul class="breadcrumb">
                <li><a href="<?php echo base_url(); ?>index.php">Home</a></li>
                <li><a href="<?php echo base_url(); ?>category">Category</a></li>
                <li class="active"> Order</li>
            </ul>
        </div>
    </div>
    <!--/.row-->


    <div class="row">
        <div class="col-lg-12 ">
            <div class="row userInfo">

                <div class="thanxContent text-center">

                    <h1> Thank you for your order <a href="<?php echo base_url(); ?>order_status">#6469</a></h1>
                    <h4>we'll let you know when your items are on their way</h4>

                </div>

                <div class="col-lg-7 col-center">
                    <h4></h4>

                    <div class="cartContent table-responsive  w100">
                        <table style="width:100%" class="cartTable cartTableBorder">
                            <tbody>

                            <tr class="CartProduct  cartTableHeader">
                                <td colspan="2"> Items to be Shipped</td>


                                <td style="width:15%"></td>
                            </tr>

                            <tr class="CartProduct">
                                <td class="CartProductThumb">
                                    <div><a href="<?php echo base_url(); ?>product_details"><img alt="img" src="<?php echo base_url(); ?>assets/img/product/a1.jpg"></a>
                                    </div>
                                </td>
                                <td>
                                    <div class="CartDescription">
                                        <h4><a href="<?php echo base_url(); ?>product_details">Denim T shirt Black </a></h4>
                                        <span class="size">12 x 1.5 L</span>

                                        <div class="price"><span>$8.80</span></div>
                                    </div>
                                </td>


                                <td class="price">$300</td>
                            </tr>

                            <tr class="CartProduct">
                                <td class="CartProductThumb">
                                    <div><a href="<?php echo base_url(); ?>product_details"><img alt="img" src="<?php echo base_url(); ?>assets/img/product/a2.jpg"></a>
                                    </div>
                                </td>
                                <td>
                                    <div class="CartDescription">
                                        <h4><a href="<?php echo base_url(); ?>product_details">Denim T shirt Red </a></h4>
                                        <span class="size">12 x 1.5 L</span>

                                        <div class="price"><span>$30</span></div>
                                    </div>
                                </td>


                                <td class="price">$60</td>
                            </tr>

                            <tr class="CartProduct">
                                <td class="CartProductThumb">
                                    <div>
                                        <a href="<?php echo base_url(); ?>product_details"><img alt="img" src="<?php echo base_url(); ?>assets/img/product/a5.jpg"></a>
                                    </div>
                                </td>

                                <td>
                                    <div class="CartDescription">
                                        <h4><a href="<?php echo base_url(); ?>product_details">Denim T shirt Blue </a></h4>
                                        <span class="size">12 x 1.5 L</span>

                                        <div class="price"><span>$8.80</span></div>
                                    </div>
                                </td>


                                <td class="price">$60</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <!--/row end-->

        </div>

        <!--/rightSidebar-->

    </div>
    <!--/row-->

    <div style="clear:both"></div>
</div>
<!-- /.main-container -->

<div class="gap"></div>

<?php include "templates/footer.php"; ?>