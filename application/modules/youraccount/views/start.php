<h1>Create Account</h1>

<?php

	$form_location = base_url().'youraccount/submit';

?>
<form class="form-horizontal" action="<?= $form_location?>" method="post">
   <fieldset>
      <!-- Form Name -->
      <legend>Please submit user details below this form</legend>
      <?= validation_errors('<p style="color:red">','</p>');?>
      <!-- Text input-->
      <div class="form-group">
         <label class="col-md-4 control-label" for="textinput">Username</label>  
         <div class="col-md-4">
            <input id="textinput" type="text" name="username" value="<?=$username?>" placeholder="Enter a username of your choice" class="form-control input-md" required="">
         </div>
      </div>
      <!-- Text input-->
      <div class="form-group">
         <label class="col-md-4 control-label" for="textinput">First name</label>  
         <div class="col-md-4">
            <input id="textinput" type="text" name="firstname" value="<?=$firstname?>" placeholder="Please enter your firstname " class="form-control input-md">
         </div>
      </div>

      <div class="form-group">
         <label class="col-md-4 control-label" for="textinput">Last name</label>  
         <div class="col-md-4">
            <input id="textinput" type="text" name="lastname" value="<?=$lastname?>" placeholder="Please enter your lastname " class="form-control input-md">
         </div>
		</div>
      <!-- Text input-->
      <div class="form-group">
         <label class="col-md-4 control-label" for="textinput">E-mail</label>  
         <div class="col-md-4">
            <input id="textinput" type="text" name="email" value="<?=$email?>"  placeholder="Enter your contact email id" class="form-control input-md">
         </div>
      </div>     

      <div class="form-group">
         <label class="col-md-4 control-label" for="textinput">Password</label>  
         <div class="col-md-4">
            <input id="textinput" type="text" name="pword" value="<?=$pword?>" placeholder="Enter a Password" class="form-control input-md">
         </div>
      </div>
      <div class="form-group">
         <label class="col-md-4 control-label" for="textinput">Repeat Password</label>  
         <div class="col-md-4">
            <input id="textinput" type="text" name="repeat_pword" value="<?=$repeat_pword?>"  placeholder="Enter a Repeat Password" class="form-control input-md">
         </div>
      </div>
      
      <!-- Button -->
      <div class="form-group">
         <label class="col-md-4 control-label" for="singlebutton">Create user?</label>
         <div class="col-md-4">
            <button id="singlebutton"  name="submit" value="Submit" class="btn btn-primary">Yes</button>
         </div>
      </div>
   </fieldset>
</form>