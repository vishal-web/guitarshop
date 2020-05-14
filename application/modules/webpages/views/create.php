<h1><?= $headline ?></h1>
<?= validation_errors('<p style="color:red">','</p>')?>
<?php
	if (isset($flash)) {
		echo $flash;
	}
?>

<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon white edit"></i><span class="break"></span>Item details</h2>
			<div class="box-icon">
				<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
				<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
				<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
			</div>
		</div>
		<div class="box-content">
			<?php
				$form_url = base_url().'webpages/create/'.$update_id;
			?>
			<form method="POST" action="<?= $form_url ?>" class="form-horizontal">
			  <fieldset>
				<div class="control-group">
				  <label class="control-label" for="typeahead">Page title </label>
				  <div class="controls">
					<input type="text" class="span6" name="page_title" value="<?= $page_title?>">
				  </div>
				</div>

				<div class="control-group hidden-phone">
				  <label class="control-label" for="textarea2">Page Keywords </label>
				  <div class="controls">
					<textarea class="span6" name="page_keywords" id="" rows="3"><?= $page_keywords?></textarea>
				  </div>
				</div>

				<div class="control-group hidden-phone">
				  <label class="control-label" for="textarea2">Page Description </label>
				  <div class="controls">
					<textarea class="span6" name="page_description" id="" rows="3"><?= $page_description?></textarea>
				  </div>
				</div>


				<div class="control-group">
				  <label class="control-label" for="typeahead">Headline </label>
				  <div class="controls">
					<input type="text" class="span6" name="page_headline" value="<?= $page_headline?>">
				  </div>
				</div>

				<div class="control-group hidden-phone">
				  <label class="control-label" for="textarea2">Page Content </label>
				  <div class="controls">
					<textarea class="cleditor" name="page_content" id="textarea2" rows="3"><?= $page_content?></textarea>
				  </div>
				</div>
				
				<div class="form-actions">
				  <button type="submit" name="submit" value="Submit" class="btn btn-primary">Submit</button>
				  <button type="submit" name="submit" value="Cancel" class="btn">Cancel</button>
				</div>
			  </fieldset>
			</form>   

		</div>
	</div><!--/span-->

</div><!--/row-->
<?php
	if (isset($update_id)) {
?>
<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon white edit"></i><span class="break"></span>Additional options</h2>
			<div class="box-icon">
				<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
				<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
				<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
			</div>
		</div>
		<div class="box-content">
			<?php
				if($update_id > 2) {
			?>
			<a href="<?= base_url() ?>webpages/deleteconf/<?= $update_id?>"><button type="button" class="btn btn-danger">Delete Page </button></a>
			<?php } ?>
			<a href="<?= base_url() ?><?= $page_url?>"><button type="button" class="btn btn-default"> View Pages</button></a>
			
		</div>
	</div>
</div>
<?php
}
?>


