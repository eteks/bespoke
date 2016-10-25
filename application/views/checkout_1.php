<?php include "templates/header.php"; ?>
<div class="container main-container headerOffset">
    <div class="row">
        <div class="breadcrumbDiv col-lg-12">
            <ul class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li><a href="cart.php">Cart</a></li>
                <li class="active"> Checkout</li>
            </ul>
        </div>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-7 col-xs-6 col-xxs-12 text-center-xs">
            <h1 class="section-title-inner"><span><i class="glyphicon glyphicon-shopping-cart"></i> Checkout</span></h1>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-5 rightSidebar col-xs-6 col-xxs-12 text-center-xs">
            <h4 class="caps"><a href="category.php"><i class="fa fa-chevron-left"></i> Back to shopping </a></h4>
        </div>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-12">
            <div class="row userInfo">
                <div class="col-xs-12 col-sm-12">
                    <div class="w100 clearfix">
                        <ul class="orderStep orderStepLook2">
                            <li class="active address_label"><a href="#"> <i class="fa fa-map-marker "></i> <span> address</span>
                            </a></li>
                            <li class="disabled order_label"><a href="#"> <i class="fa fa-check-square  "></i>
                                <span> order review </span></a></li>
                            <!-- <li><a href="checkout-3.php"><i class="fa fa-truck "> </i><span>Shipping</span> </a></li>
                            <li><a href="checkout-4.php"><i class="fa fa-money  "> </i><span>Payment</span> </a></li>
                            <li><a href="checkout-5.php"><i class="fa fa-check-square "> </i><span>Order</span></a>
                            </li> -->
                        </ul>
                        <!--/.orderStep end-->
                    </div>
                   <div id="checkout_section">
	                    <div id="checkout_address">
	                    <p class="error_msg">  </p>
	                    <div class="w100 clearfix">
	                        <div class="row userInfo">
	                            <div class="col-lg-12">
	                                <h2 class="block-title-2"> To add a new address, please fill out the form below. </h2>
	                            </div>
	                            <form>
	                                <div class="col-xs-12 col-sm-6">
	                                    <div class="form-group required">
	                                        <label for="InputName">First Name <sup>*</sup> </label>
	                                        <input required type="text" class="form-control" id="InputName"
	                                               placeholder="First Name" maxlength="20">
	                                    </div>
	                                    <div class="form-group required">
	                                        <label for="InputLastName">Last Name <sup>*</sup> </label>
	                                        <input required type="text" class="form-control" id="InputLastName"
	                                               placeholder="Last Name" maxlength="20">
	                                    </div>
	                                    <!-- <div class="form-group">
	                                        <label for="InputCompany">Company </label>
	                                        <input type="text" class="form-control" id="InputCompany" placeholder="Company">
	                                    </div> -->
	                                    <div class="form-group required">
	                                        <label for="InputAddress">Address <sup>*</sup> </label>
	                                        <input required type="text" class="form-control" id="InputAddress"
	                                               placeholder="Address" maxlength="20">
	                                    </div>
	                                    <div class="form-group">
	                                        <label for="InputAddress2">Address (Line 2) </label>
	                                        <input type="text" class="form-control" id="InputAddress2"
	                                               placeholder="Address" maxlength="30">
	                                    </div>	                                    
	                                    <div class="form-group required">
	                                        <label for="InputState">State <sup>*</sup> </label>
	
	                                        <select class="form-control" required aria-required="true" id="InputState"
	                                                name="InputState">
	                                            <option value="">Choose</option>
	                                            <option value="1">Alabama</option>
	                                            <option value="2">Alaska</option>
	                                            <option value="3">Arizona</option>
	                                            <option value="4">Arkansas</option>
	                                            <option value="5">California</option>
	                                            <option value="6">Colorado</option>
	                                            <option value="7">Connecticut</option>
	                                            <option value="8">Delaware</option>
	                                            <option value="53">District of Columbia</option>
	                                            <option value="9">Florida</option>
	                                            <option value="10">Georgia</option>
	                                            <option value="11">Hawaii</option>
	                                            <option value="12">Idaho</option>
	                                            <option value="13">Illinois</option>
	                                            <option value="14">Indiana</option>
	                                            <option value="15">Iowa</option>
	                                            <option value="16">Kansas</option>
	                                            <option value="17">Kentucky</option>
	                                            <option value="18">Louisiana</option>
	                                            <option value="19">Maine</option>
	                                            <option value="20">Maryland</option>
	                                            <option value="21">Massachusetts</option>
	                                            <option value="22">Michigan</option>
	                                            <option value="23">Minnesota</option>
	                                            <option value="24">Mississippi</option>
	                                            <option value="25">Missouri</option>
	                                            <option value="26">Montana</option>
	                                            <option value="27">Nebraska</option>
	                                            <option value="28">Nevada</option>
	                                            <option value="29">New Hampshire</option>
	                                            <option value="30">New Jersey</option>
	                                            <option value="31">New Mexico</option>
	                                            <option value="32">New York</option>
	                                            <option value="33">North Carolina</option>
	                                            <option value="34">North Dakota</option>
	                                            <option value="35">Ohio</option>
	                                            <option value="36">Oklahoma</option>
	                                            <option value="37">Oregon</option>
	                                            <option value="38">Pennsylvania</option>
	                                            <option value="51">Puerto Rico</option>
	                                            <option value="39">Rhode Island</option>
	                                            <option value="40">South Carolina</option>
	                                            <option value="41">South Dakota</option>
	                                            <option value="42">Tennessee</option>
	                                            <option value="43">Texas</option>
	                                            <option value="52">US Virgin Islands</option>
	                                            <option value="44">Utah</option>
	                                            <option value="45">Vermont</option>
	                                            <option value="46">Virginia</option>
	                                            <option value="47">Washington</option>
	                                            <option value="48">West Virginia</option>
	                                            <option value="49">Wisconsin</option>
	                                            <option value="50">Wyoming</option>
	                                        </select>
	                                    </div>
	                                </div>
	                                <div class="col-xs-12 col-sm-6">
	                                	<div class="form-group required">
	                                        <label for="InputCity">City <sup>*</sup> </label>
	                                        <select class="form-control" required aria-required="true" id="InputCity"
	                                                name="InputCity">
	                                            <option value="">Choose</option>
	                                            <option value="1">Alabama</option>
	                                            <option value="2">Alaska</option>
	                                            <option value="3">Arizona</option>
	                                            <option value="4">Arkansas</option>
	                                            <option value="5">California</option>
	                                            <option value="6">Colorado</option>
	                                            <option value="7">Connecticut</option>
	                                            <option value="8">Delaware</option>
	                                            <option value="53">District of Columbia</option>
	                                            <option value="9">Florida</option>
	                                            <option value="10">Georgia</option>
	                                            <option value="11">Hawaii</option>
	                                            <option value="12">Idaho</option>
	                                            <option value="13">Illinois</option>
	                                            <option value="14">Indiana</option>
	                                            <option value="15">Iowa</option>
	                                            <option value="16">Kansas</option>
	                                            <option value="17">Kentucky</option>
	                                            <option value="18">Louisiana</option>
	                                            <option value="19">Maine</option>
	                                            <option value="20">Maryland</option>
	                                            <option value="21">Massachusetts</option>
	                                            <option value="22">Michigan</option>
	                                            <option value="23">Minnesota</option>
	                                            <option value="24">Mississippi</option>
	                                            <option value="25">Missouri</option>
	                                            <option value="26">Montana</option>
	                                            <option value="27">Nebraska</option>
	                                            <option value="28">Nevada</option>
	                                            <option value="29">New Hampshire</option>
	                                            <option value="30">New Jersey</option>
	                                            <option value="31">New Mexico</option>
	                                            <option value="32">New York</option>
	                                            <option value="33">North Carolina</option>
	                                            <option value="34">North Dakota</option>
	                                            <option value="35">Ohio</option>
	                                            <option value="36">Oklahoma</option>
	                                            <option value="37">Oregon</option>
	                                            <option value="38">Pennsylvania</option>
	                                            <option value="51">Puerto Rico</option>
	                                            <option value="39">Rhode Island</option>
	                                            <option value="40">South Carolina</option>
	                                            <option value="41">South Dakota</option>
	                                            <option value="42">Tennessee</option>
	                                            <option value="43">Texas</option>
	                                            <option value="52">US Virgin Islands</option>
	                                            <option value="44">Utah</option>
	                                            <option value="45">Vermont</option>
	                                            <option value="46">Virginia</option>
	                                            <option value="47">Washington</option>
	                                            <option value="48">West Virginia</option>
	                                            <option value="49">Wisconsin</option>
	                                            <option value="50">Wyoming</option>
	                                        </select>
	                                        <!-- <input required type="text" class="form-control" id="InputCity"
	                                               placeholder="City"> -->
	                                    </div>                               
	                                    <div class="form-group required">
	                                        <label for="InputArea">Area <sup>*</sup> </label>
	                                        <select class="form-control" required aria-required="true" id="InputArea"
	                                                name="InputArea">
	                                            <option value="">Choose</option>
	                                            <option value="38">Algeria</option>
	                                            <option value="39">American Samoa</option>
	                                            <option value="40">Andorra</option>
	                                            <option value="41">Angola</option>
	                                            <option value="42">Anguilla</option>
	                                            <option value="43">Antigua and Barbuda</option>
	                                            <option value="44">Argentina</option>
	                                            <option value="45">Armenia</option>
	                                            <option value="46">Aruba</option>
	                                            <option value="24">Australia</option>
	                                            <option value="2">Austria</option>
	                                            <option value="47">Azerbaijan</option>
	                                            <option value="48">Bahamas</option>
	                                            <option value="49">Bahrain</option>
	                                            <option value="50">Bangladesh</option>
	                                            <option value="3">Belgium</option>
	                                            <option value="34">Bolivia</option>
	                                            <option value="4">Canada</option>
	                                            <option value="5">China</option>
	                                            <option value="16">Czech Republic</option>
	                                            <option value="20">Denmark</option>
	                                            <option value="7">Finland</option>
	                                            <option value="8">France</option>
	                                            <option value="1">Germany</option>
	                                            <option value="9">Greece</option>
	                                            <option value="22">HongKong</option>
	                                            <option value="26">Ireland</option>
	                                            <option value="29">Israel</option>
	                                            <option value="10">Italy</option>
	                                            <option value="32">Ivory Coast</option>
	                                            <option value="11">Japan</option>
	                                            <option value="12">Luxemburg</option>
	                                            <option value="35">Mauritius</option>
	                                            <option value="13">Netherlands</option>
	                                            <option value="27">New Zealand</option>
	                                            <option value="31">Nigeria</option>
	                                            <option value="23">Norway</option>
	                                            <option value="14">Poland</option>
	                                            <option value="15">Portugal</option>
	                                            <option value="36">Romania</option>
	                                            <option value="25">Singapore</option>
	                                            <option value="37">Slovakia</option>
	                                            <option value="30">South Africa</option>
	                                            <option value="28">South Korea</option>
	                                            <option value="6">Spain</option>
	                                            <option value="18">Sweden</option>
	                                            <option value="19">Switzerland</option>
	                                            <option value="33">Togo</option>
	                                            <option value="17">United Kingdom</option>
	                                            <option value="21">United States</option>
	                                        </select>
	                                    </div>
	                                    <div class="form-group required">
	                                        <label for="InputZip">Zip / Postal Code <sup>*</sup> </label>
	                                        <input required type="text" class="form-control" id="InputZip"
	                                               placeholder="Zip / Postal Code" maxlength="6">
	                                    </div>
	                                    <!-- <div class="form-group">
	                                        <label for="InputAdditionalInformation">Additional information</label>
	                                        <textarea rows="3" cols="26" name="InputAdditionalInformation"
	                                                  class="form-control" id="InputAdditionalInformation"></textarea>
	                                    </div> -->
	                                    <div class="form-group required">
	                                        <label for="InputMobile">Mobile phone <sup>*</sup></label>
	                                        <input required type="tel" name="InputMobile" class="form-control"
	                                               id="InputMobile" maxlength="10">
	                                    </div>
	                                    <div class="form-group">
	                                        <label for="InputEmail">Email </label>
	                                        <input type="text" class="form-control" id="InputEmail" placeholder="Email">
	                                    </div>
	                                    <!-- <div class="form-group required">
	                                        <label for="addressAlias">Please assign an address title for future reference.
	                                            <sup>*</sup></label>
	                                        <input required type="text" value="My address" name="addressAlias"
	                                               class="form-control" id="addressAlias">
	                                    </div> -->
	                                </div>
	                            </form>
	                        </div>
	                        <!--/row end-->
	                    </div>
	                    <div class="cartFooter w100">
                        <div class="box-footer">
                            <div class="pull-left"><a class="btn btn-default" href="index.php"> <i
                                    class="fa fa-arrow-left"></i> &nbsp; Back to Shop </a></div>
                            <div id="checkout_address_submit" class="pull-right"><a class="btn btn-primary btn-small">
                                Continue &nbsp; <i class="fa fa-arrow-circle-right"></i> </a></div>
                        </div>
                    </div>
                    <!--/ cartFooter -->
	                </div><!--End of checkout address-->
	                <div id="checkout_order">
	                	<p class="error_msg">  </p>
                       <div class="w100 clearfix">
                        <div class="row userInfo">
                            <div class="col-lg-12">
                                <h2 class="block-title-2"> Review Order </h2>
                            </div>
                            <div class="col-xs-12 col-sm-12">
                                <div class="cartContent w100 checkoutReview ">
                                    <table class="cartTable table-responsive" style="width:100%">
                                        <tbody>
                                        <tr class="CartProduct cartTableHeader">
                                            <th style="width:15%"> Product</th>
                                            <th class="checkoutReviewTdDetails">Details</th>
                                            <th style="width:10%">Unit Price</th>
                                            <th class="hidden-xs" style="width:5%">QNT</th>
                                            <th class="hidden-xs" style="width:10%">Discount</th>
                                            <th style="width:15%">Total</th>
                                        </tr>
                                        <tr class="CartProduct">
                                            <td class="CartProductThumb">
                                                <div><a href="product-details.php"><img src="images/product/3.jpg"></a>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="CartDescription">
                                                    <h4><a href="product-details.php">Denim T shirt Black </a></h4>
                                                    <span class="size">12 x 1.5 L</span>
                                                </div>
                                            </td>
                                            <td class="delete">
                                                <div class="price ">$116.51</div>
                                            </td>
                                            <td class="hidden-xs">1</td>
                                            <td class="hidden-xs">0</td>
                                            <td class="price">$116.51</td>
                                        </tr>
                                        <tr class="CartProduct">
                                            <td class="CartProductThumb">
                                                <div><a href="product-details.php"><img src="images/product/2.jpg"></a>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="CartDescription">
                                                    <h4><a href="product-details.php">Denim T shirt </a></h4>
                                                    <span class="size">12 x 1.5 L</span>
                                                </div>
                                            </td>
                                            <td class="delete">
                                                <div class="price ">$50</div>
                                            </td>
                                            <td class="hidden-xs">1</td>
                                            <td class="hidden-xs">0</td>
                                            <td class="price">$50</td>
                                        </tr>
                                        <tr class="CartProduct">
                                            <td class="CartProductThumb">
                                                <div><a href="product-details.php"><img src="images/product/5.jpg"></a>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="CartDescription">
                                                    <h4><a href="product-details.php">Denim T shirt Red </a></h4>
                                                    <span class="size">12 x 1.5 L</span>
                                                </div>
                                            </td>
                                            <td class="delete">
                                                <div class="price ">$50</div>
                                            </td>
                                            <td class="hidden-xs">1</td>
                                            <td class="hidden-xs">0</td>
                                            <td class="price">$50</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!--cartContent-->
                               <div class="w100 costDetails">
                                    <div class="table-block" id="order-detail-content">
                                        <table class="std table" id="cart-summary">
                                            <tr>
                                                <td>Total products</td>
                                                <td class="price">$216.51</td>
                                            </tr>
                                            <tr style="">
                                                <td>Shipping</td>
                                                <td class="price"><span class="success">Free shipping!</span></td>
                                            </tr>
                                            <tr class="cart-total-price ">
                                                <td>Total (tax excl.)</td>
                                                <td class="price">$216.51</td>
                                            </tr>
                                            <tr>
                                                <td>Total tax</td>
                                                <td id="total-tax" class="price">0.00</td>
                                            </tr>
                                            <tr>
                                                <td> Total</td>
                                                <td id="total-price" class="price">$216.51</td>
                                            </tr>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!--/costDetails-->
                                <!--/row-->
                            </div>
                        </div>
                    </div>
                    <!--/row end-->
                    <div class="cartFooter w100">
                        <div class="box-footer">
                            <div class="pull-left"><a id="checkout_order_submit" class="btn btn-default">
                                <i class="fa fa-arrow-left"></i> &nbsp; Back to Address </a>
                            </div>


                            <div class="pull-right">
                                <a href="thanks-for-order.php" class="btn btn-primary btn-small ">
                                    Confirm Order &nbsp; <i class="fa fa-check"></i>
                                </a>
                            </div>


                        </div>
                    </div>
                    <!--/ cartFooter -->
                 </div><!-- End of checkout order-->
               </div><!-- End of checkout section-->
              </div>
            </div>
            <!--/row end-->

        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 rightSidebar">
            <div class="w100 cartMiniTable">
                <table id="cart-summary" class="std table">
                    <tbody>
                    <tr>
                        <td>Total products</td>
                        <td class="price">$216.51</td>
                    </tr>
                    <tr style="">
                        <td>Shipping</td>
                        <td class="price"><span class="success">Free shipping!</span></td>
                    </tr>
                    <tr class="cart-total-price ">
                        <td>Total (tax excl.)</td>
                        <td class="price">$216.51</td>
                    </tr>
                    <tr>
                        <td>Total tax</td>
                        <td class="price" id="total-tax">$0.00</td>
                    </tr>
                    <tr>
                        <td> Total</td>
                        <td class=" site-color" id="total-price">$216.51</td>
                    </tr>
                    </tbody>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <!--  /cartMiniTable-->

        </div>
        <!--/rightSidebar-->

    </div>
    <!--/row-->

    <div style="clear:both"></div>
</div>
<!-- /.main-container-->
<div class="gap"></div>

<?php include "templates/footer.php"; ?>