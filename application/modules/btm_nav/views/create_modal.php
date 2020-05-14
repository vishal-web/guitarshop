<p style="margin-top: 25px;">
	<a class="btn btn-info" data-toggle="modal" href='#modal-id'>Create New Link</a>
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
						<label class="control-label" class="span8" for="selectError3">Page Url: </label>
							<div class="controls">
							<?php
								$addional_dropdown_code = array('id'=>'selectError3');
								echo form_dropdown('page_id', $options, '',$addional_dropdown_code);
							?>
					</div>
				</div>
				</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="submit" name="submit" value="Submit" class="btn btn-primary">Save changes</button>
					</div>
					
				</form>
			</div>
		</div>
	</div>
</p>