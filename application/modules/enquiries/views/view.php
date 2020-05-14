<?php
$form_location = base_url().'comments/submit';
?>
<h1><?= $headline ?></h1>
<?= validation_errors('<p style="color:red">','</p>')?>
<?php

if (isset($flash)) {
	echo $flash;
}

$this->load->module('store_accounts');
$this->load->module('timedate');
foreach($query->result() as $row) {		
	$ranking = $row->ranking;
	$subject = $row->subject;
	$message = $row->message;

	$view_url = base_url().'enquiries/view/'.$row->id; 
	if ($row->opened==1) {
		$icon = '<i class="icon-envelope"></i>'; 						
	}else{
		$icon = '<i class="icon-envelope-alt" style="color:orange"></i>'; 						
	}

	if ($row->sent_by==0) {
		$sent_by="Admin";
	}else{
		$sent_by = $this->store_accounts->_get_customer_name($row->sent_by);
	}

	$date_sent = $this->timedate->get_nice_date($row->date_created,'full');
}
?>

<p style="margin-top: 25px;">
	<a href="<?= base_url()?>enquiries/create/<?= $update_id?>">
		<button type="button" class="btn btn-primary">Reply To This Message</button>
	</a>
	<a class="btn btn-info" data-toggle="modal" href='#modal-id'>Create New Comment</a>
	<div class="modal fade" id="modal-id">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Create Comment</h4>
				</div>
				<div class="modal-body">
					<form action="<?= $form_location?>" method="POST" class="form-horizontal" role="form">
						<div class="control-group">
							<label class="control-label" for="textarea2">Comment</label>
							<div class="controls">
								<textarea class="" name="comment" id="textarea2" rows="4"></textarea>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Save changes</button>
					</div>
					<?= form_hidden('comment_type','e')?>
					<?= form_hidden('update_id',$update_id)?>
				</form>
			</div>
		</div>
	</div>
</p>
<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon white star"></i><span class="break"></span>Enaquiry Ranking</h2>
			<div class="box-icon">
				<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
				<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
				<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
			</div>
		</div>
		<div class="box-content">
			<?php
				$form_url = base_url().'enquiries/submit_ranking/'.$update_id;
			?>
			<form method="POST" action="<?= $form_url ?>" class="form-horizontal">
			  <fieldset>
			  	<div class="control-group">
				<label class="control-label" for="selectError3">Ranking</label>
					<div class="controls">
						<?php
						$addional_dropdown_code = array('id'=>'selectError3');
						if ($ranking>0) {
							unset($options['']);
						}
						echo form_dropdown('ranking', $options, $ranking,$addional_dropdown_code);
						?>
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
<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon white edit"></i><span class="break"></span>Enquiries details</h2>
			<div class="box-icon">
				<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
				<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
				<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
			</div>
		</div>
		<div class="box-content">
			<table class="table table-striped table-bordered">
				<tr><td style="font-weight: bold;">Date Sent</td><td><?= $date_sent?></td></tr>
				<tr><td style="font-weight: bold;">Sent By</td><td><?= $sent_by?></td></tr>
				<tr><td style="font-weight: bold;">Subject</td><td><?= $subject?></td></tr>
				<tr><td style="font-weight: bold; vertical-align: top;">Message</td><td style="vertical-align: top;"><?= nl2br($message)?></td></tr>
			</table>
		</div>
	</div><!--/span-->
</div><!--/row-->
<?php
echo Modules::run('comments/_draw_comments','e',$update_id);
?>