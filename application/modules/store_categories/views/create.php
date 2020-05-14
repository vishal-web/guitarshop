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
			<h2><i class="halflings-icon white edit"></i><span class="break"></span>Category details</h2>
			<div class="box-icon">
				<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
				<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
				<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
			</div>
		</div>
		<div class="box-content">

			<a href="<?= base_url() ?>store_item_colors/update/<?=$update_id?>"><button type="button" class="btn btn-primary">Update Item Colors</button></a>
			<a href="<?= base_url() ?>store_item_sizes/update/<?=$update_id?>"><button type="button" class="btn btn-primary">Update Item Sizes</button></a>
			<a href="<?= base_url() ?>store_cat_assign/update/<?=$update_id?>"><button type="button" class="btn btn-primary">Update Item Categories</button></a>
			<a href="<?= base_url() ?>store_categories/deleteconf/<?= $update_id?>"><button type="button" class="btn btn-danger">Delete Category </button></a>
			<a href="<?= base_url() ?>store_categories/view/<?= $update_id?>"><button type="button" class="btn btn-default">Shop Category in Shop</button></a>
			
		</div>
	</div>
</div>
<?php
}
?>
<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon white edit"></i><span class="break"></span>Category details</h2>
			<div class="box-icon">
				<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
				<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
				<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
			</div>
		</div>
		<div class="box-content">
			<?php
				$form_url = base_url().'store_categories/create/'.$update_id;
			?>
			<form method="POST" action="<?= $form_url ?>" class="form-horizontal">
			  <fieldset>
			  	<?php
			  	if ($num_dropdown_options > 1) {?>
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
						echo form_dropdown('parent_cat_id', $options, $parent_cat_id,$addional_dropdown_code);
						?>
					</div>
				</div>
				<?php 
					}else {
						echo form_hidden('parent_cat_id','0');
					}
				?>
				<div class="control-group">
				  <label class="control-label" for="typeahead">Category </label>
				  <div class="controls">
					<input type="text" class="span6" name="cat_title" value="<?= $cat_title?>">
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
