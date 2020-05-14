<h1>Manage Order Status Options</h1>
<?php
	if (isset($flash)) {
		echo $flash;
	}
?>
<?php
	$create_url = base_url().'store_order_status/create';
?>
<p style="margin-top: 25px;">
<a href="<?= $create_url?>"><button type="button" class="btn btn-primary">Add New Order Status Options</button></a>
</p>
<div class="row-fluid sortable">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon white list-alt"></i><span class="break"></span>Current Status Options</h2>
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
					<th>Status Title</th>
					<th>Actions</th>
				</tr>
			</thead>   
			  <tbody>
			  	<?php
			  		$i = 1;
			  		foreach($query->result() as $row) {
		  			$edit_url = base_url().'store_order_status/create/'.$row->id;
		  			$view_url = base_url().'store_order_status/view/'.$row->id;
		  			$delete_url = base_url().'store_order_status/deleteconf/'.$row->id;
		  					  			
			  	?>	
				<tr>
					<td><?= $i++ ?></td>
					<td class="center"><?= $row->status_title?></td>

					<td class="center">
						<a class="btn btn-info" href="<?= $edit_url ?>">
							<i class="halflings-icon white edit"></i>                                            
						</a>
					<!-- 	<a class="btn btn-danger" href="<?= $delete_url?>">
							<i class="halflings-icon white trash"></i>                                            
						</a> -->
						
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