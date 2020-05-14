<h1>Manage Slider Blocks</h1>
<?php
	if (isset($flash)) {
		echo $flash;
	}

	$create_slider_url = base_url().'sliders/create';

?>
<p style="margin-top: 25px;">
<a href="<?= $create_slider_url?>"><button type="button" class="btn btn-primary">Create New Slider</button></a>
</p>
<?php
	if ($num_rows<1) {
		echo '<p>You currently have no sliders on this website.</p>';
	}else{
?>
<div class="row-fluid sortable">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="white icon-align-justify"></i><span class="break"></span>Existing Sliders</h2>
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
						<th>Slider Title</th>
						<th>Target Url</th>
						<th class="span2">Actions</th>
					</tr>
				</thead>   
			  	<tbody>
			  	<?php
			  		$i = 1;
			  		foreach($query->result() as $row) {
			  			$edit_slider_url = base_url().'sliders/create/'.$row->id;
			  			$view_slider_url = base_url().$row->target_url;
			  			$delete_url = base_url().'';
			  	?>	
				<tr>
					<td><?= $i++ ?></td>
					
					<td class="center"><?= $row->slider_title?></td>
					<td class="center"><?= $view_slider_url?></td>

					<td class="center">
						<a class="btn btn-success" href="<?= $view_slider_url?>">
							<i class="halflings-icon white zoom-in"></i>                                            
						</a>
						<a class="btn btn-info" href="<?= $edit_slider_url ?>">
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
<?php
	}
?>