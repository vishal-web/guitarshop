<h1><?= $headline ?></h1>
<?= validation_errors('<p style="color:red">','</p>')?>
<?php
	if (isset($flash)) {
		echo $flash;
	}

	$form_url = base_url().'store_orders/submit_order_status/'.$update_id;
?>
<?php
	echo Modules::run('paypal/_display_summary_info',$paypal_id);
	if (isset($update_id)) {
?>
<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon white edit"></i><span class="break"></span>Order Status : <?= $status_title?></h2>
			<div class="box-icon">
				<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
				<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
				<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
			</div>
		</div>
		<div class="box-content">
			<p>To change the order status please choose an option from the dropdown below and hit 'Submit'.</p>
			<form method="POST" action="<?= $form_url ?>" class="form-horizontal">
			  <fieldset>

			  	<div class="control-group">
				<label class="control-label" for="selectError3">Status</label>
					<div class="controls">
						<?php
						/*
						$options = array(
							'' => 'please select....',
							'1' => 'Active',
							'0' => 'Inactive',
							);
						*/

						$addional_dropdown_code = array('id'=>'selectError3');
						echo form_dropdown('order_status', $options, $order_status);
						?>
					</div>
				</div>
				

				<div class="form-actions">
				  <button type="submit" name="submit" value="Submit" class="btn btn-primary">Submit</button>
				  <button type="submit" name="submit" value="Cancel" class="btn">Cancel</button>
				</div>
				
			</form> 
		</div>
	</div>
</div>
<?php
}
?>
<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon white edit"></i><span class="break"></span>Customer Details</h2>
			<div class="box-icon">
				<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
				<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
				<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
			</div>
		</div>
		<div class="box-content">
			<p class="text-right">
			<a href="<?= base_url()?>store_accounts/create/<?= $shopper_id?>" style="margin-bottom: 10px;">
				<button class="btn btn-info">Edit Account Details</button>
			</a>
			</p>
			<table class="table table-bordered table-striped">
				<tr>
					<td class="span3">First Name </td>
					<td><?= $store_account_data['firstname']?></td>
				</tr>
				<tr>
					<td>Last Name </td>
					<td><?= $store_account_data['lastname']?></td>
				</tr>
				<tr>
					<td>Company</td>
					<td><?= $store_account_data['company']?></td>
				</tr>
				<tr>
					<td>Telephone Number</td>
					<td><?= $store_account_data['telnum']?></td>
				</tr>
				<tr>
					<td>Email Address</td>
					<td><?= $store_account_data['email']?></td>
				</tr>
				<tr>
					<td style="vertical-align: top;">Customer Address</td>
					<td style="vertical-align: top;"><?= $customer_address?></td>
				</tr>
			</table>
		</div>
	</div><!--/span-->
</div><!--/row-->
<?php
	$user_type = "admin";
	echo Modules::run('cart/_draw_cart_contents',$query_cc,$user_type);
?>


