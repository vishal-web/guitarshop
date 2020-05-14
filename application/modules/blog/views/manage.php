<h1>Update Blog</h1>
<?php
	if (isset($flash)) {
		echo $flash;
	}
?>

<?php
	$create_page_url = base_url().'blog/create';
?>
<p style="margin-top: 25px;">
<a href="<?= $create_page_url?>"><button type="button" class="btn btn-primary">Create New Webpage</button></a>
</p>
<div class="row-fluid sortable">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon white tag"></i><span class="break"></span>Custom Blog</h2>
			<div class="box-icon">
				<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
				<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
				<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
			</div>
		</div>
		<div class="box-content">
			<table class="table table-striped table-bordered">
			<thead>
				<tr>
					<th>Picture</th>
					<th>Date Published</th>
					<th>Author</th>
					<th>Blog Url</th>
					<th>Blog Headline</th>
					<th class="span2">Actions</th>
				</tr>
			</thead>   
			  <tbody>
			  	<?php
			  		$i = 1;
			  		$this->load->module('timedate');
			  		foreach($query->result() as $row) {
			  			$edit_page_url = base_url().'blog/create/'.$row->id;
			  			$view_page_url = base_url().$row->page_url;
			  			$delete_url = base_url().'';

			  			$small_pic = $row->small_pic;
			  			$small_pic_path = base_url().'blog_pics/small_pics/'.$small_pic;
			  			$date_published = $this->timedate->get_nice_date($row->date_published,'mini');
			  	?>	
				<tr>
					<td><img src="<?= $small_pic_path ?>" alt="<?=$row->page_title?>" width="50" height="50"></td>
					<td><?= $date_published ?></td>
					<td><?= $row->author ?></td>
					
					<td class="center"><?= $view_page_url?></td>
					<td class="center"><?= $row->page_title?></td>

					<td class="center">
						<a class="btn btn-success" href="<?= $view_page_url?>">
							<i class="halflings-icon white zoom-in"></i>                                            
						</a>
						<a class="btn btn-info" href="<?= $edit_page_url ?>">
							<i class="halflings-icon white edit"></i>                                            
						</a>
						
					</td>
				</tr>
				<?php
				}
				?>
			  </tbody>
		  </table>            
		</div>
	</div><!--/span-->
</div><!--/row-->