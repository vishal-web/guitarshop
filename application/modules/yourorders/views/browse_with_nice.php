<h2>Your Orders</h2>
<?php
	echo $num_rows;
	die();
?>
<div class="row">
	<div class="col-md-12">
		<?= $showing_statement?>
		<?= $custom_pagination?>
	</div>
<?php
	$grand_total = 0;
	$this->load->module('timedate');
	foreach ($query->result() as $row) {
	$small_pic = $row->small_pic;
	$small_pic_path = base_url().'small_pics/'.$small_pic;	

	$sub_total = $row->price*$row->item_qty;
	$sub_total_desc = number_format($sub_total,2);

	$sub_total_with_shipping = $sub_total + $shipping;
	$sub_total_desc_shipping = number_format($sub_total_with_shipping,2);

	$date_created = $this->timedate->get_nice_date($row->date_created,'shorter');
	$grand_total = $grand_total + $sub_total;
?>
	<div class="col-lg-10">
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="panel-title row">
					<div class="col-lg-12">
						<button class="btn btn-sm btn-primary pull-left">Order Ref : <?= $row->order_ref?></button>
						<button class="btn btn-sm btn-primary pull-right">Track</button>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<table class="table tbl" style="margin-bottom: 0px;">
					<tbody>
						<tr>
							<td class="col-md-2">
								<div class="" style="height:75px; width: 75px; position: relative; margin: 0 auto;">
									<?php
									if ($small_pic!="") {
										echo '<img class="img-responsive" style="height:75px;" src="'.$small_pic_path.'">';
									}else{
										echo 'No Image Preview is available';
									}
									?>
								</div>
							</td>
							<td class="col-md-6">
								<b><?= $row->item_title?></b><br>
								Item Price : <?= $currency_symbol.$row->price?><br><br>
								Quantity : <b><?= $row->item_qty?></b><br><br>
							</td>
							<td class="col-md-2"><b><?= $currency_symbol.$sub_total_desc?></b> </td>
							<td class="col-md-2"><?= $row->status_title?> </td>
							
						</tr>
					</tbody>
				</table>
			</div>
			<div class="panel-footer row" style="margin-right: 0px;margin-left: 0px;">
				<div class="">
					<div class="pull-left">Ordered On : <?= $date_created ?></div>
					<div class="pull-right">Order Total :<b><?= $currency_symbol.$sub_total_desc_shipping;?></b></div>
				</div>
			</div>
		</div>
	</div>
<?php
}
?>	
</div>
<style>
	.tbl>tbody>tr>td {
		border-top: 0px solid transparent;
	}
</style>