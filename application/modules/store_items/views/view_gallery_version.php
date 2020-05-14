<?php
echo Modules::run('templates/_draw_breadcrumbs',$breadcrumbs_data);
if (isset($flash)) {
	echo $flash;
}
?>
<script type="text/javascript">
var myApp = angular.module('myApp',[]);

myApp.controller('myController', ['$scope', function($scope) {

	$scope.defaultPic = '<?= $gallery_pics['0']?>';

	$scope.change = function(newPic) {

		$scope.defaultPic = newPic;
	}

}])
</script>

<div class="row" ng-controller="myController" style="margin-top: 64px;">
	<div class="col-md-1 gallery-img">
		<?php
			foreach ($gallery_pics as $thumbnail) {
		?>
		<img ng-mouseover="change('<?= $thumbnail ?>')" class="img-responsive" src="<?= $thumbnail ?>">
		<?php
			}
		?>
	</div>
	<div class="col-md-4 img-auto" style="margin-top: 20px;">
		<a href="#" data-featherlight="{{ defaultPic }}">
			<img ng-src="{{ defaultPic }}" class="img-responsive" alt="<?= $item_title?>">
		</a>
	</div>
	<div class="col-md-4" style="color:#000;">
		<h3><?= $item_title ?></h3>
		<h3>Our Price: <?= $currency_symbol.$item_price_desc?></h3>

		<div style="clear: both;">
			<?= nl2br($item_description)?>
		</div>
	</div>
	<div class="col-md-3" style="color:red;">
		<?= Modules::run('cart/_draw_add_to_cart',$update_id)?>
	</div>
</div>