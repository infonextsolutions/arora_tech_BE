<?php
?>
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
<?php $active=$_SESSION['buy_sell'];?>
 <div class="container-fluid">
      <div class="row">
<div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar" id="sidebar">
            <li class="<?php if($active==1) echo 'active';?>"><a href="#" id="buy_sell">Buy/Sell</a></li>
            <li class="<?php if($active==3) echo 'active';?>"><a href="#" id="buy_only">Buy</a></li>
            <li class="<?php if($active==4) echo 'active';?>"><a href="#" id="sell_only">Sell</a></li>
            <li class="<?php if($active==5) echo 'active';?>"><a href="buy_demand.php" id="buy_demand">Insert new Buy demand</a></li>
            <li class="<?php if($active==6) echo 'active';?>"><a href="sell_demand.php" id="sell_demand">Insert new Sell demand</a></li>
          </ul>
          <!-- <ul class="nav nav-sidebar">
            <li><a href="">Nav item</a></li>
            <li><a href="">Nav item again</a></li>
            <li><a href="">One more nav</a></li>
            <li><a href="">Another nav item</a></li>
            <li><a href="">More navigation</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="">Nav item again</a></li>
            <li><a href="">One more nav</a></li>
            <li><a href="">Another nav item</a></li>
          </ul> -->
        </div>
        </div></div>