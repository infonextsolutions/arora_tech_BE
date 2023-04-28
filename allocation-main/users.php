<?php
include_once 'header.php';
if (!isAdmin())
{
	die("Not permitted in this area");
}

$users=getAll('*','users');//for users in dropdown

$header = array(
	
		0=>'Id',
		1=>'Firstname',
		2=>'Lastname',
		3=>'Phone',
		4=>'Email',
		5=>'#username',
		6=>'Is Admin',
		7=>'Member since',
		8=>'#'
		
)

?>

<div class="table">
	<table class="table table-bordered table-condensed table-hover" id="edit_table">

		<thead>
			<tr>
				<?php foreach ($header as $head):?>
				<th><?php echo $head?></th>
				<?php endforeach;?>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($users as $user):?>
			<tr id="<?php echo $user['id']?> " <?php if ($user['admin']==1) echo "class='info'" ;else echo "class='warning'"?>>
				<td><?php echo $user['id']?></td>
				<td><?php echo $user['firstname']?></td>
				<td><?php echo $user['lastname']?></td>
				<td><?php echo $user['contact_number']?></td>
				<td><?php echo $user['email_id']?></td>
				<td><?php echo $user['username']?></td>
				<td><?php if ($user['admin']==1) echo "Yes"; else echo"No";?></td>
				<td><?php echo date('d-m-Y h:m:s',strtotime($user['created_at']))?></td>
				<td id="edit_user"><i class="fa fa-wrench"></i></td>
			</tr>
<div id="modal_<?php echo $user['id']?>" class="modal fade">
	<form id="modal_<?php echo $user['id']?>_form">
		<div class="modal-dialog">
			<div class="modal-content">
				<!-- <div class="modal-header">
				
				
				</div> -->
				<div class="modal-body">
					<!-- Textarea -->
					<div class="form-group">
						 <label class="control-label" for="firstname">Firstname</label>
						 <input type="text" name="firstname" class="form-control" id="firstname_<?php echo $user['id']?>"
						 value="<?php if (isset($user['firstname'])) echo $user['firstname'];?>"  required>
					</div>
					<div class="form-group">
						 <label class="control-label" for="lastname">Lastname</label>
						 <input type="text" name="lastname" class="form-control" id="lastname_<?php echo $user['id']?>"
						 value="<?php if (isset($user['lastname'])) echo $user['lastname'];?>"  required>
					</div>
					<div class="form-group">
						 <label class="control-label" for="contact">Contact number</label>
						 <input type="tel" name="contact_number" class="form-control" id="contact_number_<?php echo $user['id']?>"
						 value="<?php if (isset($user['contact_number'])) echo $user['contact_number'];?>"  required>
					</div>
					<div class="form-group">
						 <label class="control-label" for="email">Email</label>
						 <input type="email" name="email" class="form-control" id="email_id_<?php echo $user['id']?>"
						 value="<?php if (isset($user['email_id'])) echo $user['email_id'];?>"  required>
					</div>
					<div class="form-group">
						 <label class="control-label" for="username">Username</label>
						 <input type="text" name="username" class="form-control"  id="username_<?php echo $user['id']?>"
						 value="<?php if (isset($user['username'])) echo $user['username'];?>"  required>
					</div>
					<div class="form-group">
					 <label class="control-label" for="username">Is Admin?</label>
						<select class="form-control" id="admin_<?php echo $user['id']?>" name="admin">
							<option value="1" <?php if ($user['admin']==1) echo "selected"?> >Yes</option>
							<option value="0" <?php if ($user['admin']==0) echo "selected"?>>No</option>
						</select> 
					</div>
				</div>
				<div class="modal-footer">
					<a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
					<a href="#" class="btn btn-danger">Delete</a>
					<a href="#" class="btn btn-primary" id="edit_user_submit_<?php echo $user['id']?>">Save</a>
				</div>
			</div>
		</div>
	</form>
</div>
				<?php endforeach;?>
		</tbody>
	</table>
</div>

<script type="text/javascript">
$(document).ready(function(){


	$('#edit_table').delegate('#edit_user','click',function(){

		var id= $(this).parent('tr').attr('id');
		

			$('#modal_'+id).modal('show');
			
			$('#edit_user_submit_'+id).click(function(){

					var firstname=$('#firstname_'+id).val();
					var lastname=$('#lastname_'+id).val();
					var contact_number=$('#contact_number_'+id).val();
					var email_id=$('#email_id_'+id).val();
					var username=$('#username_'+id).val();
					var admin=$('#admin_'+id+' option:selected').val();

							$.ajax({

						url:'ajax.php?function=edit_user',
						data:{id:id,firstname:firstname,lastname:lastname,contact_number:contact_number,email_id:email_id,username:username,admin:admin},
						type:'POST'

						}).done(function(data){


							if(data)
							{
							alert('The user has been updated');
							location.reload();
							}
							else
							{
								alert("Some error occured, please try again later");
							}

							});
					return false;



				});

		});
		



	
});
</script>