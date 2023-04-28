<?php
include_once 'header.php';
?>
<!-- <h2>Recent Entries</h2> -->
<?php
//buy sell filter working
$buy_sell="buy_sell=3 OR buy_sell=4";

if(isset($_SESSION['buy_sell']))
{
		switch ($_SESSION['buy_sell'])
		{
			case "4":
				$buy_sell="buy_sell=4";
				break;
			case "3":
				$buy_sell="buy_sell=3";
				break;
			case "1":
				$buy_sell="buy_sell=3 OR buy_sell=4";
				break;
			default:
				$buy_sell="buy_sell=3 OR buy_sell=4";
				
						
		}
}

// getAll('*','properties order by updated_on DESC');

$created_on =getAllWhere('*','properties','('.$buy_sell.')  order by created_on DESC');
$header = array(
		0=>"Id",
		1=>"",
		2=>"Buy/Sell" ,
		3=>"Type of Property",
		4=>"Description",
		5=>"Client/Dealer",
		6=>"Client/Dealer Info",
		7=>"Office Staff Name",
		8=>"To be handled by",
		9=>"Created on",
		10=>"Last updated on",
		12=>""

);
		?>
		
		
 		 <!-- Default panel contents -->
  	
		<div class="table" >
		
		<div class="col-md-4">
				
				<div class="input-group ">
				
				
				 	<input type="search" class=" light-table-filter form-control" data-table="order-table" placeholder="Type any word to start searching.."/>
				 	<div class="input-group-btn">
						<a href="#"  class="btn btn-success"><span class="glyphicon glyphicon-search"></span></a>
						   </div>
				 	
				 	</div>
	</div>			 	
					<table class="table table-striped table-condensed table-hover order-table" id="view_table">
				<thead >
				<div id="pager"  class="tablesorterPager">
	<form>
	<ul class="pager" style="margin-top:0;">
	
		<li ><a href="#" class="first">First</a></li>
		<li ><a href="#" class="prev">Previous</a></li>
		<input type="text" class="pagedisplay well well-sm" style="margin:0;"/>
		
		
		<li ><a href="#" class="next">Next</a></li>
		<li ><a href="#" class="last">Last</a></li>
		
		<select class="pagesize well well-sm" style="margin:0;")>
		     <option  value="100000">All</option>
			<option selected="selected"  value="5">5</option>
			<option  value="10">10</option>
			<option  value="15">15</option>
			
		
		</select>
		</ul>
	</form>
</div>
					<tr class="well">
						   <?php foreach ($header as $row) {?>
					          
		                  <th width="800"><?php echo $row ; ?></th>
		                  <?php }?>
		           </tr>
		       </thead>
		        <tbody>
					   <?php if ($created_on){foreach ($created_on as $row) {?>	
		             
		             <?php $update_date=getUpdateDate($row['id'])?>
		             <?php $updated_date=NULL;?>
		  <?php if (strtotime($row['updated_on'])>$update_date) 
		  			{
		  				$updated_date=strtotime($row['updated_on']);
		  			}
		  		elseif ($update_date!=NULL){$updated_date=$update_date;}?>
		           
		                <?php $office_staff=getAllWhereJoin(' user.firstname as assigned_user,properties_postings.rating as rating,user.lastname as assigned_user_last,user.id 
		                										as assigned_user_id,properties.id as property_id,er.firstname as created_user,er.lastname 
		                										as created_user_last,er.id as created_user_id','properties',
																'left join properties_postings on properties.id = properties_postings.properties_id
																left join users as user on properties_postings.assigned_user_id = user.id 
																inner join users as er on properties_postings.created_user_id=er.id','properties.id='
																.$row['id']);?>
																
						            
		                <tr class="info list" id=<?php echo $row['id']; ?>>
		                  <td  id="id"><?php echo $row['id']; ?></td>
		                  <td  id="rating"><?php echo displayRating($row['id']);?></td>
		                  <td id="buy_sell"><?php echo constant("_".$row['buy_sell']); ?></td>
		                   <td id="type"><?php echo ucfirst($row['type']); ?></td>
		                    <td class="description" id="description"><?php echo $row['description']; ?></td>
		                     <td id="client_or_dealer"><?php echo constant("_".$row['client_or_dealer']); ?></td>
		                      <td class= "client_or_dealer_info " id="client_or_dealer_info"><?php echo $row['client_or_dealer_info']; ?></td>
		                      <td id="created_user"><?php echo ucfirst($office_staff[0]['created_user'])." ".ucfirst($office_staff[0]['created_user_last']); ?></td>
		                      <td id="assigned_user"><?php echo ucfirst($office_staff[0]['assigned_user'])." ".ucfirst($office_staff[0]['assigned_user_last']); ?></td>
		                      <td><?php echo date('d-m-Y h:m:s',strtotime($row['created_on']))?> </td>
		                       <td><?php if($updated_date!=0){echo date('d-m-Y h:m:s',$updated_date);}else { echo "-";}?> </td>
		                      <td><a href="view.php?property_id=<?php echo $row['id'];?>" id="view"><i class="fa fa-external-link-square fa-1x"></i></a></td>
		                
		                </tr>
		                  <?php }}else echo "<tr><td>No data</td></tr"?>
			               
               
             
      
                
                </tbody>
            </table>
          </div>
     
					         
	<?php 
 
include_once 'footer.php';



?>
<script type="text/javascript">
$(document).ready(function(){


	$("#view_table").tablesorter().tablesorterPager({container: $("#pager")}); ;
	
	
	
});

</script>
<style type="text/css">
.flow 
{

	height:550px;;

}
</style>
