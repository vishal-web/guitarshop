<h1>Manage Accounts</h1>
<?php
	if (isset($flash)) {
		echo $flash;
	}
?>
<?php
	$create_account_url = base_url().'store_accounts/create';
?>
<p style="margin-top: 25px;">
<a href="<?= $create_account_url?>"><button type="button" class="btn btn-primary">Add New Accounts</button></a>
</p>
<div class="row-fluid sortable">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon white briefcase"></i><span class="break"></span>Customer Accounts</h2>
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
					<th>#</th>
					<th>Username</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Company Name</th>
					<th>Date Create</th>
					<th>Actions</th>
			
				</tr>
			</thead>   
			  <tbody>
			  	<?php
			  		$i = 1;
			  		foreach($query->result() as $row) {
		  			$edit_account_url = base_url().'store_accounts/create/'.$row->id;
		  			$view_account_url = base_url().'store_accounts/view/'.$row->id;
		  			$delete_account_url = base_url().'store_accounts/deleteconf/'.$row->id;
		  		
		  			$this->load->module('timedate');
		  			$date_created = $this->timedate->get_nice_date($row->date_made,'shorter');
			  			
			  	?>	
				<tr>
					<td><?= $i++ ?></td>
					<td><?= $row->username ?></td>
					<td><?= $row->firstname ?></td>
					<td class="center"><?= $row->lastname?></td>
					<td class="center"><?= $row->company?></td>
					<td class="center"><?= $date_created?></td>
					<td class="center">
						<a class="btn btn-success" href="#">
							<i class="halflings-icon white zoom-in"></i>                                            
						</a>
						<a class="btn btn-info" href="<?= $edit_account_url ?>">
							<i class="halflings-icon white edit"></i>                                            
						</a>
						<a class="btn btn-danger" href="<?= $delete_account_url ?>">
							<i class="halflings-icon white trash"></i>                                            
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