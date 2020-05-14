<li>
	<a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> Manage Orders</span></a>
	<ul>
		<li>
			<a class="submenu" href="<?= base_url().'store_orders/browse/status0'?>"><i class="icon-file-alt"></i><span class="hidden-tablet"> Order Submitted</span></a>
		</li>
		<?php foreach ($query_sos->result() as $row) {
			$target_url = base_url().'store_orders/browse/status'.$row->id;
			$status_title = $row->status_title;
		?>
		<li>
			<a class="submenu" href="<?= $target_url?>"><i class="icon-file-alt"></i><span class="hidden-tablet"> <?= $status_title?></span></a>
		</li>
		<?php
		}
		?>
	</ul>	
</li>