<h1>Manage Bottom Navigation Blocks</h1>
<?php
	if (isset($flash)) {
		echo $flash;
	}
?>
<?php
	$create_homepage_offers_url = base_url().'btm_nav/create';
	echo Modules::run('btm_nav/_draw_create_modal');
?>
<p style="margin-top: 25px;">

</p>
<div class="row-fluid sortable">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="white icon-align-justify"></i><span class="break"></span>Existing Bottom Navigation L</h2>
			<div class="box-icon">
				<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
				<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
				<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
			</div>
		</div>
		<div class="box-content">
    		<?= Modules::run('btm_nav/_draw_sortable_list')?>
		</div>
	</div><!--/span-->
</div><!--/row-->