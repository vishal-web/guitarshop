<?php
	$this->load->module('store_categories');
	foreach($parent_categories as $key=>$value) {
		$parent_cat_title = $value;
		$parent_cat_id = $key;
?>
	<ul class="nav navbar-nav">
	<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><?= $parent_cat_title?>&nbsp;<span class="caret"></span></a>
	  <ul class="dropdown-menu">
	  	<?php
	  		$query = $this->store_categories->get_where_custom('parent_cat_id',$parent_cat_id);
	  		foreach($query->result() as $row) {
	  			$cat_url = strtolower($row->cat_url);
	  			echo '<li><a href="'.$target_url_start.$cat_url.'">'.$row->cat_title.'</a></li>';
	  		}
	  	?> 
	  </ul>
	</li>
	</ul>
<?php } ?>