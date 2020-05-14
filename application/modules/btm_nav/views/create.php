<h1><?= $headline ?></h1>
<?= validation_errors('<p style="color:red">','</p>')?>
<?php
	if (isset($flash)) {
		echo $flash;
	}
?>
<?php
	if (isset($update_id)) {
?>
<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon white edit"></i><span class="break"></span>Home Offers details</h2>
			<div class="box-icon">
				<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
				<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
				<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
			</div>
		</div>
		<div class="box-content">
			<a href="<?= base_url() ?>btm_nav/manage"><button type="button" class="btn btn-default">Previous Page</button></a>	
			<a href="<?= base_url() ?>homepage_offers/update/<?=$update_id?>"><button type="button" class="btn btn-primary">Assign Items to This Offer</button></a>			
			<a href="<?= base_url() ?>btm_nav/deleteconf/<?=$update_id?>"><button type="button" class="btn btn-danger">Delete Entire Offers</button></a>			
					
		</div>
	</div>
</div>
<?php
}
?>
<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon white edit"></i><span class="break"></span>Bottom Navigation details</h2>
			<div class="box-icon">
				<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
				<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
				<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
			</div>
		</div>
		<div class="box-content">
			<?php
				$form_url = base_url().'btm_nav/create/'.$update_id;
			?>
			<form method="POST" action="<?= $form_url ?>" class="form-horizontal">
			  <fieldset>
			  	
				<div class="control-group">
				  <label class="control-label" for="typeahead">Offer Block Title </label>
				  <div class="controls">
					<input type="text" class="span6" name="block_title" value="<?= $block_title?>">
				  </div>
				</div>
				<div class="form-actions">
				  <button type="submit" name="submit" value="Submit" class="btn btn-primary">Submit</button>
				  <button type="submit" name="submit" value="Cancel" class="btn">Cancel</button>
				</div>
				
			</form>   

		</div>
	</div><!--/span-->

</div><!--/row-->
