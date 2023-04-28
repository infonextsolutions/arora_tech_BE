<?php
session_start();
$_SESSION['buy_sell']=5; //for active class
include_once 'header.php';
$users=getAll('*','users');//for users in dropdown

?>
<script type="text/javascript">

	$(document).ready(function(){

		
		$("#buy_demand_form").submit(function(){

				
			
			var data= $('#buy_demand_form').serialize();

			$.ajax({


					url:"ajax.php?function=save_buy",
					type:"POST",
					data:data

				}).done(function(data){


					if(data)
						{
							$('#buy_failed').addClass('alert-success').html(data);
							$('#buy_demand_form').trigger("reset");
						}
					else
						{
					   		$('#buy_failed').addClass('alert-danger').html("The entry failed, please try again");
					}
					

				});
		


			return false;});
			});

</script>



<form class="form-horizontal" id="buy_demand_form" >
<fieldset>

<!-- Form Name -->
<legend>Insert New Buy Request</legend>


<!-- Multiple Radios -->
<div class="row">
<div class="col-md-4"></div>
<div class="col-md-4 alert " id="buy_failed"></div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="buy_sell">Buy/Sell</label>
  <div class="col-md-4">
  <div class="radio">
    <label for="buy_sell-0">
      <input type="radio" name="buy_sell" id="buy_sell-0" value="3" checked="checked">
      Buy
    </label>
	</div>
  
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="property_type">Property Type</label>
  <div class="col-md-4">
    <select id="property_type" name="property_type" class="form-control">
      <option value="Apartments">Apartments</option>
      <option value="Booth">Booth</option>
      <option value="Buildup">Buildup</option>
      <option value="Commercial FSI">Commercial FSI</option>
      <option value="FarmHouse">FarmHouse</option>
      <option value="Floors">Floors</option>
      <option value="Guest House">Guest House</option>
      <option value="Hospital">Hospital</option>
      <option value="Hotel">Hotel</option>
      <option value="Industrial">Industrial</option>
      <option value="Institutional Plots">Institutional Plots</option>
      <option value="Miscellaneous">Miscellaneous</option>
        <option value="Nursing Home">Nursing Home</option>
      <option value="Other Commercial Properties">Other Commercial Properties</option>
      <option value="Other Institutional Properties">Other Institutional Properties</option>
      <option value="Plots">Plot</option>
      <option value="Raw Land">Raw Land</option>
      <option value="Residential FSI">Residential FSI</option>
      <option value="Rented Properties">Rented Properties</option>
      <option value="Rented Deal">Rented Deal</option>
      <option value="SCO">SCO</option>
      <option value="Service Apartment">Service Apartments</option>
      <option value="School">School</option>
      <option value="Shop">Shop</option>
      <option value="Society Flats">Society Flats</option>
      <option value="Urgent-Hot deal">Urgent-Hot deal</option>
    </select>
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="description">Description</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="description" name="description" placeholder="Enter Description here" required></textarea>
  </div>
</div>

<!-- Multiple Radios -->
<div class="form-group">
  <label class="col-md-4 control-label" for="client_dealer">Client/Dealer</label>
  <div class="col-md-4">
  <div class="radio">
    <label for="client_dealer-0">
      <input type="radio" name="client_dealer" id="client_dealer-0" value="1" checked="checked">
      Client
    </label>
	</div>
  <div class="radio">
    <label for="client_dealer-1">
      <input type="radio" name="client_dealer" id="client_dealer-1" value="2">
      Dealer
    </label>
	</div>
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="info">Client/Dealer Info</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="info" name="info" required placeholder="Enter Client/Dealer Info here"></textarea>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="handled_by">To be Handled by</label>
  <div class="col-md-4">
  <select id="handled_by" name="handled_by" class="form-control"> 
  	<?php foreach ($users as $user):?>
    		<option value="<?php echo $user['id'];?>">
    			<?php echo $user['firstname']." ".$user['lastname']; ?>
    		</option>
    <?php endforeach;?>
   </select> 
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="rating">Rating</label>
  <div class="col-md-4">
  <div class="radio">
    <label for="rating-0">
      <input type="radio" name="rating" id="rating-0" value="5" >
      Urgent
    </label>
	</div>
  <div class="radio">
    <label for="rating-1">
      <input type="radio" name="rating" id="rating-1" value="6">
      Very Urgent
    </label>
	</div>
	<div class="radio">
    <label for="rating-1">
      <input type="radio" name="rating" id="rating-2" value="0" checked="checked">
      Normal
    </label>
	</div>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="submit"></label>
  <div class="col-md-4">
    <input type="submit" id="submit" name="submit" class="btn btn-primary" value="Save"/>
  </div>
</div>

</fieldset>
</form>
