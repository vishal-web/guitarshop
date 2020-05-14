<h1>Your <?= $folder_type?></h1>
<?php
	if (isset($flash)) {
		echo $flash;
	}
?>
<?php
	$create_message_url = base_url().'yourmessages/create';
?>
<p style="margin-top: 25px;">
<a href="<?= $create_message_url?>"><button type="button" class="btn btn-primary">Compose Message</button></a>
</p>

		<table class="table table-striped table-bordered">
			<thead>
				<tr style="background-color: #666; color: white;">
					<th>&nbsp;</th>
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
			  	$this->load->module('site_settings');

			  	$team_name = $this->site_settings->_get_support_team();
			  	foreach($query->result() as $row) {		
			  		$opened = $row->opened;
			  		$customer_data['firstname'] = $row->firstname;
			  		$customer_data['lastname'] = $row->lastname;
			  		$customer_data['company'] = $row->company;



			  		$view_url = base_url().'yourmessages/view/'.$row->code; 
			  		if ($opened==1) {
 						$icon = '<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>'; 						
   					}else{
 						$icon = '<span class="glyphicon glyphicon-envelope" style="color:orange" aria-hidden="true"></span>'; 						
   					}

   					if ($row->sent_by==0) {
   						$sent_by= $team_name;
   					}else{
   						$sent_by = $this->store_accounts->_get_customer_name($row->sent_by,$customer_data);
   					}

   					$date_sent = $this->timedate->get_nice_date($row->date_created,'mini');
			  	?>	
				<tr>
					<td><?= $icon?></td>
					<td><?= $date_sent?></td>
					<td><?= $sent_by?></td>
					<td><?= $row->subject?></td>
					<td class="center">
						<a class="btn btn-default" href="<?= $view_url?>">
							<span class="glyphicon glyphicon-eye-open"></span> View
							                                            
						</a>
					</td>
				</tr>
				<?php
				}
				?>
			  </tbody>
		  </table>            
		