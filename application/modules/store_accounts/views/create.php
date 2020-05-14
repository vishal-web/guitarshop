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
			<h2><i class="halflings-icon white edit"></i><span class="break"></span>Account Details</h2>
			<div class="box-icon">
				<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
				<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
				<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
			</div>
		</div>
		<div class="box-content">
			<a href="<?= base_url() ?>store_accounts/update_pword/<?=$update_id?>"><button type="button" class="btn btn-primary">Update Password</button></a>
			<a href="<?= base_url() ?>store_accounts/deleteconf/<?=$update_id?>"><button type="button" class="btn btn-danger">Delete Account</button></a>
		</div>
	</div>
</div>
<?php
}
?>
<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon white edit"></i><span class="break"></span>Account Details</h2>
			<div class="box-icon">
				<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
				<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
				<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
			</div>
		</div>
		<div class="box-content">
			<?php
				$form_url = base_url().'store_accounts/create/'.$update_id;
			?>
			<form method="POST" action="<?= $form_url ?>" class="form-horizontal">
			  	<fieldset>
					<div class="control-group">
						<label class="control-label" for="typeahead">Username</label> 
						<div class="controls">
							<input type="text" class="span6" name="username" value="<?= $username?>"> 
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="typeahead">Firstname</label> 
						<div class="controls">
							<input type="text" class="span6" name="firstname" value="<?= $firstname?>"> 
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="typeahead">Lastname</label> 
						<div class="controls">
							<input type="text" class="span6" name="lastname" value="<?= $lastname?>"> 
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="typeahead">Company</label> 
						<div class="controls">
							<input type="text" class="span6" name="company" value="<?= $company?>"> 
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="typeahead">Address1</label> 
						<div class="controls">
							<input type="text" class="span6" name="address1" value="<?= $address1?>"> 
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="typeahead">Address2</label> 
						<div class="controls">
							<input type="text" class="span6" name="address2" value="<?= $address2?>"> 
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="typeahead">Town</label> 
						<div class="controls">
							<input type="text" class="span6" name="town" value="<?= $town?>"> 
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="typeahead">Country</label> 
						<div class="controls">
							<input type="text" class="span6" name="country" value="<?= $country?>"> 
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="typeahead">Postcode</label> 
						<div class="controls">
							<input type="text" class="span6" name="postcode" value="<?= $postcode?>"> 
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="typeahead">Teliphone number</label> 
						<div class="controls">
							<input type="text" class="span6" name="telnum" value="<?= $telnum?>"> 
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="typeahead">Email</label> 
						<div class="controls">
							<input type="text" class="span6" name="email" value="<?= $email?>"> 
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


