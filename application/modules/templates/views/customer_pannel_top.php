<?php
$first_bit = $this->uri->segment(1);
function _attempt_make_active($first_bit,$link_text){
	
	// if ((current_url()==base_url().'youraccount/welcome') AND ($link_text=="Your Messages")) {
	// 	echo ' class="active"';
	// }

	if ((($first_bit=='youraccount') OR ($first_bit=='yourmessages')) AND ($link_text=='Your Messages')) {
		echo ' class="active"';
	}

	if (($first_bit=='yourorders') AND ($link_text=='Your Orders')) {
		echo ' class="active"';
	}
}
?>
<ul class="nav nav-tabs">
  <li role="presentation"<?= _attempt_make_active($first_bit,'Your Messages')?>>
  	<a href="<?= base_url()?>youraccount/welcome">Your Messages</a>
  </li>
  <li role="presentation"<?= _attempt_make_active($first_bit,'Your Orders')?>>
  	<a href="<?= base_url()?>yourorders/browse">Your Orders</a>
  </li>
  <li role="presentation"><a href="#">Update Profile</a></li>
  <li role="presentation"><a href="<?= base_url()?>youraccount/logout">Logout</a></li>
</ul>