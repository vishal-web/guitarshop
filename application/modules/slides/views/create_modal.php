
<p style="margin-top: 25px;">
	<a href="<?= base_url() ?>sliders/create/<?= $parent_id?>"><button type="button" class="btn btn-default">Previous Page</button></a>
	<a class="btn btn-info" data-toggle="modal" href='#modal-id'>Create New Slide</a>
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
							<label class="control-label" for="typeahead">Target Url (OPTIONAL) </label>
							<div class="controls">
								<input type="text" class="span10" name="target_url" value="" placeholder="enter the target_url here">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="typeahead">Alt-Text (OPTIONAL)</label>
							<div class="controls">
								<input type="text" class="span10" name="alt_text" value="" placeholder="enter the alt text here">
							</div>
						</div>
				</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="submit" name="submit" value="Submit" class="btn btn-primary">Save changes</button>
					</div>
					
					<?= form_hidden('parent_id',$parent_id)?>
				</form>
			</div>
		</div>
	</div>
</p>