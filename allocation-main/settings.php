<?php
include_once 'header.php';
$users=getAll('*','users');
?>
<script type="text/javascript">

$(document).ready(function(){


	

	$('#change_user').submit(function(){

		if($('#password').val()!='' &&	$('#password').val()!=$('#re_password').val())
		{
			alert('Passwords do not match');
			
			return false;
		}


		$.ajax({

			url : "ajax.php?function=change_user",
			type:"POST",
			data : $('#change_user').serialize()



			}).done(function(data){



				if(data)
				{
				alert ('The settings have been saved successfully');
				location.reload();

				}
				else
				{
					alert("some error occured, please try again later");
				}


				});



		return false;

		});



	
});


</script>


<form class="form-horizontal" id="change_user">
<fieldset>

<!-- Form Name -->
<legend>My settings</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="firstname">First name</label>  
  <div class="col-md-5">
  <input id="firstname" name="firstname" type="text" placeholder="first name" class="form-control input-md" required="" 
  		value=<?php if (isset($_SESSION)) echo $_SESSION['user']['firstname']?>>
  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="lastname">Last name</label>  
  <div class="col-md-5">
  <input id="lastname" name="lastname" type="text" placeholder="last name" class="form-control input-md" required=""
  	value=<?php if (isset($_SESSION)) echo $_SESSION['user']['lastname']?>>
 
 
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="email_id">Email Address</label>  
  <div class="col-md-5">
  <input id="email_id" name="email_id" type="text" placeholder="email address" class="form-control input-md" required=""
  	value=<?php if (isset($_SESSION)) echo $_SESSION['user']['email_id']?>>
  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="contact_number">Contact Number</label>  
  <div class="col-md-5">
  <input id="contact_number" name="contact_number" type="text" placeholder="Enter contact number" class="form-control input-md" required=""
  value =<?php if (isset($_SESSION)) echo $_SESSION['user']['contact_number']?>>
   
  </div>
</div>



<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="username">User Name</label>  
  <div class="col-md-5">
  <input id="username" name="username" type="text" placeholder="user name" class="form-control input-md" required=""
  	value=<?php if (isset($_SESSION)) echo $_SESSION['user']['username']?>>
 
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="password">New Password</label>
  <div class="col-md-5">
    <input id="password" name="password" type="password" placeholder="password" class="form-control input-md" >
    <input type="hidden" name="id" value=<?php if (isset($_SESSION)) echo $_SESSION['user']['id']?>>
  
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="password">Retype New Password</label>
  <div class="col-md-5">
    <input id="re_password" type="password" placeholder="retype password" class="form-control input-md" >
   
  </div>
</div>
<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="submit"></label>
  <div class="col-md-8">
    <input type="submit"  name="submit" class="btn btn-success" value="Save">
    <button id="reset" name="reset" class="btn btn-danger">Reset</button>
  </div>
</div>
</fieldset>
</form>
