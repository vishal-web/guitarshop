<h1><?= $headline?></h1>
<h2 style="margin-top: 20px;"><?= $sub_headline?></h2>
<?php
	if (isset($flash)) {
		echo $flash;
	}
?>
<a href="<?= base_url() ?>store_items/create/<?= $parent_id?>"><button type="button" class="btn btn-default">Previous Page</button></a>
<a href="<?= base_url() ?>item_galleries/upload_image/<?= $parent_id?>"><button type="button" class="btn btn-primary">Upload Picture</button></a>
<?php
	$create_page_url = base_url().'blog/create';
	
	if ($num_rows<1) {
		echo '<p>So far no have not uploaded any gallery "'.$entity_name.' for '.$parent_title.'"</p>';

	}else{
?>

<div class="row-fluid sortable" style="margin-top: 20px;">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon white tag"></i><span class="break"></span>Picture Galleries</h2>
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
					<th>Picture</th>
					<th class="span2">Actions</th>
				</tr>
			</thead>   
			  <tbody>
			  	<?php
		  		$i = 1;
		  		
		  		foreach($query->result() as $row) {
		  			$delete_url = base_url().'item_galleries/deleteconf/'.$row->id;
		  			$picture = $row->picture;
		  			$picture_path = base_url().'item_galleries_pics/'.$picture;
			  	?>	
				<tr>
					<td>
						<?php
						if($picture!=''){ ?>
						<img src="<?= $picture_path ?>">
						<?php } ?>
					</td>
					
					<td class="center">
						<a class="btn btn-danger" href="<?= $delete_url ?>">
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

<?php
	}
?>