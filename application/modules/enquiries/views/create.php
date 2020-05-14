<h1><?= $headline ?></h1>
<?= validation_errors('<p style="color:red">','</p>')?>
<?php
	if (isset($flash)) {
		echo $flash;
	}
	echo $sent_by;
?>

<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon white edit"></i><span class="break"></span>Message Details</h2>
			<div class="box-icon">
				<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
				<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
				<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
			</div>
		</div>
		<div class="box-content">
			<?php
				$form_url = base_url().'enquiries/create/'.$update_id;
			?>
			<form method="POST" action="<?= $form_url ?>" class="form-horizontal">
			  <fieldset>
				<?php
				if (!isset($sent_by)) {	?>
				<div class="control-group">
				  <label class="control-label" for="typeahead">Recipent </label>
				  <div class="controls">

					<?php
						$additional_dd_option = array('class'=>'form_control span4');
						
						echo form_dropdown('sent_to', $options,$sent_to, $additional_dd_option);
					?>
				  </div>
				</div>
				<?php } ?>
				<div class="control-group">
				  <label class="control-label" for="typeahead">Subject </label>
				  <div class="controls">
					<input type="text" class="span6" name="subject" value="<?= $subject?>">
				  </div>
				</div>

				<div class="control-group hidden-phone">
				  <label class="control-label" for="textarea2">Message</label>
				  <div class="controls">
					<textarea class="cleditor" name="message" id="textarea2" rows="3"><?= $message?></textarea>
				  </div>
				</div>
				
				<div class="form-actions">
				  <button type="submit" name="submit" value="Submit" class="btn btn-primary">Submit</button>
				  <button type="submit" name="submit" value="Cancel" class="btn">Cancel</button>
				</div>
			  </fieldset>
			  <?php
			  	echo form_hidden('sent_to',$sent_by);
			  ?>
			</form>   

		</div>
	</div><!--/span-->

</div><!--/row-->