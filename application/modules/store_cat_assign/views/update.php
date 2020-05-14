<h1><?= $headline ?></h1>
<?php
	if (isset($flash)) {
		echo $flash;
	}
?>
<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon white edit"></i><span class="break"></span>New Category Option</h2>
			<div class="box-icon">
				<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
				<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
				<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
			</div>
		</div>
		<div class="box-content">
			<p>Choose a new Category and Hit Submit.</p>
			<?php
				$form_url = base_url().'store_cat_assign/submit/'.$item_id;
			?>
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
						echo form_dropdown('cat_id', $options, $cat_id,$addional_dropdown_code);
						?>
					</div>
				</div>

				<div class="form-actions">
				  <button type="submit" name="submit" value="Submit" class="btn btn-primary">Submit</button>
				  <button type="submit" name="submit" value="Finished" class="btn">Finished</button>
				</div>
			  </fieldset>
			</form>   

		</div>
	</div><!--/span-->

</div><!--/row-->
<?php
if ($num_rows>0) { ?>
<div class="row-fluid sortable">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon white tag"></i><span class="break"></span>Assigned Categories For this Items</h2>
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
					<th>Count</th>
					<th>Category Title</th>
					<th>Actions</th>
				</tr>
			</thead>   
			  <tbody>
			  	<?php
			  		$i = 1;
			  		$this->load->module('store_categories');
			  		foreach($query->result() as $row) {
			  			$delete_url = base_url().'store_cat_assign/delete/'.$row->id;
			  			$parent_cat_title = $this->store_categories->_get_parent_cat_title($row->cat_id);
			  			$cat_title = $this->store_categories->_get_cat_title($row->cat_id);
			  			$long_cat_title = $parent_cat_title." > ".$cat_title;
			  	?>	
				<tr>
					<td><?= $i++ ?></td>
					<td><?= $long_cat_title ?></td>
					<td class="center">
						<a class="btn btn-danger" href="<?= $delete_url?>">
							<i class="halflings-icon white trash"></i> Remove Option
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
<?php } ?>