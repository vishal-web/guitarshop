<style>
.sort {
	list-style: none;
	border : 1px solid #ccc;
	color: 333;
	padding: 8px;
	margin-bottom: 4px;
}
</style>
<ul id="sortlist">
<?php
	$i = 1;
	$this->load->module('sliders');
	foreach($query->result() as $row) {
		$edit_sliders_url = base_url().'sliders/create/'.$row->id;
		$view_sliders_url = base_url().'sliders/view/'.$row->id;
?>	
	<li class="sort" id="<?= $row->id?>"><i class="icon-sort"></i>
		<a href="<?= $edit_homepage_offers_url ?>"><?= $row->slider_title?></a>
	
	<!--<a class="btn btn-small btn-info" href="<?= $edit_homepage_offers_url ?>">
			<i class="halflings-icon white edit"></i>                                            
		</a> -->
	</li>
<?php }?>
</ul>