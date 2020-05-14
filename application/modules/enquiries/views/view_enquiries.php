<h1>Your <?= $folder_type?></h1>
<?php
	if (isset($flash)) {
		echo $flash;
	}
?>
<style>
	.urgent {
		color: red;
	}
</style>
<?php
	$create_message_url = base_url().'enquiries/create';
?>
<p style="margin-top: 25px;">
<a href="<?= $create_message_url?>"><button type="button" class="btn btn-primary">Compose Message</button></a>
</p>
<div class="row-fluid sortable">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon white envelope"></i><span class="break"></span><?= $folder_type?></h2>
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
					<th>&nbsp;</th>
					<th>Ranking</th>
					<th>Date Sent</th>
					<th>Sent By</th>
					<th>Subject</th>
					<th>Actions</th>
				</tr>
			</thead>   
			<tbody>
			  	<?php
			  	$this->load->module('timedate');
			  	$this->load->module('store_accounts');
			  	foreach($query->result() as $row) {		
			  		$ranking = $row->ranking;
			  		$opened = $row->opened;

			  		$customer_data['firstname'] = $row->firstname;
			  		$customer_data['lastname'] = $row->lastname;
			  		$customer_data['company'] = $row->company;



			  		$view_url = base_url().'enquiries/view/'.$row->id; 
			  		if ($opened==1) {
 						$icon = '<i class="icon-envelope"></i>'; 						
   					}else{
 						$icon = '<i class="icon-envelope-alt" style="color:orange"></i>'; 						
   					}

   					if ($row->sent_by==0) {
   						$sent_by="Admin";
   					}else{
   						$sent_by = $this->store_accounts->_get_customer_name($row->sent_by,$customer_data);
   					}

   					if ($row->urgent==1) {
   						$urgent = 'urgent';
   					}else{
   						$urgent = '';
   					}
   					$date_sent = $this->timedate->get_nice_date($row->date_created,'full');
			  	?>	
				<tr class="<?= $urgent?>">
					<td class="span1"><?= $icon?></td>
					<td>
					<?php
						if ($ranking<1) {
							echo '-';
						}else{
							for ($i=0; $i < $ranking ; $i++) { 
								echo '<i class="icon-star"></i>';
							}
						}
					?>
					<td><?= $date_sent?></td>
					</td>
					<td><?= $sent_by?></td>
					<td><?= $row->subject?></td>
					<td class="center">
						<a class="btn btn-success" href="<?= $view_url?>">
							<i class="halflings-icon white zoom-in"></i> 
							                                            
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