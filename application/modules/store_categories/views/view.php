<h1><?= $cat_title ?></h1>
<?= $showing_statement?>
<?= $custom_pagination?>
<div class="row" style="margin:0 1% 0 1%">
<?php

	foreach ($query->result() as $row) {
	$item_title = $row->item_title;
	$item_preview = word_limiter($row->item_title,5);
	$was_price = $row->was_price;
	$item_price = $row->item_price;
	$small_pic = $row->small_pic;
	$small_pic_path = base_url().'small_pics/'.$small_pic;
	$item_page = base_url().$item_segments.strtolower($row->item_url);

?>
	<div class="col-md-2 img-thumbnail img-auto" style="margin: 6px; min-height: 340px">
		<div class="" style="min-height: 198px;" >
			<a href="<?= $item_page?>"><img class="img-responsive" src="<?= $small_pic_path?>" title="<?= $item_title?>"></a>
		</div>
		<br>
		<h6><?= trim($item_title)?></h6>
		<div style="clear: both; color: red;"><?= $currency_symbol.number_format($item_price,2)?>
		<?php 
		if ($was_price > 0) {	?>
			<span style="color: #000; text-decoration:line-through;"><?= $currency_symbol.$was_price?></span>
		<?php } ?>	
		</div>
	</div>
<?php
}
?>
</div>