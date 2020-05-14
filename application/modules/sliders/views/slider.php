<div style="" id="carousel-id" class="carousel slide row" data-ride="carousel">
	<ol class="carousel-indicators">
	<?php
	$count = 0;
	foreach ($query_slides->result() as $row_slides) {
		if ($count==0) {
			$additional_css = ' class="active"';
		}else{
			$additional_css = ' ';
		}
	?>
		<li data-target="#carousel-id" data-slide-to="<?= $count?>" <?= $additional_css?>></li>
	<?php
	$count++;
	}
	?>
	</ol>
	<div class="carousel-inner" style="max-height: 290px;">
	<?php
	$count = 0;
	foreach ($query_slides->result() as $row_slides) {
		$target_url = $row_slides->target_url;
		$alt_text = $row_slides->alt_text;
		$picture = $row_slides->picture;
		$picture_path = base_url().'slider_pics/'.$picture;

		if ($count==0) {
			$make_active = ' active';
		}else{
			$make_active = ' ';
		}
	?>
		<div class="item<?=$make_active?>">
			<?php 
			if ($target_url!='') {?>
				<a href="<?= $target_url?>">
					<img  src="<?= $picture_path ?>" alt="<?=$alt_text?>">
				</a>
			<?php 
			}else { ?>
				<img  src="<?= $picture_path ?>" alt="<?=$alt_text?>">
			<?php } ?>
		</div>
	<?php
	$count++;
	}
	?>
	</div>
	<a class="left carousel-control" href="#carousel-id" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
	<a class="right carousel-control" href="#carousel-id" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
</div>