<?php

include_once 'header.php';

//get all the data corresponind to the property


	if ($_REQUEST['property_id']!=NULL)
		{
			$property_id = $_REQUEST['property_id'];
		}
	else
		 {
		
		 	header("location:index.php");	
		}

$_SESSION['property_id']=NULL;
$_SESSION['property_id']=$property_id;		
$property=getProperty($property_id);
$admin=getAdminComments($property_id);
$client= getClientComments($property_id);
$user=getCreatedUserId($property_id);
$ass_user=getAssignedUserId($property_id);
$workflows=getPropertiesWorkflows($property_id);
$users=getUserFromId($user[0]['created_user_id']);
$assigned_user = getUserFromId($ass_user[0]['assigned_user_id']);
$users_all=getAll('*','users');

?>
<span>
<div class ="table-responsive" id="fixed_top" style="position:fixed;z-index:999;right:0;left:0; top:58px;margin-bottom:20px;">
<!-- <h4 class="alert alert-success text-muted"><span class="glyphicon glyphicon-bookmark pull-right"></span>View Property</h4>
 -->	<table class="table table-hover well"  >
		
		<thead>
			<tr>
				<th>Id</th>
				<th></th>
				<th>Buy/Sell</th>
				<th>Type of Property</th>
				<th>Description</th>
				<th>Client/Dealer</th>
				<th>Client/Dealer Info</th>
				<th>Assigned to</th>
				<th>Created On</th>
				<th>#</th>
				
				
			</tr>
		</thead>
		<tbody>
			
				<tr class="info" >
				<?php if (!empty($property[0]['id'])){?>
				<td><?php echo $property[0]['id']?></td>
				<td><?php echo displayRating($property[0]['id'])?>  </td>
				
				<td><?php echo constant("_".$property[0]['buy_sell'])?></td>
				<td><?php echo ucfirst(strtolower(removeWhite($property[0]['type'])))?></td>
				<td><?php echo $property[0]['description']?></td>
				<td><?php echo constant("_".$property[0]['client_or_dealer'])?></td>
				<td><?php echo $property[0]['client_or_dealer_info']?></td>
				<td><?php echo ucfirst($assigned_user[0]['firstname'])." ".ucfirst($assigned_user[0]['lastname']);?>
				<td><?php echo date('d-m-Y h:m:s',strtotime($property[0]['created_on']))?></td>
				<td><?php getEditButtons('property',$property[0]['id'])?></td>
				<?php } else echo "<td>No data found</td>";?>
			</tr>
		
		</tbody>
	
	</table>
	</div>
					<!--property edit form  -->
				<div id="form-property-<?php echo $property[0]['id']?>-modal" class="modal fade" tabindex="-1" >
				<form id="form-property-<?php echo $property[0]['id']?>-modal-form" >
				<div class="modal-dialog">
				<div class="modal-content">
					
					<div class="modal-body">
					
					<div class="form-group">
					<input type="hidden"  name="id" value="<?php echo $property[0]['id']?>"/>
					<input type="hidden"  class="what_for" id="properties"/>
					
					  <label class=" col-md-3 control-label" for="buy_sell">Buy/Sell</label>
					 <div class="col-md-3">
					  <div class="radio">
					    <label for="col-md-3 buy_sell-0">
					      <input type="radio" name="buy_sell"  value="3" <?php if($property[0]['buy_sell']==3) echo "checked=checked" ?>>
					      Buy
					    </label>
					    </div>
					    </div>
					     <div class="col-md-3">
					    <div class="radio">
					    <label for="col-md-3 buy_sell-1">
					      <input type="radio" name="buy_sell"  value="4" <?php if($property[0]['buy_sell']==4) echo "checked=checked" ?>>
					      Sell
					    </label>
					    </div>
					    </div>
					  
					
					</div>
					
					<!-- Select Basic -->
					<div class="form-group">
					  <label class="col-md-4 control-label" for="property_type">Property Type</label>
					    <select id="property_type" name="property_type" class="form-control">
					      <option value="Apartments" <?php if(strtolower(removeWhite($property[0]['type']))=="apartments") echo "selected=selected" ?>>Apartments</option>
					      <option value="Booth" <?php if(strtolower(removeWhite($property[0]['type']))=="booth") echo "selected=selected" ?>>Booth</option>
					      <option value="Buildup" <?php if(strtolower(removeWhite($property[0]['type']))=="buildup") echo "selected=selected" ?>>Buildup</option>
					      <option value="Commercial FSI" <?php if(strtolower(removeWhite($property[0]['type']))=="commercialfsi") echo "selected=selected" ?>>Commercial FSI</option>
					      <option value="FarmHouse" <?php if(strtolower(removeWhite($property[0]['type']))=="farmhouse") echo "selected=selected" ?>>FarmHouse</option>
					      <option value="Floors" <?php if(strtolower(removeWhite($property[0]['type']))=="floors") echo "selected=selected" ?>>Floors</option>
					      <option value="Guest House" <?php if(strtolower(removeWhite($property[0]['type']))=="guesthouse") echo "selected=selected" ?>>Guest House</option>
					      <option value="Hospital" <?php if(strtolower(removeWhite($property[0]['type']))=="hospital") echo "selected=selected" ?>>Hospital</option>
					      <option value="Hotel" <?php if(strtolower(removeWhite($property[0]['type']))=="hotel") echo "selected=selected" ?>>Hotel</option>
					      <option value="Industrial" <?php if(strtolower(removeWhite($property[0]['type']))=="industrial") echo "selected=selected" ?>>Industrial</option>
					      <option value="Institutional Plots" <?php if(strtolower(removeWhite($property[0]['type']))=="institutionalplots") echo "selected=selected" ?>>Institutional Plots</option>
					      <option value="Miscellaneous" <?php if(strtolower(removeWhite($property[0]['type']))=="miscellaneous") echo "selected=selected" ?>>Miscellaneous</option>
					      <option value="Nursing Home" <?php if(strtolower(removeWhite($property[0]['type']))=="nursinghome") echo "selected=selected" ?>>Nursing Home</option>
					      <option value="Other Commercial Properties" <?php if(strtolower(removeWhite($property[0]['type']))=="othercommercialproperties") echo "selected=selected" ?>>Other Commercial Properties</option>
					      <option value="Other Institutional Properties" <?php if(strtolower(removeWhite($property[0]['type']))=="otherinstitutionalproperties") echo "selected=selected" ?>>Other Institutional Properties</option>
					      <option value="Plot" <?php if(strtolower(removeWhite($property[0]['type']))=="plot") echo "selected=selected" ?>>Plot</option>
					      <option value="Raw Land" <?php if(strtolower(removeWhite($property[0]['type']))=="rawland") echo "selected=selected" ?>>Raw Land</option>
					      <option value="Residential FSI" <?php if(strtolower(removeWhite($property[0]['type']))=="residentialfsi") echo "selected=selected" ?>>Residential FSI</option>
					      <option value="Rented Properties" <?php if(strtolower(removeWhite($property[0]['type']))=="rentedproperties") echo "selected=selected" ?>>Rented Properties</option>
					      <option value="Rented Deal" <?php if(strtolower(removeWhite($property[0]['type']))=="renteddeal") echo "selected=selected" ?>>Rented Deal</option>
					      <option value="SCO" <?php if(strtolower(removeWhite($property[0]['type']))=="sco") echo "selected=selected" ?>>SCO</option>
					      <option value="School" <?php if(strtolower(removeWhite($property[0]['type']))=="school") echo "selected=selected" ?>>School</option>
					       <option value="Service Apartment" <?php if(strtolower(removeWhite($property[0]['type']))=="serviceapartment") echo "selected=selected" ?>>Service Apartment</option>
					     
					      <option value="Shop" <?php if(strtolower(removeWhite($property[0]['type']))=="shop") echo "selected=selected" ?>>Shop</option>
					      <option value="Society Flats" <?php if(strtolower(removeWhite($property[0]['type']))=="societyflats") echo "selected=selected" ?>>Society Flats</option>
					       <option value="Urgent-Hot deal" <?php if(strtolower(removeWhite($property[0]['type']))=="urgent-hotdeal") echo "selected=selected" ?>>Urgent-Hot deal</option>
					    </select>
					  
					</div>
					
					<!-- Textarea -->
					<div class="form-group">
					  <label class="col-md-3 control-label" for="description">Description</label>
					    <textarea class="form-control" id="description" name="description" placeholder="Enter Description here" required><?php if($property[0]['description']) echo $property[0]['description']?></textarea>
					 
					</div>
					
					<!-- Multiple Radios -->
					<div class="form-group">
					  <label class="col-md-3 control-label" for="client_dealer">Client/Dealer</label>
					  <div class="col-md-3">
					  <div class="radio">
					    <label for="client_dealer-0">
					      <input type="radio" name="client_dealer" id="client_dealer-0"
					      
					      <?php if($property[0]['client_or_dealer']==1) echo "checked=checked" ?> value="1" >
					      Client
					    </label>
						</div>
						</div>
						<div class="col-md-3">
					  <div class="radio">
					    <label for="col-md-3 client_dealer-1">
					      <input type="radio" name="client_dealer" <?php if($property[0]['client_or_dealer']==2) echo "checked=checked" ?> id="client_dealer-1" value="2">
					      Dealer
					    </label>
						</div>
					  </div>
					</div>
					
					<!-- Textarea -->
					<div class="form-group">
					  <label class="col-md-4 control-label" for="info">Client/Dealer Info</label>
					    <textarea class="form-control" id="info" name="info" required placeholder="Enter Client/Dealer Info here"><?php if($property[0]['client_or_dealer_info']) echo $property[0]['client_or_dealer_info']?></textarea>
					</div>
					
					<!-- Select Basic -->
					<div class="form-group">
					  <label class="col-md-3 control-label" for="handled_by">To be Handled by</label>
					   <select id="handled_by" name="handled_by" class="form-control"> 
					  	<?php foreach ($users_all as $user):?>
					    		<option
					    		<?php if($user['id']==$assigned_user[0]['id']) echo "selected=selected"?>
					    			 value="<?php echo $user['id'];?>"><?php echo $user['firstname']." ".$user['lastname']; ?>
					    		</option>
					    <?php endforeach;?>
					   </select> 
					</div>
					
					
					<!-- Multiple Radios -->
					<div class="form-group">
					  <label class="col-md-2 control-label" for="rating">Rating</label>
					  <div class="col-md-2">
					  <div class="radio">
					    <label for="rating">
					      <input type="radio" name="rating" id="rating-0"					      
					      <?php if(getRating($property[0]['id'])==5) echo "checked=checked" ?> value="5" >
					      Urgent
					    </label>
						</div>
						</div>
						<div class="col-md-3">
						
					  <div class="radio">
					    <label for="col-md-3">
					      <input type="radio" name="rating" <?php if(getRating($property[0]['id'])==6) echo "checked=checked" ?> id="rating-1" value="6">
					      Very Urgent
					    </label>
						</div>
						
					  </div>
					    <div class="col-md-3">
					  <div class="radio">
					    <label for="col-md-3">
					      <input type="radio" name="rating" <?php if(getRating($property[0]['id'])==7) echo "checked=checked" ?> id="rating-1" value="7">
					      Work Done
					    </label>
						</div>
						</div>
					  <div class="col-md-2">
					  <div class="radio">
					    <label for="col-md-2">
					      <input type="radio" name="rating" <?php if(getRating($property[0]['id'])==0) echo "checked=checked" ?> id="rating-1" value="0">
					      Normal
					    </label>
						</div>
						</div>
					  
					</div>
					
					
					
					
					
					</div>
					<div class="modal-footer">
					<a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
					<input type="submit" name="submit" value="submit" class="btn btn-primary">
					<?php if (isAdmin()) {?>
					<a href="#" id="delete" class="btn btn-danger">Delete</a>
					<?php }?>
					</div>
					</div>
				</div>
				</form>
				</div>



