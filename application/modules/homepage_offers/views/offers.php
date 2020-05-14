<?php
foreach ($query->result() as $row) {
	$item_title = $row->item_title;
	$item_preview = word_limiter($row->item_title,5);
	$was_price = $row->was_price;
	$item_price = $row->item_price;
	$small_pic = $row->small_pic;
	$small_pic_path = base_url().'small_pics/'.$small_pic;
	$item_page = base_url().$item_segments.strtolower($row->item_url);
	
	$item_price = number_format($item_price,2);
	$item_price = $currency_symbol.str_replace('.00', '', $item_price);
?>
	<div class="col-md-3 col-xs-12">
		<div class="offer offer-<?= $theme?>"  style="min-height: 400px;">
			<div class="shape">
				<div class="shape-text">
					<span class="glyphicon glyphicon-star" style="font-size: 1.6rem;"></span>					
				</div>
			</div>
			<div class="offer-content img-auto">
				<h3 class="lead" style="font-size: 20px;">Offer Price <span style="font-size: 19px;"><?= $item_price ?></span></h3>
				<a href="<?= $item_page?>"><img class="img-responsive" src="<?= $small_pic_path?>" title="<?= $item_title?>"></a>
				<br> 
				<p>
					<a href="<?= $item_page?>"><?= $item_title?></a>
				</p>
			</div>
		</div>
	</div>
<?php  		
}
?>