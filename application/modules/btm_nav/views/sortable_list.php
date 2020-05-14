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
	
	foreach($query->result() as $row) {
		$edit_homepage_offers_url = base_url().'btm_nav/create/'.$row->id;
		$view_homepage_offers_url = base_url().'btm_nav/view/'.$row->id;
		$delete_homepage_offers_url = base_url().'btm_nav/delete/'.$row->id;
?>	
	<li class="sort" id="<?= $row->id?>"><i class="icon-sort"></i>
		<b>Page Title: </b><?= $row->page_title?> | <b>Page Url: </b><?= $row->page_url?>
	<?php 
	if (!in_array($row->page_id, $special_pages)) { ?>
		<a class="btn btn-small btn-danger" href="<?= $delete_homepage_offers_url ?>">
			<i class="halflings-icon white trash"></i>                                            
		</a> 
	<?php } ?>
	</li>
<?php }?>
</ul>