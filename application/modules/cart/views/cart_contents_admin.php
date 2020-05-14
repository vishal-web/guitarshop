<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon white shopping-cart"></i><span class="break"></span>Customer's Shopping Baskets Contents</h2>
			<div class="box-icon">
				<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
				<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
				<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
			</div>
		</div>
		<div class="box-content">
			<table class="table table-bordered" style="margin-bottom: 0px;">
				<tbody>
				<?php
				$grand_total = 0;
				foreach ($query_cc->result() as $row) {
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
					<td class="col-md-8" style="text-align: right;">
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
						<td style="text-align: right;">Total</td>
						<td style=""><b><?= $currency_symbol.$grand_total;?></b></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div><!--/span-->
</div><!--/row-->