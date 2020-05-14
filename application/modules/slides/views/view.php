<h1><?= $headline?></h1>
<a href="<?= base_url() ?>slides/update_group/<?= $parent_id?>"><button type="button" class="btn btn-default">Previous Page</button></a>
<div style="clear: both;margin-top: 24px;">
<?php
	echo Modules::run('slides/_draw_img_btn',$update_id);
?>
</div>
<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon white edit"></i><span class="break"></span><?= $entity_name?> details</h2>
			<div class="box-icon">
				<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
				<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
				<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
			</div>
		</div>
		<div class="box-content">
			<?php
				$form_url = base_url().'slides/submit/'.$update_id;
			?>
			<form method="POST" action="<?= $form_url ?>" class="form-horizontal">
			  <fieldset>
				<div class="control-group">
				  <label class="control-label" for="typeahead">Target Url <spna style="color: green;">(Optional)</spna></label>
				  <div class="controls">
					<input type="text" class="span6" name="target_url" value="<?= $target_url?>">
				  </div>
				</div>

				<div class="control-group">
				  <label class="control-label" for="typeahead">Alt-Text <spna style="color: green;">(Optional)</spna></label>
				  <div class="controls">
					<input type="text" class="span2" name="alt_text" value="<?= $alt_text?>">
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