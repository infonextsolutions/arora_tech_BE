<!DOCTYPE html>
<?php 
include_once 'css.php';
include_once 'config.php';
include_once 'functions.php';
if (!auth()) {

	header('location:index.php');
}

?>
<?php $active=$_SESSION['buy_sell'];?>
<body>

    <div class="navbar navbar-inverse navbar-fixed-top " style="border-bottom-color: #428bca;" role="navigation" >
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only md-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            
          </button>
        
        <a class="navbar-brand" href="index.php" style="padding:5px;font: 29px Tahoma, Helvetica, Arial, Sans-Serif;text-shadow: 0px 2px 3px #555;font-weight:900;letter-spacing:-1px;"><i class="fa fa-gears fa-2x" style="color:#DC143C;"></i>Task Allocation</a>
     
        </div>
        <div class="navbar-collapse collapse">
         
          <ul class="nav navbar-nav navbar-right">
         <li class=""> <a href="settings.php"><i class="fa fa-smile-o fa-2x"></i> Hello, <?php echo $_SESSION['user']['firstname']?></a></li>
            <li class="dropdown"><a href="index.php" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-home fa-2x"></i> Home<span class="caret"></span></a>
            
            <ul class="dropdown-menu" >
            <li class="<?php if($active==1) echo 'active';?>"><a href="#" id="buy_sell">Buy/Sell</a></li>
            <li class="<?php if($active==3) echo 'active';?>"><a href="#" id="buy_only">Buy</a></li>
            <li class="<?php if($active==4) echo 'active';?>"><a href="#" id="sell_only">Sell</a></li>
            <li class="<?php if($active==5) echo 'active';?>"><a href="buy_demand.php" id="buy_demand">Insert new Buy demand</a></li>
            <li class="<?php if($active==6) echo 'active';?>"><a href="sell_demand.php" id="sell_demand">Insert new Sell demand</a></li>
      </ul>
            
            </li>
            
            <!-- <li><a href="search.php"><i class="fa fa-search fa-2x"></i> Search</a></li> -->
            <li><a href="settings.php"><i class="fa fa-cog fa-2x"></i> My Settings</a></li>

            <?php if (isAdmin()){?>
            <li class="dropdown"><a href="users.php" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user fa-2x"></i> Users<span class="caret"></span></a>
           
            <ul class="dropdown-menu">
            <li class=""><a href="users.php" >View/Edit Users</a></li>
            <li class=""><a href="create_user.php" >Create User</a></li>
            </li>
            </ul>
            <?php }?>
            
            <li><a href="logout.php"><i class="fa fa-power-off fa-2x"></i> Logout</a></li>
          </ul>
        <!--   <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form> -->
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row">
        <?php //include_once 'sidebar.php';?>
        <div class="col-sm-12  col-md-12  main">
         <!-- place for newsbar -->
         <?php //include_once 'newsbar.php';?>
         	

       <!-- place for content -->
       
     <script type="text/javascript">
<!--
//for buy-sell filter
//-->
$(document).ready(function(){

	
	$('#buy_only').click(function(){

		
			
			$.ajax({
						type:"POST",
						url :"ajax.php?function=buy"
						

					}).done(function(data){

						if(data)
						{
							
							window.location.replace ("index.php");
						}


					});


		});
	$('#sell_only').click(function(){
		
		$.ajax({
					type:"POST",
					url :"ajax.php?function=sell"
					

				}).done(function(data){
					if(data)
					{
						window.location.replace ("index.php");
						
					}


				});


	});
	$('#buy_sell').click(function(){
		
		$.ajax({
					type:"POST",
					url :"ajax.php?function=buy_sell"
					

				}).done(function(data){
					
					if(data)
					{
						window.location.replace ("index.php");
					}


				});


	});
	


	
});

</script>