<div class ="table" id="fixed_work" style="margin-top: 140px;">
<h4 class="alert alert-success text-muted  ">
	Work History

	
	
	<a href="#" id="form-newworkflow-1" class="btn btn-sm btn-success col-md-offset-9 " ">
	<span class="glyphicon glyphicon-th-list"></span>
	Create Workflow
	</a>
	</h4>
	
	
	
	
	<table class="table  table-hover well">
		
		<thead>
			<tr>
				<th>Id</th>
				<th>Description</th>
				<th>Posted by</th>
				<th>Created On</th>
				<th></th>
							<!-- for for workflow  -->
				
				<div id="form-newworkflow-1-modal" class="modal fade" tabindex="-1">
				<form id="form-newworkflow-1-modal-form">
				
				<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
					<h3>Workflow Description</h3>
					</div>
					<div class="modal-body">
					<!-- Textarea -->
					<div class="form-group">
					
					  <label class="control-label" for="description">Description</label>
					    <textarea class="form-control" id="workflow_description" name="description" placeholder="Enter Description here" required> </textarea>
					    <input type="hidden" id="workflow_create" class="what_for">
					</div>
					</div>
					<div class="modal-footer">
					<a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
					<input type="submit" class="btn btn-primary" value="save" name="submit">
					</div>
					</div>
				</div>
				</form>
				</div>
			</tr>
		</thead>
		<tbody>
		<?php $sno=1;?>
		<?php if ($workflows) {?>
			<?php foreach ($workflows as $workflow):?>
				<?php $user=getUserFromId($workflow['posted_user_id']);?>
				<tr>
				<td><?php //echo $workflow['id']?>
				<?php echo $sno++?></td>
				<td><?php echo nl2br($workflow['description'])?></td>
				<td><?php echo $user[0]['firstname']." ".$user[0]['lastname']?></td>
				<td><?php echo date('d-m-Y h:m:s',strtotime($workflow['created_on']))?></td>
				<td><?php getEditButtons('workflow',$workflow['id'])?></td>
				
			</tr>
							<!-- for editing workflow  -->
				
				<div id="form-workflow-<?php echo $workflow['id']?>-modal" class="modal fade" tabindex="-1">
				<form id="form-workflow-<?php echo $workflow['id']?>-modal-form">
				<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
					<h3>Workflow Description</h3>
					</div>
					<input type="hidden"  name="id" value="<?php echo $workflow['id']?>"/>
					<input type="hidden"  class="what_for" id="properties_workflows"/>
					<div class="modal-body">
						<!-- Textarea -->
					<div class="form-group">
					  <label class="control-label" for="description">Description</label>
					    <textarea class="form-control" id="workflow_description" name="description" placeholder="Enter Description here" required><?php if($workflow['description'])echo ($workflow['description'])?></textarea>
					</div>
					</div>
					<div class="modal-footer">
					<a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
					<input type="submit" name="submit" class="btn btn-primary">
					<a href="#" id="delete" class="btn btn-danger">Delete</a>
					</div>
					</div>
				</div>
				</form>
				</div>
		<?php endforeach;?>
		<?php }
		else {
				echo "<tr><td>No Work History exists</td></tr>";
			}
		?>
		</tbody>
	
	</table>

