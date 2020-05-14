<div class="row">
	<div class="col-md-9">
		<div class="panel panel-info">
			<div class="panel-heading" style="background-color: #fff;">
				<h4 class="panel-title" style="font-size: 14px;">Your Basket (<b><?= $num_rows?></b>)</h4>
			</div>
			<div class="panel-body padding0" style="min-height: 105px; padding: 0px;">
				<table class="table table-striped table-bordered" style="margin-bottom: 0px;">
					<tbody>
					<?php
					$grand_total = 0;
					foreach ($query->result() as $row) {
					$small_pic = $row->small_pic;
					$small_pic_path = base_url().'small_pics/'.$small_pic;	

					$sub_total = $row->price*$row->item_qty;
					$sub_total_desc = number_format($sub_total,2);
					
					$grand_total = $grand_total + $sub_total;
					?>
						<tr>
							<td class="col-md-2">
								<?php
								if ($small_pic!="") {
									echo '<img class="img-responsive" src="'.$small_pic_path.'">';
								}else{
									echo 'No Image Preview is available';
								}
								?>
							</td>
							<td class="col-md-8">
								Item Number : <?= $row->item_id?><br>
								<b><?= $row->item_title?></b><br>
								Item Price : <?= $currency_symbol.$row->price?><br><br>
								Quantity : <b><?= $row->item_qty?></b><br><br>
								<?php
								echo anchor('store_basket/remove/'.$row->id,'Remove this Item');
								?>
							</td>
							<td class="col-md-2"><b><?= $currency_symbol.$sub_total_desc?></b> </td>
						</tr>		
				
					<?php
					}
					?>	
					<tr>
						<td class="col-md-2">
							&nbsp;
						</td>
						<td class="col-md-8">
							Shipping <?php
								$grand_total = $grand_total+$shipping;
							?>	
						</td>
						<td class="col-md-2"><b><?= $currency_symbol.$shipping?></b> </td>
					</tr>	
					<?php
						$grand_total_desc = number_format($grand_total,2);
					?>	
						<tr>
							<td></td>
							<td align="right">Total</td>
							<td align=""><b><?= $currency_symbol.$grand_total;?></b></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="panel panel-info">
			<div class="panel-heading" style="background-color: #fff;">
				<h4 class="panel-title" style="font-size: 14px;">PRICE Details</h4>
			</div>
			<div class="panel-body">
				<table class="table table-condensed tbl">
					<?php
						$grand_total_desc = number_format($grand_total,2);
					?>
					<tr class="">
						<td class="">Price(<?= $num_rows?>)</td>
						<td class="" align="right"><?= $currency_symbol.$grand_total;?></td>
					</tr>
					<tr>
						<td class="">Delivery Charges</td>
						<td class="" align="right">FREE</td>
					</tr>
					<tr style="border-top: 1px dashed #e0e0e0;">
						<td class=""><b>Amount Payable</b></td>
						<td class="" align="right">
						<?php
							echo $currency_symbol.$grand_total;
						?>	
						</td>
					</tr>
				</table>
				
			</div>

		</div>
	</div>
</div>
<style>
.tbl tr td{
	border-top : 0px solid #000 !important;
}.tbl tr {
	height: 40px;
}
</style>