<div class="" style="border-radius: 7px; background-color: #ddd; color:#333; margin-top: 20px; padding: 6px;">
<?= form_open('store_basket/add_to_basket');?>
	<table class="table">
		<tr>
			<td colspan="2">Item ID: <?= $item_id?></td>
		</tr>
		
		<?php
			if ($num_colors>0) {?>
		<tr>
			<td>Color:</td>
			<td>
				<?php
					$attributes = array('class'=>'form-control input-sm');
					echo form_dropdown('item_color',$color_options,$submitted_color,$attributes);
				?>
			</td>
		</tr>
		<?php } ?>
		<?php
			if ($num_sizes>0) {?>
		<tr>
			<td>Size:</td>
			<td>
				<?php
					$attributes = array('class'=>'form-control input-sm');
					echo form_dropdown('item_size',$size_options,$submitted_size,$attributes);
				?>
			</td>
		</tr>
		<?php } ?>
		
		<tr>
			<td>Qty:</td>
			<td>
				<div class="">
					<input type="text" name="item_qty" class="form-control input-sm" value="" placeholder="Enter Quantity">
				</div>
			</td>
		</tr>
		<tr>
			<td colspan="2" style="text-align: center">
				<button type="submit" name="submit" value="Submit" class="btn btn-primary"><span class="glyphicon glyphicon-shopping-cart"></span> Add to Basket</button>
			</td>
			<td></td>
		</tr>
	</table>
<?php

	echo form_hidden('item_id',$item_id);
	echo form_close();
?>
</div>