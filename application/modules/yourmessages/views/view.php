<div class="row">
	<div class="col-md-8">
		<p style="margin-top: 20px;">Message sent on <span style="color: #888;"><?= $date_created?></span></p>
		<p style="margin-top: 20px">
			<a href="<?= base_url()?>yourmessages/create/<?=$code?>" class="btn btn-default">Reply</a>
		</p>
		<h4 style="margin-top: 50px;"><?= $subject?></h4>
		<p style="margin-top:15px;"><?= $message?></p>
	</div>
</div>