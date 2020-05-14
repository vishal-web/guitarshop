<h1>Manage Orders</h1>
<h2><?= $current_status_title?></h2>
<?php
	if (isset($flash)) {
		echo $flash;
	}

function get_customer_name($firstname,$lastname,$company) {
    $firstname  = trim(ucfirst($firstname));
    $lastname   = trim(ucfirst($lastname));
    $company    = trim(ucfirst($company));

    $company_legth = strlen($company);
    if ($company_legth>2) {
        $customer_name = $company;
    }else{   
        $customer_name = $firstname.' '.$lastname;
    }

    return $customer_name;
}
?>
<?php
	$paypal_url = 'http://www.paypal.com';
?>
<p style="margin-top: 25px;">
<a href="<?= $paypal_url?>"><button type="button" class="btn btn-primary">Visit Paypal</button></a>
</p>
<p>
<?php
	if ($num_rows<1) {
		echo "<p>There are curently no orders with this is order status.</p>";
	}else{
		echo  $showing_statement;
		echo $custom_pagination;

?>

</p>
<div class="row-fluid sortable">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon white tag"></i><span class="break"></span>Your Orders</h2>
			<div class="box-icon">
				<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
				<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
				<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
			</div>
		</div>
		<div class="box-content">
			<table class="table table-striped table-bordered">
			<thead>
				<tr>
					<th>Order Ref</th>
					<th>Order Value</th>
					<th>Date Created</th>
					<th>Customer Name</th>
					<th>Order Status</th>
					<th>Opened</th>
					<th>Actions</th>
				</tr>
			</thead>   
			  <tbody>
			  	<?php
			  		$i = 1;
			  		$this->load->module('timedate');
			  		foreach($query->result() as $row) {
		  			$view_order_url = base_url().'store_orders/view/'.$row->id;
		  			$delete_url = base_url().'';
		  			$opened = $row->opened;
		  			$firstname = $row->firstname;
		  			$lastname = $row->lastname;
		  			$company = $row->company;

		  			if ($opened == '1') {
		  				$opened_label = 'success';
		  				$opened_desc = 'Opened';
		  			}else {
		  				$opened_label = 'important';
		  				$opened_desc = 'Unopened';
		  			}

		  			$date_created = $this->timedate->get_nice_date($row->date_created,'full');
			  		$customer_name = get_customer_name($firstname,$lastname,$company);

			  		if (isset($row->status_title)) {
			  			$order_status = $row->status_title;
			  		}else{
			  			$order_status = 'Order Submitted';
			  		}
			  	?>	
				<tr>
					<td><?= $row->order_ref ?></td>
					<td><?= $row->mc_gross ?></td>
					<td><?= $date_created ?></td>
					<td class="center"><?= $customer_name?></td>
					<td class="center"><?= $order_status?></td>
					<td class="center">
						<span class="label label-<?=$opened_label?>"><?= $opened_desc?></span>
					</td>
					<td class="center">
						<a class="btn btn-success" href="<?= $view_order_url?>">
							<i class="halflings-icon white zoom-in"></i>                                            
						</a>
						
					</td>
				</tr>
				<?php
				}
				?>
			  </tbody>
		  </table>            
		</div>
	</div><!--/span-->
</div><!--/row-->
<?php
echo $custom_pagination;
}
?>