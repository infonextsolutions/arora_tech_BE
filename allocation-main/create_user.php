<?php
include_once 'header.php';
$users=getAll('*','users');
?>
<script type="text/javascript">

$(document).ready(function(){


	$('#create_user').submit(function(){


		$.ajax({

			url : "ajax.php?function=create_user",
			type:"POST",
			data : $('#create_user').serialize()



			}).done(function(data){



				if(data)
				{
				alert ('The New user is created successfully');
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

<form class="form-horizontal" id="create_user">
<fieldset>

<!-- Form Name -->
<legend>Create User</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="firstname">First name</label>  
  <div class="col-md-5">
  <input id="firstname" name="firstname" type="text" placeholder="first name" class="form-control input-md" required="">
  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="lastname">Last name</label>  
  <div class="col-md-5">
  <input id="lastname" name="lastname" type="text" placeholder="last name" class="form-control input-md" required="">
 
 
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="email_id">Email Address</label>  
  <div class="col-md-5">
  <input id="email_id" name="email_id" type="text" placeholder="email address" class="form-control input-md" required="">
  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="contact_number">Contact Number</label>  
  <div class="col-md-5">
  <input id="contact_number" name="contact_number" type="text" placeholder="Enter contact number" class="form-control input-md" required="">
   
  </div>
</div>

<!-- Multiple Radios (inline) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="admin">Is Admin?</label>
  <div class="col-md-4"> 
    <label class="radio-inline" for="admin-0">
      <input type="radio" name="admin" id="admin-0" value="0" checked="checked">
      No
    </label> 
    <label class="radio-inline" for="admin-1">
      <input type="radio" name="admin" id="admin-1" value="1">
      Yes
    </label>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="username">User Name</label>  
  <div class="col-md-5">
  <input id="username" name="username" type="text" placeholder="user name" class="form-control input-md" required="">
 
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="password">Password</label>
  <div class="col-md-5">
    <input id="password" name="password" type="password" placeholder="password" class="form-control input-md" required="">
  
  </div>
</div>
<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="submit"></label>
  <div class="col-md-8">
    <input type="submit"  name="submit" class="btn btn-success" value="Create">
    <button id="reset" name="reset" class="btn btn-danger">Reset</button>
  </div>
</div>
</fieldset>
</form>
