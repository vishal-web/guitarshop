
<div class="row">
	
	<div class="container">
		<h1>Contact Us</h1>
	    <div class="row">
	        <div class="col-md-8">
	            <div class="well well-sm">
	            	<?= validation_errors('<p style="color:red;">','</p>')?>
	                <form method="post" action="<?=$form_location?>">
	                <div class="row">
	                    <div class="col-md-6">
	                        <div class="form-group" style="display: none;">
	                            <label for="name">
	                                 Name</label>
	                            <input type="text" class="form-control" name="name" placeholder="Enter name" value="" />
	                        </div>
	                        <div class="form-group">
	                            <label for="name">
	                                Your Name</label>
	                            <input type="text" class="form-control" name="yourname" placeholder="Enter yourname" value="<?=$yourname?>" />
	                        </div>
	                        <div class="form-group">
	                            <label for="email">
	                                Email Address</label>
	                            <div class="input-group">
	                                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
	                                </span>
	                                <input type="email" class="form-control" name="email" placeholder="Enter email" value="<?=$email?>" /></div>
	                        </div>
	                        <div class="form-group">
	                            <label for="telnum">
	                                Telephone Number</label>
	                            <div class="input-group">
	                                <span class="input-group-addon"><span class="glyphicon glyphicon-phone"></span>
	                                </span>
	                                <input type="text" class="form-control" name="telnum" placeholder="Enter telnum" value="<?=$telnum?>" />
	                            </div>
	                            
	                        </div>
	   
	                    </div>
	                    <div class="col-md-6">
	                        <div class="form-group">
	                            <label for="name">
	                                Message</label>
	                            <textarea name="message" name="message" class="form-control" rows="9" cols="25" 
	                                placeholder="Message"><?=$message?></textarea>
	                        </div>
	                    </div>
	                    <div class="col-md-12">
	                        <button type="submit" class="btn btn-primary pull-right" name="submit" value="Submit">
	                            Send Message</button>
	                    </div>
	                </div>
	                </form>
	            </div>
	        </div>
	        <div class="col-md-4">
	            <form>
	            <legend><span class="glyphicon glyphicon-globe"></span> Our office</legend>
	            <address>
	                <strong><?=$our_name?>, Inc.</strong><br>
	                <?=$our_address?>
	                <abbr title="Phone">
	                    P:</abbr>
	                <?=$our_telnum?>
	            </address>
	            <address>
	                <strong>Telephone</strong><br>
	                <?=$our_telnum?>
	            </address>
	            </form>
	        </div>

	    </div>
	    <div class="row">
	    	<div class="col-md-12">
		    	<div class="map-responsive">
		        	<?=$our_map_code?>
		        </div>
		    </div>
	    </div>
	</div>
</div>
<style type="text/css">
.map-responsive{
    overflow:hidden;
    padding-bottom:56.25%;
    position:relative;
    height:0;
}
.map-responsive iframe{
    left:0;
    top:0;
    height:100%;
    width:100%;
    position:absolute;
}
</style>