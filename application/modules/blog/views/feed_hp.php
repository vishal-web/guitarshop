<h1>The Blog</h1>
<?php
	$this->load->module('timedate');
	foreach ($query->result() as $row) {
		$date_published = $this->timedate->get_nice_date($row->date_published,'mini');
		$article_preview = word_limiter($row->page_content,25);
		$small_pic_url = base_url().'blog_pics/small_pics/'.$row->small_pic;
		$article_url = base_url().'blog/article/'.strtolower($row->page_url);
?>
<div class="row" style="margin-bottom: 12px;">
	<div class="col-md-3" style="">
		<img src="<?= $small_pic_url ?>" class="img-responsive img-thumbnail" alt=""/>
	</div>
	<div class="col-md-9" style="">
		<h4 style="margin-top: 2px;"><a href="<?= $article_url?>"><?= $row->page_title?></a></h4>
		<p style="font-size: 0.9em">
			<?= $row->author?>
			<span style="color: #999;"> - <?= $date_published?></span>	
		</p>
		<p><?= $article_preview ?></p>
	</div>
</div>
<?php
}
?>