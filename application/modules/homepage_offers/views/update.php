<h1><?= $headline ?></h1>
<?php
	if (isset($flash)) {
		echo $flash;
	}
?>
<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon white edit"></i><span class="break"></span>New Offer Option</h2>
			<div class="box-icon">
				<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
				<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
				<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
			</div>
		</div>
		<div class="box-content">
			<p>Submit an Item ID , when you are finish adding offers press 'Finished'.</p>
			<?php
				$form_url = base_url().'homepage_offers/submit/'.$update_id;
			?>
			<form method="POST" action="<?= $form_url ?>" class="form-horizontal">
			  <fieldset>
				<div class="control-group">
					<label class="control-label" for="typeahead">New Option</label>
					<div class="controls">
				
						<?php
							$additonal_dropdown_options = array('class' => 'span6');
							echo form_dropdown('item_id', $options, $item_id,$additonal_dropdown_options);
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
			<h2><i class="halflings-icon white tag"></i><span class="break"></span>Existing Offers</h2>
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
					<th>Item ID</th>
					<th>Actions</th>
				</tr>
			</thead>   
			  <tbody>
			  	<?php
			  		$i = 1;
			  		$this->load->module('store_items');
			  		foreach($query->result() as $row) {
			  		$delete_url = base_url().'homepage_offers/delete/'.$row->id;
					$item_title = $this->store_items->_get_item_title($row->item_id);
			  	?>	
				<tr>
					<td><?= $i++ ?></td>
					<td><?= $item_title ?></td>
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