<h1>Manage Items</h1>
<?php
	if (isset($flash)) {
		echo $flash;
	}
?>
<?php
	$create_item_url = base_url().'store_items/create';
?>
<p style="margin-top: 25px;">
<a href="<?= $create_item_url?>"><button type="button" class="btn btn-primary">Add New Items</button></a>
</p>
<div class="row-fluid sortable">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon white tag"></i><span class="break"></span>Items Inventory</h2>
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
					<th>Item title</th>
					<th>Price</th>
					<th>Was Price</th>
					<th>Status</th>
					<th>Actions</th>
				</tr>
			</thead>   
			  <tbody>
			  	<?php
			  		$i = 1;
			  		foreach($query->result() as $row) {
		  			$edit_item_url = base_url().'store_items/create/'.$row->id;
		  			$view_item_url = base_url().'store_items/view/'.$row->id;
		  			$delete_url = base_url().'';
		  			$status = $row->status;

		  			if ($status == '1') {
		  				$status_label = 'default';
		  				$status_desc = 'Active';
		  			}else {
		  				$status_label = 'danger';
		  				$status_desc = 'Inactive';
		  			}
			  			
			  	?>	
				<tr>
					<td><?= $i++ ?></td>
					<td><?= $row->item_title ?></td>
					<td class="center"><?= $row->item_price?></td>
					<td class="center"><?= $row->was_price?></td>
					<td class="center">
						<span class="label label-<?=$status_label?>"><?= $status_desc?></span>
					</td>
					<td class="center">
						<a class="btn btn-success" href="<?= $view_item_url?>">
							<i class="halflings-icon white zoom-in"></i>                                            
						</a>
						<a class="btn btn-info" href="<?= $edit_item_url ?>">
							<i class="halflings-icon white edit"></i>                                            
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