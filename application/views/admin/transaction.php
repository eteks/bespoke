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
                <a href="#">Transaction</a>
            </li>
        </ul>
    </div>
    <div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><!-- <i class="glyphicon glyphicon-user"></i> -->Transaction</h2>

        <div class="box-icon">
            <a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a>
            <a href="#" class="btn btn-minimize btn-round btn-default"><i
                    class="glyphicon glyphicon-chevron-up"></i></a>
            <a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
        </div>
    </div>
   <div class="box-content">
        <table class="table table-striped table-bordered bootstrap-datatable datatable responsive scroll" >
    <thead>
   <th class="product_small">Order No</th>
   <th class="product_small">User Id</th> 
   <th class="product">Tracking Id</th>
    <th class="product">Bank Reference Number</th>
   <th class="product">Payment Mode</th>
   <th class="product">Card Name</th>
   <th class="product_small">Amount</th>
    <th class="product_small">Currency</th>
    <th class="product_small">Status Code</th>
     <th class="product_small">Status Message</th>
    <th class="product_small">Created date</th>
      <!-- <th class="product_small">Actions</th> -->
    </tr>
    </thead>
     <tbody>
    <?php foreach ($transaction_list as $transaction): ?>
        <tr>
            <td><?php echo $transaction["order_id"] ?></td>
            <td><?php echo $transaction["user_id"] ?></td>
            <td><?php echo $transaction["tracking_id"] ?></td>
            <td><?php echo $transaction["bank_referrence_number"] ?></td>
            <td class="center"><?php echo $transaction["payment_mode"] ?></td>
            <td class="center"><?php echo $transaction["card_name"] ?></td>
            <td class="center"><?php echo $transaction["amount"] ?></td>
            <td class="center"><?php echo $transaction["currency"] ?></td>
            <td class="center"><?php echo $transaction["status_code"] ?></td>
            <td class="center"><?php echo $transaction["status_message"] ?></td>
            <td class="center"><?php echo date("d/m/Y",strtotime($transaction["transaction_createddate"])); ?></td>
        </tr>
    <?php endforeach ?>
    </tbody>
    </table>
    </div>
    </div>
    </div>
    </div>
    <!--/span-->
     <!-- <script type="text/javascript" >
		$(document).on("click", ".delete", function () {
		var myId = $(this).data('id');
		$(".modal-body #vId").val( myId );
		$("#del_link").prop("href", "users.php?delete="+myId);
		});
	</script>
	<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body delete_message_style">
					<input type="hidden" name="delete" id="vId" value=""/>
						<button type="button" class="close " data-dismiss="modal" aria-hidden="true">&times;</button>
						<center class="popup_tx">
							<h5>Are you sure you want to delete this item? </h5>
						</center>
				</div>
				<div id="delete_btn" class="modal-footer footer_model_button" >
					<a name="action" id="del_link" class="btn btn-danger popup_btn" id="popup_btn1 href=""  value="Delete">Yes</a>						
					<button type="button" class="btn btn-info popup_btn" id="popup_btn" data-dismiss="modal">No</button>
				</div> -->
    </div><!--/row-->
        </div>
    </div><!--/.fluid-container-->
<?php include "templates/footer.php" ?>