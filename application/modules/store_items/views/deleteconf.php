<h1><?= $headline ?></h1>
<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon white edit"></i><span class="break"></span>Delete Confirm</h2>
			<div class="box-icon">
				<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
				<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
				<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
			</div>
		</div>
		<div class="box-content">
			
			<?php
				$attributes = array('class'=>'form-horizontal');
				echo form_open_multipart('store_items/delete/'.$update_id,$attributes); 
			?>
			  	
			<fieldset>
				<div class="control-group" style="min-height: 150px;">
					<p>Are you sure you want to delete the item</p>
					
						<button type="submit" name="submit" value="Yes - Delete Item" class="btn btn-danger">Yes - Delete Item</button>
				  		<button type="submit" name="submit" value="Cancel" class="btn">Cancel</button>
				
				</div>  
			</fieldset>
			<?= form_close(); ?>
		</div>
	</div>
</div>