</div>

<div class="row">

	<div class ="col-md-6">
	<h4 class="alert alert-info text-muted ">
	
				
	Client Comments
	<a href="#" id="form-newclientcomment-1" class="btn btn-sm btn-info col-md-offset-5">
	<span class="glyphicon glyphicon-comment"></span>
	
	New Comment</a>
	</h4>
	<!-- insert new clent comment -->
	<div id="form-newclientcomment-1-modal" class="modal fade" tabindex="-1">
	<form id="form-newclientcomment-1-modal-form">
				<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
					<h3>Add Client Comments</h3>
					</div>
					<div class="modal-body">
					<!-- Textarea -->
					<div class="form-group">
					  <label class="control-label" for="description">Comments</label>
					    <textarea class="form-control" id="client_comment" name="description" placeholder="Enter Comment here" required></textarea>
					    <input type="hidden" id="client_create" class="what_for">
					</div>
					</div>
					<div class="modal-footer">
					<a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
					<input type="submit" class="btn btn-primary" value="save" name="submit">
					</div>
					</div>
				</div>
				</form>
				</div>
				<?php if($client){?>
<?php foreach ($client as $clients):?>
<div class="panel panel-info">
	<div class="panel-heading">
	<span class="glyphicon glyphicon-user"></span>
	<?php $user_posted =getUserFromId($clients['posted_user_id']) ?>
	<h2 class="label label-info"><?php echo $user_posted[0]['firstname']." ".$user_posted[0]['lastname'];?>
	
	</h2>
	<p class="pull-right text-muted"><small>#<em><?php echo date('d-m-Y h:m:s',strtotime($clients['created_on']));?></em></small></p>
	</div>
	<div class="panel-body">
		<?php echo $clients['description'];?>
		<?php getEditButtons('client',$clients['id'])?>
		
	</div>
	</div>
					<!-- client edit modal form -->
				
				<div id="form-client-<?php echo $clients['id']?>-modal" class="modal fade" tabindex="-1">
				<form id="form-client-<?php echo $clients['id']?>-modal-form">
				<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
					<h3>Client Comments</h3>
						</div>
					<div class="modal-body">
						<div class="form-group">
						<input type="hidden"  name="id" value="<?php echo $clients['id']?>"/>
					<input type="hidden"  class="what_for" id="properties_clients_comments"/>
					  <label class="control-label" for="description">Comments</label>
					    <textarea class="form-control" id="client_description" name="description" placeholder="Enter Comment here" required><?php if ($clients['description'])echo $clients['description'];?></textarea>
					</div>
				
					</div>
					<div class="modal-footer">
					<a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
					<input type="submit" name="submit" value="submit" class="btn btn-primary">
					<a href="#" id="delete" class="btn btn-danger">Delete</a>
					</div>
					</div>
				</div>
				</form>
				</div>
<?php endforeach;?>		
<?php }
else {
	echo "<td><td>No Comments </td><tr>";
}
?>

		
	</div>

