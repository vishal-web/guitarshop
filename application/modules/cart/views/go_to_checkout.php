<h1>Please Create An Account</h1>
<p>You do not need to create account with us, however, if you do then you'll able to enjoy</p>
<p></p>
<ul>
	<li>Order Tracking</li>
	<li>Downloadable Order forms</li>
	<li>Priority Technical Support</li>
</ul>
<p>Creating an account it only takes a minute or so and it's a good vibe.</p>
<p>Would you like create an account ?</p>
<div class="" style="margin-top: 30px;">
<?= form_open('cart/submit_choice')?>
	<button type="submit" name="submit" value="Yes - Let's Do it" style="" class="btn btn-success">
	<span class="glyphicon glyphicon-thumbs-up"></span> Yes - Let's Do it
	</button>
	
	<button type="submit" name="submit" value="No Thanks" style="margin-left: 20px;" class="btn btn-danger">
	<span class="glyphicon glyphicon-thumbs-down"></span> No Thanks
	</button>
	<a href="<?= base_url()?>youraccount/login">
		<button type="button" name="submit" value="" style="margin-left: 20px;" class="btn btn-primary">
		<span class="glyphicon glyphicon-log-in"></span>&nbsp;&nbsp;Already Have Account (login)
		</button>
	</a>
<?php
 echo form_hidden('checkout_token', $checkout_token);
 echo form_close() ?>
</div>
