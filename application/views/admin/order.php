<?php include "templates/header.php" ?>
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
                <a href="#">Admin Users </a>
            </li>
        </ul>
    </div>
    <div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><!-- <i class="glyphicon glyphicon-user"></i> -->Admin Users</h2>
        <div class="box-icon">
            <a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a>
            <a href="#" class="btn btn-minimize btn-round btn-default"><i
                    class="glyphicon glyphicon-chevron-up"></i></a>
            <a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
        </div>
    </div>
   <div class="box-content">
        <p class='error_msg_del alert alert-info'></p>
        <input type="hidden" class="table_name" value="shopping_order">
        <input type="hidden" class="field_name" value="order_id">
        <input type="hidden" class="action" value="<?php echo base_url(); ?>index.php/admin/delete">
        <!-- <a class="btn btn-success" id="add" href="<?php echo base_url(); ?>index.php/admin/adminindex/add_order">
        <i class="glyphicon glyphicon-edit icon-white"></i>
        Add
        </a> -->
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive scroll" >
    <thead>
    <th class="product_small">Order No</th>
	<th class="product_small">User Id</th>
	<th class="product_small">User Type</th>
	<th class="product">User Name</th>
	<th class="product_small">Total Items</th>
	<th class="product_small">Total amount</th>
	<th class="product">Email</th>
	<th class="product_small">Mobile</th>
	<th class="product">Address</th>
	<th class="product">State</th>
	<th class="product">City</th>
	<th class="product">Area</th>
	<th class="product">Created Date</th>
	<th class="product_small">Staus</th>
	<th class="product_small">Actions</th>
	</tr>
    </thead>
    <tbody>
    <?php foreach ($order_list as $order): ?>
        <tr>
        	<td><?php echo $order["order_id"] ?></td>
            <td><?php echo $order["order_user_id"] ?></td>
            <td><?php echo $order["order_user_type"] ?></td>
            <td><?php echo $order["order_customer_name"] ?></td>
            <td><?php echo $order["order_total_items"] ?></td>
            <td class="center"><?php echo $order["order_total_amount"] ?></td>
            <td class="center"><?php echo $order["order_customer_email"] ?></td>
            <td class="center"><?php echo $order["order_shipping_mobile"] ?></td>
            <td class="center"><?php echo $order["order_shipping_line1"] ?></td>
            <td class="center"><?php echo $order["order_shipping_state_id"] ?></td>
            <td class="center"><?php echo $order["order_shipping_city_id"] ?></td>
            <td class="center"><?php echo $order["order_shipping_area_id"] ?></td>
            <td class="center"><?php echo date("d/m/Y", strtotime($order["order_createddate"])); ?></td>
            <td class="center"><span class="<?php if($order["order_status"] ==1 ){ ?>label-success<?php } ?> label label-default"><?php if($order["order_status"] ==1 )echo "Active";else echo "InActive"; ?></span></td>
            <td class="center">
                <a class="btn btn-info" href="<?php echo base_url(); ?>index.php/admin/adminindex/edit_order/<?php echo $order["order_user_id"] ?>">
                    <i class="glyphicon glyphicon-edit icon-white"></i>
                    Edit
                </a>
                <a class="btn btn-danger delete" href="#myModal1" data-toggle="modal" data-id="<?php echo $order["order_id"] ?>" title="Delete">
                    <i class="glyphicon glyphicon-trash icon-white"></i>
                    Delete
                </a>
            </td>
        </tr>
    <?php endforeach ?>
    </tbody>
    </table>
    </div>
    </div>
    </div>
    </div>
    <!--/span-->
	<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        	<div class="modal-content">
        		<div class="modal-body delete_message_style">
        			<input type="hidden" name="delete" id="vId" value=""/>
        			<button type="button" class="close " data-dismiss="modal" aria-hidden="true">
        				&times;
        			</button>
        			<center class="popup_tx">
        				<h5>Are you sure you want to delete this item? </h5>
        			</center>
        		</div>
        		<div id="delete_btn" class="modal-footer footer_model_button" >
        			<a name="action" class="btn btn-danger popup_btn yes_btn_act" id="popup_btn1" value="Delete">Yes</a>
        			<button type="button" class="btn btn-info popup_btn" id="popup_btn" data-dismiss="modal">No</button>
        		</div>
            </div><!--/row-->
        </div>
    </div>
    </div><!--/.fluid-container-->
    </div>
<?php include "templates/footer.php" ?>