<div class ="col-md-6 ">
<h4 class="alert alert-warning text-muted ">
Admin Comments

<?php if (isAdmin()){?>
<a href="#" id="form-newadmincomment-1" class="btn btn-sm btn-warning col-md-offset-5">
	<span class="glyphicon glyphicon-comment"></span>
New Comment
</a>
<?php }?>
</h4>

	<!-- insert new admin comment -->
	<div id="form-newadmincomment-1-modal" class="modal fade" tabindex="-1">
	<form id="form-newadmincomment-1-modal-form">
				<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
					<h3>Add Admin Comments</h3>
					</div>
					<div class="modal-body">
					<!-- Textarea -->
					<div class="form-group">
					  <label class="control-label" for="description">Comments</label>
					    <textarea class="form-control" id="admin_comment" name="description" placeholder="Enter Comment here" required></textarea>
					    <input type="hidden" id="admin_create" class="what_for">
					</div>
					</div>
					<div class="modal-footer">
					<a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
					<input type="submit" class="btn btn-primary" value="save" name="submit">
					</div>
					</div>
				</div>
				</form>
				</div>
				<?php if ($admin){?>
					<?php foreach ($admin as $admins):?>
					<div class="panel panel-warning">
						<div class="panel-heading">
						<span class="glyphicon glyphicon-user"></span>
						
						<?php $user_posted =getUserFromId($admins['posted_user_id']) ?>
						<h2 class="label label-warning"><?php echo $user_posted[0]['firstname']." ".$user_posted[0]['lastname'];?>
						
						</h2>
						<p class="pull-right text-muted"><small>#<em><?php echo date('d-m-Y h:m:s',strtotime($admins['created_on']));?></em></small></p>
						</div>
						<div class="panel-body" >
							<?php echo $admins['description'];?>
							<?php getEditButtons('admin',$admins['id'])?>
							
						</div>
						</div>
										<!-- admin edit form modal -->
					
					
									<div id="form-admin-<?php echo $admins['id']?>-modal" class="modal fade" tabindex="-1">
									<form id="form-admin-<?php echo $admins['id']?>-modal-form">
									<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
					<h3>Admin Comments</h3>
					</div>
					
					<div class="modal-body">
						<div class="form-group">
							<input type="hidden"  name="id" value="<?php echo $admins['id']?>"/>
					<input type="hidden"  class="what_for" id="properties_admin_comments"/>
					
					  <label class="control-label" for="description">Comments</label>
					    <textarea class="form-control" id="admin_description" name="description" placeholder="Enter Comment here" required><?php if ($admins['description'])echo $admins['description'];?></textarea>
					</div>
					</div>
					<div class="modal-footer">
					<a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
					<input type="submit" name="submit" value="submit" class="btn btn-primary">
					<a href="#" id="delete" id="admin_comment_delete_<?php echo $admins['id']?>"class="btn btn-danger">Delete</a>
					</div>
					</div>
				</div>
				</form>
				</div>
<?php endforeach;?>	
<?php } else {echo "<tr><td>No comments </td></tr>";}?>	
	
