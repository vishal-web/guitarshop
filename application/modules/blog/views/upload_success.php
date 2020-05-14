<h1><?= $headline ?></h1>
<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon white edit"></i><span class="break"></span>Upload Success</h2>
			<div class="box-icon">
				<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
				<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
				<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
			</div>
		</div>
		<div class="box-content">
			<h3>Your file was successfully uploaded!</h3>

			<ul>
				<?php foreach ($upload_data as $item => $value):?>
					<li><?php echo $item;?>: <?php echo $value;?></li>
				<?php endforeach; ?>

			</ul>
			<?php
				$edit_blog_url = base_url().'blog/create/'.$update_id;
			?>	
			<a href="<?= $edit_blog_url ?>"><button type="button" class="">Return To Main Update Blog Page</button></a>
		</div>
	</div>
</div>
