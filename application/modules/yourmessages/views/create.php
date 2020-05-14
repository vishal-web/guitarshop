<h1 style="margin-bottom: 30px;"><?= $headline ?></h1>
<?= validation_errors('<p style="color:red">','</p>')?>
<?php
	$form_location = current_url();
	if (isset($flash)) {
		echo $flash;
	}
?>
<div class="row">
	<div class="col-md-8">
		<form action="<?= $form_location?>" method="POST" role="form">
			<?php
			if ($code=="") { ?>
			<div class="form-group">
				<label for="">Subject</label>
				<input type="text" name="subject" value="<?=$subject?>" class="form-control" id="" placeholder="Enter Your Subject">
			</div>
			<?php
			}else{
				echo form_hidden('subject', $subject);
			}
			?>
			<div class="form-group">
				<label for="">Message</label>
				<textarea type="text" name="message" rows="6" class="form-control" id="" placeholder="Enter Your Message"><?= $message?></textarea>
			</div>
			<div class="checkbox">
				<label>
					<input type="checkbox" value="1" name="urgent"
					<?php
						if ($urgent==1) {
							echo 'checked';
						}
					?>
					> Urgent 
				</label>
			</div>
			<button type="submit" name="submit" value="Submit" class="btn btn-primary">Submit Your Message</button>
			<button type="submit" name="submit" value="Cancel" class="btn btn-default">Cancel</button>
			<?= form_hidden('token',$token)?>
		</form>
	</div>
</div>