</div>
</div>
</span>
<script type="text/javascript">

$(document).ready(function(){


	$('span').on('click', 'a', function(e) {
		e.preventDefault();

		
	    $('#'+$(this).attr('id')+'-modal' ).modal('show');

	    $('#'+$(this).attr('id')+'-modal' ).modal({keyboard: true}) ;
	    

	   /*  $('#form-newworkflow-1-modal-form').submit(function(e){
			
		$.ajax({
			type:'POST',
			url: 'ajax.php?function=workflow_create',
			data:$('#form-newworkflow-1-modal-form').serialize()

			}).done(function(data){


				if(data)
				{
					alert ("The new workflow has been created");
					window.location.reload();
				}
			else
				{
			   		$('#workflow_worked').addClass('alert-danger').html("The entry failed, please try again");
			}
					
			});


			return false;

		    }); */



	    $('#'+$(this).attr('id')+'-modal-form').submit(function(){

		   
		  var whatfor = "";
	
	    	var whatfor = $(this).parent().find('input.what_for').attr('id');
	   
	    	
	    	$.ajax({


		    	type:"POST",
		    	url : "ajax.php?function="+whatfor,
		    	data:$(this).serialize()



		    	}).done(function(data){

		    		if(data)
					{
						alert ("The request is successful");
						window.location.reload();
					}
				else
					{
					alert ("The entry failed, please try again later");
				}
						
				});


				return false;
		    	

		    }); 

		    $('a#delete').click(function(){

		    	alert($(this).find('input.what_for').attr('id'));


				   });



	    
	});
	
	
		


		
	
});
</script>








