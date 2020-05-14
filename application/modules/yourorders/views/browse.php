<h2>Your Orders</h2>
<?php
if ($num_rows<1) {
	echo '<p>Your have not placed any orders so far.</p>';
}else{ 
	echo $showing_statement;
	echo $custom_pagination;
?>
</p>
<table class="table table-striped table-bordered">
	<thead>
		<tr style="background-color: #666; color: white;">
			<th>Order Ref</th>
			<th>Order Value</th>
			<th>Date Ordered</th>
			<th>Order Status</th>
			<th>Actions</th>
		</tr>
	</thead>   
	<tbody>
	  	<?php
	  	$this->load->module('timedate');
	  	foreach($query->result() as $row) {		
	  		$view_url = base_url().'yourorders/view/'.$row->order_ref; 

			$date_created = $this->timedate->get_nice_date($row->date_created,'cool');
	  	?>	
		<tr>
			<td><?= $row->order_ref?></td>
			<td><?= $row->mc_gross?></td>
			<td><?= $date_created?></td>
			<td><?= $order_status_title[$row->order_status]?></td>
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

<?php
echo $custom_pagination;

}
?>
