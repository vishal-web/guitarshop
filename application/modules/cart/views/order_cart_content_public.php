<div class="row">
	<div class="col-lg-10">
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="panel-title row">
					<div class="col-lg-12">
						<button class="btn btn-sm btn-primary pull-left">Order Ref : <?= $order_ref?></button>
						<button class="btn btn-sm btn-primary pull-right">Track</button>
					</div>
				</div>
			</div>
			<div class="panel-body" style="padding:0px;">
				<table class="table tbl" style="margin-bottom: 0px;">
					<tbody>
						<?php
							$grand_total = 0;
							$this->load->module('timedate');
							foreach ($query_cc->result() as $row) {
							$small_pic = $row->small_pic;
							$small_pic_path = base_url().'small_pics/'.$small_pic;	

							$sub_total = $row->price*$row->item_qty;
							$sub_total_desc = number_format($sub_total,2);

							$sub_total_with_shipping = $sub_total + $shipping;
							$sub_total_desc_shipping = number_format($sub_total_with_shipping,2);
							
							$grand_total = $grand_total + $sub_total;
						?>
						<tr>
							<td class="col-md-2">
								<div class="" style="height:75px; width: 75px; position: relative; margin: 0 auto; padding-top: 10px;">
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
							<td class="col-md-2"><?= $order_status_title?> </td>
							
						</tr>
						<?php
						}
						?>
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
</div>
<style>
	.tbl>tbody>tr {
		padding-top: 15px;
	}
	.tbl>tbody>tr>td {
		padding-top: 15px;
		border-top: 0px solid transparent;
	}
	.tbl>tbody>tr>td {
		border-bottom: 1px solid #ddd;
	}

</style>