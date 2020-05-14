<h1>Manage Categories</h1>
<?php
	if (isset($flash)) {
		echo $flash;
	}
?>
<?php
	$create_categories_url = base_url().'store_categories/create';
?>
<p style="margin-top: 25px;">
<a href="<?= $create_categories_url?>"><button type="button" class="btn btn-primary">Add New Category</button></a>
</p>
<div class="row-fluid sortable">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="white icon-align-justify"></i><span class="break"></span>Categories Inventory</h2>
			<div class="box-icon">
				<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
				<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
				<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
			</div>
		</div>
		<div class="box-content">
			<?php
				echo Modules::run('store_categories/_draw_sortable_list',$parent_cat_id);
			?>
			<!-- <table class="table table-striped table-bordered"> -->
			<!-- <thead>
				<tr>
					<th>#</th>
					<th>Category title</th>
					<th>Parent Category</th>
					<th>Sub Categories</th>
					<th>Actions</th>
				</tr>
			</thead>   
			  <tbody>
			  	<?php
			  		$i = 1;
			  		$this->load->module('store_categories');
			  		foreach($query->result() as $row) {
		  			$edit_categories_url = base_url().'store_categories/create/'.$row->id;
		  			$view_categories_url = base_url().'store_categories/view/'.$row->id;
		  			$delete_url = base_url().'';
		  			if ($row->parent_cat_id=='0') {
		  				$parent_cat_title = '-';
		  			}else{
		  				$parent_cat_title = $this->store_categories->_get_cat_title($row->parent_cat_id);
			  		}

			  		$num_sub_cats = $this->store_categories->_count_sub_cats($row->id);
			  	?>	
				<tr>
					<td><?= $i++ ?></td>
					<td><?= $row->cat_title ?></td>
				
					<td class="center"><?= $parent_cat_title ?></td>
					<td class="center">
					<?php
						if ($num_sub_cats < 1) {
							echo '-';
						}else{
							if ($num_sub_cats == 1){
								$entity = 'Category';
							}else{
								$entity = 'Categories';	
							}		

							$sub_cat_url = base_url().'store_categories/manage/'.$row->id;			
					?>
						<a class="btn btn-success" href="<?=$sub_cat_url?>">
							<i class="halflings-icon white eye-open"></i>
							<?= $num_sub_cats." ".$entity?>                                            
						</a>
					<?php

					}
					?></td>
					<td class="center">
						<a class="btn btn-success" href="<?= $view_categories_url?>">
							<i class="halflings-icon white eye-open"></i>                                            
						</a>
						<a class="btn btn-info" href="<?= $edit_categories_url ?>">
							<i class="halflings-icon white edit"></i>                                            
						</a>
						
					</td>
				</tr>
				<?php
				}
				?>
			  </tbody>
		  </table>       -->      
		</div>
	</div><!--/span-->
</div><!--/row-->