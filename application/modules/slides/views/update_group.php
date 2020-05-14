<h1><?= $headline?></h1>
<?php
	if (isset($flash)) {
		echo $flash;
	}
?>

<?php
	$create_page_url = base_url().'blog/create';
	echo Modules::run('slides/_draw_create_modal',$parent_id);

	if ($num_rows<1) {
		echo '<p>So far no have not uploaded any "'.$entity_name.' for '.$parent_title.'"</p>';
	}else{
?>

<div class="row-fluid sortable">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon white tag"></i><span class="break"></span>Custom Blog</h2>
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
		  			$target_url = $row->target_url;
		  			if ($target_url!='') {
		  				$view_page_url = $target_url;
		  			}
		  			$edit_page_url = base_url().'slides/view/'.$row->id;
		  			
		  			$delete_url = base_url().'';

		  			$picture = $row->picture;
		  			$picture_path = base_url().'slider_pics/'.$picture;
			  	?>	
				<tr>
					<td>
						<?php
						if($picture!=''){ ?>
						<img src="<?= $picture_path ?>">
						<?php } ?>
					</td>
					
					<td class="center">
						<?php
						if (isset($view_page_url)) { ?>
						<a class="btn btn-success" href="<?= $view_page_url?>">
							<i class="halflings-icon white eye-open"></i>                                            
						</a>
						<?php } ?>
						<a class="btn btn-info" href="<?= $edit_page_url ?>">
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