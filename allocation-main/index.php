<?php
include_once 'css.php';
include_once 'config.php';
include_once 'functions.php';
if (auth()) {
	
	header('location:dashboard.php');
}
?>
<html>
<script type="text/javascript">

	$(document).ready(function(){

		$('#failed').hide();
		$('#login_form').submit(function(){

			


				$.ajax({


					type:"POST",
					url :"ajax.php?function=login",
					data:$('#login_form').serialize()

					}).done(function(data){

						if(data)
						{
							
							$('#failed').html(data).show();
							$('#login_form').trigger('reset');
							$('#username').focus();
						}
						else {
							window.location.replace("dashboard.php");

						}
						
					});
				return false
			});



		});

</script>
<div class="container">

      <form id="login_form" class="form-signin" role="form" name="Login" method="post">
      
        <h2 class="form-signin-heading"><span style="color: #a0a0a0;font: 56px Tahoma, Helvetica, Arial, Sans-Serif;text-shadow: 0px 2px 3px #555;font-weight:900;"><i class="fa fa-gears fa-2x" style="color:#DC143C;"></i>Task Allocation</span></h2>
        <div class="alert alert-danger" id="failed"></div>
        </br>
        <input id="username" type="text" name="username" class="form-control" placeholder="Username" required autofocus>
        </br>
        <input type="password" name="password" class="form-control" placeholder="Password" required>
        </br>
        <input class="btn btn-lg btn-success btn-block" type="submit" value="Login">
      </form>

    </div> <!-- /container -->

</html>