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
	$this->load->module('store_categories');
	foreach($query->result() as $row) {
		$edit_categories_url = base_url().'store_categories/create/'.$row->id;
		$view_categories_url = base_url().'store_categories/view/'.$row->id;

		if ($row->parent_cat_id=='0') {
			$parent_cat_title = '-';
		}else{
			$parent_cat_title = $this->store_categories->_get_cat_title($row->parent_cat_id);
		}

		$num_sub_cats = $this->store_categories->_count_sub_cats($row->id);
?>	
	<li class="sort" id="<?= $row->id?>"><i class="icon-sort"></i><?= $row->cat_title?>
		<?php
			if ($num_sub_cats < 1) {
				echo '&nbsp';
			}else{
				if ($num_sub_cats == 1){
					$entity = 'Category';
				}else{
					$entity = 'Categories';	
				}		

				$sub_cat_url = base_url().'store_categories/manage/'.$row->id;			
		?>
			<a class="btn btn-small btn-success" href="<?=$sub_cat_url?>">
				<i class="halflings-icon white eye-open"></i>
				<?= $num_sub_cats." ".$entity?>                                            
			</a>

		<?php

		}
		?>
		<a class="btn btn-small btn-info" href="<?= $edit_categories_url ?>">
			<i class="halflings-icon white edit"></i>                                            
		</a>
	</li>
	<?php }?>
</ul>